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
            'Psector'
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
            $this->redirect(
                    [
                            'controller' => 'Project',
                            'action' => 'index'
                    ]);
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
        if (! empty($this->data)) {
            if ($this->data['Post_action'] === "保存") {
                $this->Project->save($this->data['Project']);
            } elseif ($this->data['Post_action'] === "删除") {
                $this->Project->delete($this->data['Project']['id']);
            } else {
                $this->error('非法的action (' . $this->data['Post_action'] . ')');
            }
        }
        
        $this->detail($id);
        $this->set('id', $id);
    }

    /**
     * 管理页面 帮扶项目 控制器
     *
     * @param unknown $id            
     */
    public function admin_edit ($id = null)
    {
        $this->layout = 'mlayer';
        
        if (empty($this->data)) {
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
                                'title' => ''
                        ]
                ];
            }
            $this->set('data', $data);
            $this->set('id', $id);
        } else {
            if ($this->data['Post_action'] === '保存') {
                if (! $this->Project->save($this->data)) {
                    ob_start();
                    var_dump($this->data);
                    $d = ob_get_clean();
                    $this->error("保存数据失败" . PHP_EOL . $d, 
                            AppController::CONTINUE_PROCESS);
                }
                $this->redirect(
                        [
                                'controller' => 'Project',
                                'action' => 'index'
                        ]);
            } elseif ($this->data['Post_action'] === '删除') {
                if (! $this->Project->delete($this->data['Project']['id'])) {
                    ob_start();
                    var_dump($this->data);
                    $d = ob_get_clean();
                    $this->error("删除数据失败" . PHP_EOL . $d, 
                            AppController::CONTINUE_PROCESS);
                }
                $this->redirect(
                        [
                                'controller' => 'Project',
                                'action' => 'index'
                        ]);
            }
        }
    }

    /**
     * 管理用页面 - 修改章节的控制器
     * AJAX服务器端
     *
     * @return void
     */
    public function admin_sector ($pid = null, $sid = null)
    {
        if (empty($pid)) {
            $this->warning('project id为空');
        } elseif (! is_numeric($pid) || $pid <= 0) {
            $this->warning('project id值非法(' . $pid . ')');
        }
        
        $this->layout = 'mlayer';
        
        if (! empty($this->data)) {
            if ($this->data['Post_action'] === '删除') {
                $this->delSector();
            } elseif ($this->data['Post_action'] === '保存') {
                $this->addSector($pid);
            } else {
                $this->fatal('非法的action (' . $this->data['Post_action'] . ')');
            }
            $this->redirect(
                    [
                            'controller' => 'project',
                            'action' => 'detail',
                            $pid
                    ]);
        }
        if (empty($sid)) {
            $this->set('data', 
                    [
                            'Psector' => [
                                    'project_id' => $pid,
                                    'seq' => $this->Psector->find('nextseq', 
                                            [
                                                    'conditions' => [
                                                            'Psector.project_id' => $pid
                                                    ]
                                            ]),
                                    'message' => '',
                                    'src' => '',
                                    'id' => '',
                                    'type' => 'T'
                            ]
                    ]);
        } else {
            $this->set('data', 
                    $this->Psector->find('first', 
                            [
                                    'conditions' => [
                                            'id' => $sid
                                    ]
                            ]));
        }
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
            $this->fatal('limit值非法(' . $limit . ')');
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
     * 删除章节
     */
    private function delSector ()
    {
        if (empty($this->data['Psector']['id'])) {
            return;
        }
        if ($this->data['Psector']['type'] === 'P') {
            $imgPath = WWW_ROOT . 'img\\' . ProjectController::UPLOAD_IMAGE .
                     '\\' . $this->data['Psector']['project_id'] . '\\' .
                     $this->data['Psector']['src'];
            
            if (file_exists($imgPath)) {
                if (unlink($imgPath)) {
                    $this->Psector->delete($this->data['Psector']['id']);
                } else {
                    $this->error("删除文件（$imgPath）失败！", 
                            AppController::CONTINUE_PROCESS);
                }
            } else {
                $this->Psector->delete($this->data['Psector']['id']);
            }
        } else {
            $this->Psector->delete($this->data['Psector']['id']);
        }
    }

    /**
     * 追加章节
     */
    private function addSector ($pid)
    {
        if ($this->data['Psector']['type'] === 'P') {
            if (empty($this->data['Psector']['file']['tmp_name'])) {
                $this->warning('没有上传文件');
                return;
            }
            $d = $this->data;
            $d['Psector']['src'] = $this->data['Psector']['file']['name'];
            
            if ($this->addPicture($pid)) {
                $this->Psector->save($d);
            }
        } else {
            $this->Psector->save($this->data);
        }
    }

    private function addPicture ($pid)
    {
        if (empty($pid)) {
            $this->warning("projectid（${pid}）为空");
            return false;
        }
        $imgPath = WWW_ROOT . 'img\\' . ProjectController::UPLOAD_IMAGE . '\\' .
                 $pid;
        if (! file_exists($imgPath)) {
            if (! mkdir($imgPath, 0700)) {
                $this->error("创建目录（" . $imgPath . "）失败。");
            }
        } else {
            if (! is_dir($imgPath)) {
                $this->error($imgPath . "存在且不是目录。");
            }
        }
        $imgPath = $imgPath . '\\' . $this->data['Psector']['file']['name'];
        if (file_exists($imgPath)) {
            $this->warning("文件已经存在（" . $imgPath . "）");
            return false;
        } else {
            if (copy($this->data['Psector']['file']['tmp_name'], $imgPath)) {
                return true;
            } else {
                $this->warning(
                        "拷贝文件（" . $this->data['Psector']['file']['name'] . "）失败");
                return false;
            }
        }
    }
}
