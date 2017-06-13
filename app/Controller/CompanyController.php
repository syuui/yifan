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
     * 在variables表中保存的 【朗豪风采】 页面所使用的照片的 name 字段值
     *
     * @var string
     */
    const LANHAM_PICTURE = 'lanham_pics';

    /**
     * 在variables表中保存的 【朗豪风采】 页面所使用的文字描述的 name 字段值
     *
     * @var string
     */
    const LANHAM_DESCRIPTION = 'lanham_dscr';

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
        $this->set('data', 
                $this->Variable->find('first', 
                        [
                                'conditions' => [
                                        'Variable.name' => Variable::ENTERPRISE_DESCRIPTION
                                ],
                                'limit' => 1
                        ]));
    }

    /**
     * [走进朗豪]-[企业文化]的控制器
     *
     * @return void
     */
    public function culture ()
    {
        $this->set('data', 
                $this->Variable->find('first', 
                        [
                                'conditions' => [
                                        'Variable.name' => Variable::ENTERPRISE_CULTURE
                                ],
                                'limit' => 1
                        ]));
    }

    /**
     * [走进朗豪]-[发展战略]的控制器
     *
     * @return void
     */
    public function development ()
    {
        $this->set('data', 
                $this->Variable->find('first', 
                        [
                                'conditions' => [
                                        'Variable.name' => Variable::ENTERPRISE_DEVELOPMENT
                                ],
                                'limit' => 1
                        ]));
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
                                        'Variable.name' => CompanyController::LANHAM_PICTURE
                                ]
                        ]));
        $this->set('dscr', 
                $this->Variable->find('first', 
                        [
                                'conditions' => [
                                        'Variable.name' => CompanyController::LANHAM_DESCRIPTION
                                ]
                        ]));
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
        $this->data = $this->Variable->find('first', 
                [
                        'conditions' => [
                                'Variable.name' => Variable::ENTERPRISE_DESCRIPTION
                        ]
                ]);
        if (empty($this->data)) {
            $this->data = [
                    'Variable' => [
                            'id' => 0,
                            'name' => Variable::ENTERPRISE_DESCRIPTION,
                            'value' => ''
                    ]
            ];
        }
        $this->set('data', $this->data);
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
        
        $this->data = $this->Variable->find('first', 
                [
                        'conditions' => [
                                'Variable.name' => Variable::ENTERPRISE_CULTURE
                        ],
                        'limit' => 1
                ]);
        if (empty($this->data)) {
            $this->data = [
                    'Variable' => [
                            'id' => 0,
                            'name' => Variable::ENTERPRISE_CULTURE,
                            'value' => ''
                    ]
            ];
        }
        $this->set('data', $this->data);
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
        $this->data = $this->Variable->find('first', 
                [
                        'conditions' => [
                                'Variable.name' => Variable::ENTERPRISE_DEVELOPMENT
                        ],
                        'limit' => 1
                ]);
        if (empty($this->data)) {
            $this->data = [
                    'Variable' => [
                            'id' => 0,
                            'name' => Variable::ENTERPRISE_DEVELOPMENT,
                            'value' => ''
                    ]
            ];
        }
        $this->set('data', $this->data);
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
        $this->set('pics', 
                $this->Variable->find('all', 
                        [
                                'conditions' => [
                                        'Variable.name' => CompanyController::LANHAM_PICTURE
                                ]
                        ]));
        $this->set('dscr', 
                $this->Variable->find('first', 
                        [
                                'conditions' => [
                                        'Variable.name' => CompanyController::LANHAM_DESCRIPTION
                                ]
                        ]));
    }

    /**
     * 管理工具 [走进朗豪]-[朗豪风采] 管理照片时的弹出层的控制器。
     * AJAX服务器端
     *
     * @return void
     */
    public function admin_lanham_editpic ($id = null)
    {
        $this->set('isAdmin', true);
        
        $this->layout = false;
        if (! empty($this->data['Variable']['value'])) {
            if ($this->data['Variable']['action'] === 'E') {
                $this->Variable->save($this->data);
            } elseif ($this->data['Variable']['action'] === 'D') {
                $this->Variable->delete($this->data['Variable']['id']);
            } else {
                $this->log('admin_lanham_editpic: 非法的action');
            }
        }
        if (! empty($id)) {
            $this->set('data', 
                    $this->Variable->find('first', 
                            [
                                    'conditions' => 'id=' . $id
                            ]));
        }
    }
}
