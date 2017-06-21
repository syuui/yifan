<?php
App::uses('AppController', 'Controller');
App::uses('VariableModel', 'Model');

/**
 * 帮扶项目 控制器
 *
 * @author Wei.ZHOU
 * @version 1.0
 */
class ProjectController extends AppController
{

    /**
     * 帮扶项目 页面中一页最多显示的条数
     *
     * @var string
     */
    const PROJECT_PAGE_LENGTH = 'project_page_length';

    /**
     * 图片文件上传路径
     *
     * @var string
     */
    const UPLOAD_IMAGE = 'projects';

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
            'Project',
            'Image'
    ];

    /**
     * 分页设置
     *
     * $paginate在控制器中控制分布功能。
     *
     * @var array
     */
    var $paginate = [
            'Project' => [
                    'conditions' => '',
                    'recursive' => 0,
                    'fields' => '',
                    'limit' => 10,
                    'page' => 1
            ]
    ];

    /**
     * 此控制器使用以下助件
     *
     * @var array
     */
    var $helpers = [
            'Paginator'
    ];

    /**
     * 此控制器所有页面均使用以下布局
     *
     * @var string
     */
    var $layout = 'default_l';

    /**
     * 用户页面 帮扶项目 项目一览 控制器
     */
    public function index ()
    {
        $this->paginate['Project']['limit'] = Configure::read(
                ProjectController::PROJECT_PAGE_LENGTH);
        $this->Paginator->settings = $this->paginate;
        
        $this->set('data', $this->Paginator->paginate('Project'));
    }

    /**
     * 用户页面 帮扶项目详细 控制器
     *
     * @param unknown $id
     *            帮扶项目ID
     */
    public function detail ($id = null)
    {
        if (empty($id)) {
            $this->warning('ID为空');
        } else {
            $this->set('data', 
                    $this->Project->find('first', 
                            [
                                    'conditions' => [
                                            'id' => $id
                                    ]
                            ]));
        }
    }

    /**
     * 管理页面 帮扶项目 项目一览 控制器
     */
    public function admin_index ()
    {
        $this->set('isAdmin', true);
        $this->index();
        $this->render('index');
    }

    /**
     * 管理页面 帮扶项目详细 控制器
     *
     * @param unknown $id
     *            帮扶项目ID
     */
    public function admin_detail ($id = null)
    {
        $this->set('isAdmin', true);
        
        if (! empty($this->data)) {
            if ($this->data['Post_action'] === "保存") {
                $this->Project->save($this->data['Project']);
            } elseif ($this->data['Post_action'] === "删除") {
                $this->Project->delete($this->data['Project']['id']);
            } else {
                $this->warning('非法的action (' . $this->data['Post_action'] . ')');
                if (Configure::read('debug')) {
                    die('非法的action (' . $this->data['Post_action'] . ')');
                } else {
                    throw new InternalErrorException();
                }
            }
        }
        
        $this->detail($id);
        $this->set('id', $id);
        $this->render('detail');
    }

    /**
     * 管理页面 帮扶项目 正文编辑 控制器
     *
     * @param unknown $id            
     */
    public function admin_edit ($id = null)
    {
        $this->set('isAdmin', true);
        $this->layout = 'mlayer';
        
        $data = $this->Project->find('first', 
                [
                        'conditions' => [
                                'id' => $id
                        ]
                ]);
        if (empty($data)) {
            $data = [
                    'Project' => [
                            'id' => '',
                            'title' => '',
                            'content' => ''
                    ]
            ];
        }
        $this->set('data', $data);
        $this->set('id', $id);
    }

    /**
     * 管理用页面 - 修改图片的控制器
     * AJAX服务器端
     *
     * @return void
     */
    public function admin_editpic ($project_id = null)
    {
        if (empty($project_id)) {
            $this->warning('project_id为空');
            if (Configure::read('debug')) {
                die('project_id为空');
            } else {
                throw new NotFoundException();
            }
        }
        if (! is_numeric($project_id) || $project_id <= 0) {
            $this->warning('project_id值非法(' . $project_id . ')');
            if (Configure::read('debug')) {
                die('project_id值非法(' . $project_id . ')');
            } else {
                throw new NotFoundException();
            }
        }
        $this->set('isAdmin', true);
        
        $this->layout = 'mlayer';
        
        if (! empty($this->data)) {
            if ($this->data['Post_action'] === '删除') {
                $this->delPicture();
            } elseif ($this->data['Post_action'] === '增加图片') {
                $this->addPicture($project_id);
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
                            'controller' => 'project',
                            'action' => 'detail',
                            $project_id
                    ]);
        }
        $this->set('pics', 
                $this->Image->find('all', 
                        [
                                'conditions' => [
                                        'project_id' => $project_id
                                ]
                        ]));
    }

    /**
     * 用户页面 帮扶项目一览 控制器
     *
     * @param number $limit
     *            最多显示条数
     * @return unknown
     */
    public function getProjectList ($limit = 0)
    {
        if (! is_numeric($limit) || $limit < 0) {
            $this->warning('limit值非法(' . $limit . ')');
            if (Configure::read('debug')) {
                die('limit值非法(' . $limit . ')');
            } else {
                throw new NotFoundException();
            }
        }
        $options = [
                'fields' => [
                        'Project.id',
                        'Project.title'
                ]
        ];
        if ($limit > 0) {
            $options['limit'] = $limit;
        }
        return $this->Project->find('all', $options);
    }

    /**
     * 管理页面 帮扶项目一览 控制器
     *
     * @param number $limit
     *            最多显示条数
     * @return unknown
     */
    public function admin_getProjectList ($limit = 0)
    {
        return $this->getProjectList($limit);
    }

    /**
     * 删除图片
     */
    private function delPicture ()
    {
        if (empty($this->data)) {
            return;
        }
        
        $this->Image->delete($this->data['Image']['id']);
        $npic = $this->Image->find('count', 
                [
                        'conditions' => [
                                'Image.id' => $this->data['Variable']['id']
                        ]
                ]);
        if ($npic <= 0) {
            $imgPath = WWW_ROOT . 'img\\' . ProjectController::UPLOAD_IMAGE .
                     '\\' . $this->data['Variable']['filename'];
            unlink($imgPath);
        }
    }

    /**
     * 追加图片
     *
     * @param unknown $id
     *            帮扶项目 ID
     */
    private function addPicture ($project_id)
    {
        if (empty($this->data['Image']['file']['tmp_name'])) {
            $this->warning('没有上传文件');
            return;
        }
        
        $imgPath = WWW_ROOT . 'img\\' . ProjectController::UPLOAD_IMAGE . '\\' .
                 $this->data['Image']['file']['name'];
        $d = [
                'Image' => [
                        'project_id' => $project_id,
                        'filename' => $this->data['Image']['file']['name']
                ]
        ];
        $this->Image->save($d);
        
        if (! file_exists($imgPath)) {
            copy($this->data['Image']['file']['tmp_name'], $imgPath);
        }
    }
}
