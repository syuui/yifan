<?php
/**
 * Static content controller.
 *
 * This file will render views from views/Company/
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
App::uses('Variable', 'Model');
App::uses('Uploaditem', 'Model');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an
 * application
 *
 * @package app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class CompanyController extends AppController
{

    /**
     * 此控制器中使用以下模型
     *
     * @var array
     */
    public $uses = [
            'Variable'
    ];

    /**
     * 此控制器中使用以下助件
     *
     * @var array
     */
    public $helpers = [
            'Tag'
    ];

    /**
     * 此控制器使用的布局
     *
     * @var string
     */
    public $layout = 'default_l';

    /**
     * [走进朗豪]-[企业简介]的控制器
     *
     * @return void
     */
    public function index ()
    {
        $this->set('pics', 
                $this->Variable->find('all', 
                        [
                                'conditions' => [
                                        'name' => Variable::ENTERPRISE_DESCRIPTION_PIC
                                ]
                        ]));
        $this->set('data', $this->getPagedata(Variable::ENTERPRISE_DESCRIPTION));
        $this->set('page_title', '企业简介');
        $this->render('display');
    }

    /**
     * [走进朗豪]-[企业文化]的控制器
     *
     * @return void
     */
    public function culture ()
    {
        $this->set('pics', 
                $this->Variable->find('all', 
                        [
                                'conditions' => [
                                        'name' => Variable::ENTERPRISE_CULTURE_PIC
                                ]
                        ]));
        $this->set('data', $this->getPagedata(Variable::ENTERPRISE_CULTURE));
        $this->set('page_title', '企业文化');
        $this->render('display');
    }

    /**
     * [走进朗豪]-[发展战略]的控制器
     *
     * @return void
     */
    public function development ()
    {
        $this->set('pics', 
                $this->Variable->find('all', 
                        [
                                'conditions' => [
                                        'name' => Variable::ENTERPRISE_DEVELOPMENT_PIC
                                ]
                        ]));
        $this->set('data', $this->getPagedata(Variable::ENTERPRISE_DEVELOPMENT));
        $this->set('page_title', '发展战略');
        $this->render('display');
    }

    /**
     * [走进朗豪]-[朗豪风采]的控制器
     *
     * @return void
     */
    public function lanham ()
    {
        $this->set('pics', 
                $this->Variable->find('all', 
                        [
                                'conditions' => [
                                        'name' => Variable::ENTERPRISE_LANHAM_PIC
                                ]
                        ]));
        $this->set('data', $this->getPageData(Variable::ENTERPRISE_LANHAM));
        $this->set('page_title', '朗豪风采');
        $this->render('display');
    }

    /**
     * 管理工具 [走进朗豪]-[企业简介]的控制器
     *
     * @return void
     */
    public function admin_index ()
    {
        $this->set('isAdmin', true);
        
        if (! empty($this->data)) {
            $this->Variable->save($this->data);
        }
        $this->set('pics', 
                $this->Variable->find('all', 
                        [
                                'conditions' => [
                                        'name' => Variable::ENTERPRISE_DESCRIPTION_PIC
                                ]
                        ]));
        $data = $this->getPagedata(Variable::ENTERPRISE_DESCRIPTION);
        if (empty($data)) {
            $data = [
                    'Variable' => [
                            'id' => 0,
                            'name' => Variable::ENTERPRISE_DESCRIPTION,
                            'value' => ''
                    ]
            ];
        }
        $this->set('params', $this->request->params);
        $this->index();
    }

    public function admin_index_edit ()
    {
        $this->set('isAdmin', true);
        $this->layout = 'mLayer';
        $this->set('data', $this->getPageData(Variable::ENTERPRISE_DESCRIPTION));
        $this->set('page_title', '企业简介');
        $this->set('params', 
                [
                        'controller' => $this->request->params['controller'],
                        'action' => 'index'
                ]);
        $this->render('admin_edit');
    }

    /**
     * 管理工具 [走进朗豪]-[企业简介] 管理照片时的弹出层的控制器。
     * AJAX服务器端
     *
     * @return void
     */
    public function admin_index_editpic ()
    {
        $this->set('isAdmin', true);
        
        $this->layout = 'mLayer';
        if (! empty($this->data)) {
            if ($this->data['Post_action'] === '删除') {
                $this->delPicture();
            } elseif ($this->data['Post_action'] === '增加图片') {
                $this->addPicture(Variable::ENTERPRISE_DESCRIPTION_PIC);
            } else {
                $this->log('admin_index_editpic: 非法的action');
            }
            $this->redirect(
                    [
                            'controller' => 'company',
                            'action' => 'index'
                    ]);
        }
        $this->set('pics', 
                $this->Variable->find('all', 
                        [
                                'conditions' => [
                                        'name' => Variable::ENTERPRISE_DESCRIPTION_PIC
                                ]
                        ]));
        $this->render('admin_editpic');
    }

    /**
     * 管理工具 [走进朗豪]-[企业文化]的控制器
     *
     * @return void
     */
    public function admin_culture ()
    {
        $this->set('isAdmin', true);
        
        if (! empty($this->data)) {
            $this->Variable->save($this->data);
        }
        
        $this->data = $this->getPagedata(Variable::ENTERPRISE_CULTURE);
        if (empty($this->data)) {
            $this->data = [
                    'Variable' => [
                            'id' => 0,
                            'name' => Variable::ENTERPRISE_CULTURE,
                            'value' => ''
                    ]
            ];
        }
        $this->set('params', $this->request->params);
        $this->culture();
    }

    public function admin_culture_edit ()
    {
        $this->set('isAdmin', true);
        $this->layout = 'mLayer';
        $this->set('data', $this->getPagedata(Variable::ENTERPRISE_CULTURE));
        $this->set('page_title', '企业文化');
        $this->set('params', 
                [
                        'controller' => $this->request->params['controller'],
                        'action' => 'culture'
                ]);
        $this->render('admin_edit');
    }

    public function admin_culture_editpic ()
    {
        $this->set('isAdmin', true);
        
        $this->layout = 'mLayer';
        if (! empty($this->data)) {
            if ($this->data['Post_action'] === '删除') {
                $this->delPicture();
            } elseif ($this->data['Post_action'] === '增加图片') {
                $this->addPicture(Variable::ENTERPRISE_CULTURE_PIC);
            } else {
                $this->log('admin_index_editpic: 非法的action');
            }
            $this->redirect(
                    [
                            'controller' => 'company',
                            'action' => 'culture'
                    ]);
        }
        $this->set('pics', 
                $this->Variable->find('all', 
                        [
                                'conditions' => [
                                        'name' => Variable::ENTERPRISE_CULTURE_PIC
                                ]
                        ]));
        $this->render('admin_editpic');
    }

    /**
     * 管理工具 [走进朗豪]-[发展战略]的控制器
     *
     * @return void
     */
    public function admin_development ()
    {
        $this->set('isAdmin', true);
        
        if (! empty($this->data)) {
            $this->Variable->save($this->data);
        }
        $this->data = $this->getPagedata(Variable::ENTERPRISE_DEVELOPMENT);
        if (empty($this->data)) {
            $this->data = [
                    'Variable' => [
                            'id' => 0,
                            'name' => Variable::ENTERPRISE_DEVELOPMENT,
                            'value' => ''
                    ]
            ];
        }
        $this->set('params', $this->request->params);
        $this->set('page_title', '发展战略');
        $this->development();
    }

    public function admin_development_edit ()
    {
        $this->set('isAdmin', true);
        $this->layout = 'mLayer';
        $this->set('data', $this->getPagedata(Variable::ENTERPRISE_DEVELOPMENT));
        $this->set('page_title', '发展战略');
        $this->set('params', 
                [
                        'controller' => $this->request->params['controller'],
                        'action' => 'development'
                ]);
        $this->render('admin_edit');
    }

    public function admin_development_editpic ()
    {
        $this->set('isAdmin', true);
        
        $this->layout = 'mLayer';
        if (! empty($this->data)) {
            if ($this->data['Post_action'] === '删除') {
                $this->delPicture();
            } elseif ($this->data['Post_action'] === '增加图片') {
                $this->addPicture(Variable::ENTERPRISE_DEVELOPMENT_PIC);
            } else {
                $this->log('admin_index_editpic: 非法的action');
            }
            $this->redirect(
                    [
                            'controller' => 'company',
                            'action' => 'development'
                    ]);
        }
        $this->set('pics', 
                $this->Variable->find('all', 
                        [
                                'conditions' => [
                                        'name' => Variable::ENTERPRISE_DEVELOPMENT_PIC
                                ]
                        ]));
        $this->render('admin_editpic');
    }

    /**
     * 管理工具 [走进朗豪]-[朗豪风采]的控制器
     *
     * @return void
     */
    public function admin_lanham ()
    {
        $this->set('isAdmin', true);
        
        if (isset($this->data) && ! empty($this->data['Variable']['value'])) {
            $this->Variable->save($this->data);
        }
        $this->set('params', $this->request->params);
        $this->set('page_title', '朗豪风采');
        $this->lanham();
    }

    public function admin_lanham_edit ()
    {
        $this->set('isAdmin', true);
        $this->layout = 'mlayer';
        $this->set('data', $this->getPagedata(Variable::ENTERPRISE_LANHAM));
        $this->set('page_title', '朗豪风采');
        $this->set('params', 
                [
                        'controller' => $this->request->params['controller'],
                        'action' => 'lanham'
                ]);
        $this->render('admin_edit');
    }

    /**
     * 管理工具 [走进朗豪]-[朗豪风采] 管理照片时的弹出层的控制器。
     * AJAX服务器端
     *
     * @return void
     */
    public function admin_lanham_editpic ()
    {
        $this->set('isAdmin', true);
        
        $this->layout = 'mLayer';
        if (! empty($this->data)) {
            if ($this->data['Post_action'] === '删除') {
                $this->delPicture();
            } elseif ($this->data['Post_action'] === '增加图片') {
                $this->addPicture(Variable::ENTERPRISE_LANHAM_PIC);
            } else {
                $this->log('admin_lanham_editpic: 非法的action');
            }
            $this->redirect(
                    [
                            'controller' => 'company',
                            'action' => 'lanham'
                    ]);
        }
        $this->set('pics', $this->Variable->find('companyPicList'));
        $this->render('admin_editpic');
    }

    private function getPageData ($varName, $findMethod = 'first')
    {
        return $this->Variable->find($findMethod, 
                [
                        'conditions' => [
                                'Variable.name' => $varName
                        ]
                ]);
    }

    private function delPicture ()
    {
        empty($this->data) && exit();
        
        $this->Variable->delete($this->data['Variable']['id']);
        $npic = $this->Variable->find('count', 
                [
                        'conditions' => [
                                'Variable.value' => $this->data['Variable']['value']
                        ]
                ]);
        if ($npic <= 0) {
            $imgPath = WWW_ROOT . 'img\\' . Uploaditem::UPLOAD_IMAGE . '\\' .
                     $this->data['Variable']['value'];
            unlink($imgPath);
        }
    }

    private function addPicture ($name)
    {
        empty($this->data) && exit();
        
        $imgPath = WWW_ROOT . 'img\\' . Uploaditem::UPLOAD_IMAGE . '\\' .
                 $this->data['Variable']['file']['name'];
        $d = [
                'Variable' => [
                        'name' => $name,
                        'value' => $this->data['Variable']['file']['name']
                ]
        ];
        $this->Variable->save($d);
        
        if (! file_exists($imgPath)) {
            copy($this->data['Variable']['file']['tmp_name'], $imgPath);
        }
    }
}
