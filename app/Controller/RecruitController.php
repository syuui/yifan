<?php
App::uses('AppController', 'Controller');
App::uses('Variable', 'Model');

/**
 * 招贤纳士 控制器
 *
 * @author Wei.ZHOU
 * @version 1.0
 */
class RecruitController extends AppController
{

    const RECRUIT_PAGE_LENGTH = 'recruit_page_length';

    /**
     * 此控制器使用以下组件
     *
     * @var array
     */
    public $components = [
            'Paginator'
    ];

    /**
     * 此控制器使用以下模型
     *
     * @var array
     */
    public $uses = [
            'Recruit',
            'Variable'
    ];

    /**
     * 分页设置
     *
     * $paginate在控制器中控制分布功能。
     *
     * @var array
     */
    var $paginate = [
            'Recruit' => [
                    'conditions' => '',
                    'fields' => '',
                    'limit' => 10,
                    'page' => 1,
                    'recursive' => 0
            ]
    ];

    /**
     * 此控制器使用以下助件
     *
     * @var array
     */
    var $helpers = [
            'Paginator',
            'Form'
    ];

    /**
     * 此控制器中所有页面均使用以下布局
     *
     * @var string
     */
    var $layout = 'default_r';

    /**
     * 用户页面 招贤纳士 - 人材招聘 的控制器
     *
     * @return void
     */
    public function index ()
    {
        $this->paginate['Recruit']['limit'] = Configure::read(
                RecruitController::RECRUIT_PAGE_LENGTH);
        $this->Paginator->settings = $this->paginate;
        $this->set('data', $this->Paginator->paginate('Recruit'));
    }

    /**
     * 用户页面 招贤纳士 - 人材招聘 - 职位详细 的控制器
     *
     * @param unknown $id
     *            职位ID
     */
    public function jobdetail ($id = null)
    {
        if (empty($id)) {
            $this->warning('ID为空');
        } else {
            $data = $this->Recruit->find('first', 
                    [
                            'conditions' => [
                                    'id' => $id
                            ]
                    ]);
            if (empty($data)) {
                if (Configure::read('debug')) {
                    $this->warning('未检索到ID为' . $id . '的数据');
                }
            } else {
                $this->set('data', $data);
            }
        }
    }

    /**
     * 用户页面 招贤纳士 - 人才战略 的控制器
     */
    public function strategy ()
    {
        $this->set('data', $this->getPageData(Variable::RECRUIT_STRATEGY));
    }

    /**
     * 用户页面 招贤纳士 - 在线提交 的控制器
     */
    public function entry ()
    {
        ;
    }

    /**
     * 管理页面 招贤纳士 - 在线提交 的控制器
     */
    public function admin_entry ()
    {
        $this->set('isAdmin', true);
        $this->entry();
        $this->render('entry');
    }

    /**
     * 用户页面 招贤纳士 - 人材招聘 的控制器
     */
    public function admin_index ()
    {
        $this->set('isAdmin', true);
        $this->index();
    }

    /**
     * 管理页面 招贤纳士 - 人才战略 的控制器
     */
    public function admin_strategy ()
    {
        $this->set('isAdmin', true);
        if (! empty($this->data)) {
            $this->Variable->save($this->data);
        }
        $this->strategy();
        $this->render('strategy');
    }

    public function admin_jobdetail ($id = null)
    {
        $this->jobdetail($id);
        $this->render('jobdetail');
    }

    /**
     * 管理页面 招贤纳士 - 人才战略 的更新逻辑
     */
    public function admin_strategy_edit ()
    {
        $this->set('isAdmin', true);
        
        $this->layout = 'mlayer';
        
        $this->data = $this->getPageData(Variable::RECRUIT_STRATEGY);
        if (empty($this->data)) {
            $this->data = [
                    'Variable' => [
                            'id' => 0,
                            'name' => Variable::RECRUIT_STRATEGY,
                            'value' => ''
                    ]
            ];
        }
        $this->set('data', $this->data);
    }

    /**
     * 职位信息增删
     *
     * @param unknown $id
     *            职位信息ID
     * @throws InternalErrorException
     *         当Post_action非法时，DEBUG模式下中止运行，商用模式下抛出InternalErrorException
     */
    public function admin_savejob ($id = null)
    {
        $this->set('isAdmin', true);
        
        $this->layout = 'mlayer';
        
        // 职位信息 增删改
        if (! empty($this->data)) {
            if ($this->data['Post_action'] === '确定') {
                $this->Recruit->save($this->data);
            } elseif ($this->data['Post_action'] === '删除') {
                $this->Recruit->delete($this->data['Recruit']['id']);
            } else {
                $this->warning('非法的action (' . $this->data['Post_action'] . ')');
                if (Configure::read('debug')) {
                    die('非法的action (' . $this->data['Post_action'] . ')');
                } else {
                    throw new InternalErrorException();
                }
            }
            $this->redirect(
                    [
                            'controller' => 'recruit',
                            'action' => 'index'
                    ]);
        }
        
        if (empty($id)) {
            $this->set('data', 
                    [
                            'Recruit' => [
                                    'id' => '',
                                    'title' => '',
                                    'salary' => '',
                                    'location' => '',
                                    'description' => '',
                                    'public' => true
                            ]
                    ]);
        } else {
            $this->set('data', 
                    $this->Recruit->find('first', 
                            [
                                    'conditions' => [
                                            'id=' . $id
                                    ]
                            ]));
        }
    }

    /**
     * 用户页面 职位一览 元素的控制器
     *
     * @return unknown
     */
    public function getAllRecruitList ($limit = 0)
    {
        return $this->getRecruitList($limit);
    }

    /**
     * 管理页面 职位一览 元素的控制器
     *
     * @return unknown
     */
    public function admin_getAllRecruitList ($limit = 0)
    {
        return $this->getRecruitList($limit);
    }

    /**
     * 取得职位信息列表
     *
     * @param number $limit
     *            取得件数上限
     * @return unknown
     */
    private function getRecruitList ($limit = 0)
    {
        $options = [
                'fields' => [
                        'Recruit.id',
                        'Recruit.title',
                        'Recruit.number'
                ]
        ];
        if ($limit != 0) {
            $options['limit'] = $limit;
        }
        return $this->Recruit->find('all', $options);
    }

    /**
     * 取得页面数据
     *
     * @param unknown $varName
     *            Variable表中的变量名称
     * @param string $findMethod
     *            模型中的findMethod
     *            
     * @return unknown
     */
    private function getPageData ($varName, $findMethod = 'first')
    {
        return $this->Variable->find($findMethod, 
                [
                        'conditions' => [
                                'Variable.name' => $varName
                        ]
                ]);
    }
}
