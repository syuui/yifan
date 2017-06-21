<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');
App::uses('VariableModel', 'Model');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an
 * application
 *
 * @package app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class ProjectController extends AppController
{

    const UPLOAD_IMAGE = 'projects';

    /**
     * This controller uses following compnonets
     *
     * @var array
     */
    public $components = [
            'Paginator'
    ];

    /**
     * This controller uses following models
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

    var $helpers = [
            'Paginator'
    ];

    var $layout = 'default_l';

    /**
     * Displays a view
     *
     * @return void
     * @throws NotFoundException When the view file could not be found
     *         or MissingViewException in debug mode.
     */
    public function index ()
    {
        $this->paginate['Project']['limit'] = Configure::read(
                'project_page_length');
        $this->Paginator->settings = $this->paginate;
        
        $this->set('data', $this->Paginator->paginate('Project'));
    }

    public function detail ($id = null)
    {
        if (! empty($id)) {
            $this->set('data', 
                    $this->Project->find('first', 
                            [
                                    'conditions' => [
                                            'id' => $id
                                    ]
                            ]));
        }
    }

    public function admin_index ()
    {
        $this->set('isAdmin', true);
        $this->index();
        $this->render('index');
    }

    public function admin_detail ($id = null)
    {
        $this->set('isAdmin', true);
        
        if (! empty($this->data)) {
            if ($this->data['Post_action'] === "保存") {
                $this->Project->save($this->data['Project']);
            } elseif ($this->data['Post_action'] === "删除") {
                $this->Project->delete($this->data['Project']['id']);
            }
            $this->redirect(
                    [
                            'controller' => 'project',
                            'action' => 'index'
                    ]);
        }
        
        $this->set('pics', 
                $this->Image->find('all', 
                        [
                                'conditions' => [
                                        'project_id' => $id
                                ]
                        ]));
        $this->detail($id);
        $this->set('id', $id);
        $this->render('detail');
    }

    public function admin_edit ($id = null)
    {
        $this->set('isAdmin', true);
        $this->layout = 'mLayer';
        
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
    public function admin_editpic ($project_id)
    {
        $this->set('isAdmin', true);
        
        $this->layout = 'mLayer';
        
        if (! empty($this->data)) {
            if ($this->data['Post_action'] === '删除') {
                $this->delPicture();
            } elseif ($this->data['Post_action'] === '增加图片') {
                $this->addPicture($project_id);
            } else {
                $this->log('admin_index_editpic: 非法的action');
            }
            $this->redirect(
                    [
                            'controller' => 'project',
                            'action' => 'project_detail',
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

    public function getProjectList ($limit = 0)
    {
        $options = [
                'fields' => [
                        'Project.id',
                        'Project.title'
                ]
        ];
        if ($limit != 0) {
            $options['limit'] = $limit;
        }
        return $this->Project->find('all', $options);
    }

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
     * @param unknown $varName
     *            Variable表中的变量名称
     */
    private function addPicture ($id)
    {
        if (empty($this->data['Image']['file']['tmp_name'])) {
            return;
        }
        
        $imgPath = WWW_ROOT . 'img\\' . ProjectController::UPLOAD_IMAGE . '\\' .
                 $this->data['Image']['file']['name'];
        $d = [
                'Image' => [
                        'project_id' => $id,
                        'filename' => $this->data['Image']['file']['name']
                ]
        ];
        $this->Image->save($d);
        
        if (! file_exists($imgPath)) {
            copy($this->data['Image']['file']['tmp_name'], $imgPath);
        }
    }
}
