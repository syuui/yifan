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
class CompanyController extends AppController
{

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array(
            'Variable'
    );

    /**
     * Specify layout used in this page.
     */
    public $layout = 'default_l';

    /**
     * Displays a view
     *
     * @return void
     * @throws NotFoundException When the view file could not be found
     *         or MissingViewException in debug mode.
     */
    public function index ()
    {
        $this->set('data', 
                $this->Variable->find('first', 
                        array(
                                'conditions' => array(
                                        'Variable.name' => VariableModel::ENTERPRISE_DESCRIPTION
                                ), // 查询条件数组
                                'recursive' => 1, // 整型
                                                  // 字段名数组
                                'fields' => array(
                                        'Variable.id',
                                        'Variable.name',
                                        'Variable.value',
                                        'Variable.created',
                                        'Variable.modified'
                                ),
                                // 定义排序的字符串或者数组
                                'order' => array(
                                        'Variable.modified DESC'
                                ),
                                'limit' => 1
                        )));
    }

    public function culture ()
    {
        $this->set('data', 
                $this->Variable->find('first', 
                        array(
                                'conditions' => array(
                                        'Variable.name' => VariableModel::ENTERPRISE_CULTURE
                                ), // 查询条件数组
                                'recursive' => 1, // 整型
                                                  // 字段名数组
                                'fields' => array(
                                        'Variable.id',
                                        'Variable.name',
                                        'Variable.value',
                                        'Variable.created',
                                        'Variable.modified'
                                ),
                                // 定义排序的字符串或者数组
                                'order' => array(
                                        'Variable.modified DESC'
                                ),
                                'limit' => 1
                        )));
    }

    public function development ()
    {
        $this->set('data', 
                $this->Variable->find('first', 
                        array(
                                'conditions' => array(
                                        'Variable.name' => VariableModel::ENTERPRISE_DEVELOPMENT
                                ), // 查询条件数组
                                'recursive' => 1, // 整型
                                                  // 字段名数组
                                'fields' => array(
                                        'Variable.id',
                                        'Variable.name',
                                        'Variable.value',
                                        'Variable.created',
                                        'Variable.modified'
                                ),
                                // 定义排序的字符串或者数组
                                'order' => array(
                                        'Variable.modified DESC'
                                ),
                                'limit' => 1
                        )));
    }

    public function lanham ()
    {}

    public function sidebar ()
    {}

    public function admin_index ()
    {
        $this->Helper = array(
                'form'
        );
        $this->set('isAdmin', true);
        
        if (! empty($this->data)) {
            $this->Variable->save($this->data);
        }
        
        $this->data = $this->Variable->find('first', 
                array(
                        'conditions' => array(
                                'Variable.name' => VariableModel::ENTERPRISE_DESCRIPTION
                        ), // 查询条件数组
                        'recursive' => 1, // 整型
                                          // 字段名数组
                        'fields' => array(
                                'Variable.id',
                                'Variable.name',
                                'Variable.value',
                                'Variable.created',
                                'Variable.modified'
                        ),
                        // 定义排序的字符串或者数组
                        'order' => array(
                                'Variable.modified DESC'
                        ),
                        'limit' => 1
                ));
        if (empty($this->data)) {
            $this->data = array(
                    'Variable' => array(
                            'id' => 0,
                            'name' => VariableModel::ENTERPRISE_DESCRIPTION,
                            'value' => ''
                    )
            );
        }
        $this->set('data', $this->data);
    }

    public function admin_culture ()
    {
        $this->Helper = array(
                'form'
        );
        $this->set('isAdmin', true);
        
        if (! empty($this->data)) {
            $this->Variable->save($this->data);
        }
        
        $this->data = $this->Variable->find('first', 
                array(
                        'conditions' => array(
                                'Variable.name' => VariableModel::ENTERPRISE_CULTURE
                        ), // 查询条件数组
                        'recursive' => 1, // 整型
                                          // 字段名数组
                        'fields' => array(
                                'Variable.id',
                                'Variable.name',
                                'Variable.value',
                                'Variable.created',
                                'Variable.modified'
                        ),
                        // 定义排序的字符串或者数组
                        'order' => array(
                                'Variable.modified DESC'
                        ),
                        'limit' => 1
                ));
        if (empty($this->data)) {
            $this->data = array(
                    'Variable' => array(
                            'id' => 0,
                            'name' => VariableModel::ENTERPRISE_CULTURE,
                            'value' => ''
                    )
            );
        }
        $this->set('data', $this->data);
    }

    public function admin_development ()
    {
        $this->Helper = array(
                'form'
        );
        $this->set('isAdmin', true);
        
        if (! empty($this->data)) {
            $this->Variable->save($this->data);
        }
        
        $this->data = $this->Variable->find('first', 
                array(
                        'conditions' => array(
                                'Variable.name' => VariableModel::ENTERPRISE_DEVELOPMENT
                        ), // 查询条件数组
                        'recursive' => 1, // 整型
                                          // 字段名数组
                        'fields' => array(
                                'Variable.id',
                                'Variable.name',
                                'Variable.value',
                                'Variable.created',
                                'Variable.modified'
                        ),
                        // 定义排序的字符串或者数组
                        'order' => array(
                                'Variable.modified DESC'
                        ),
                        'limit' => 1
                ));
        if (empty($this->data)) {
            $this->data = array(
                    'Variable' => array(
                            'id' => 0,
                            'name' => VariableModel::ENTERPRISE_DEVELOPMENT,
                            'value' => ''
                    )
            );
        }
        $this->set('data', $this->data);
    }
}
