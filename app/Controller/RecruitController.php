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
class RecruitController extends AppController
{

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

    var $helpers = [
            'Paginator'
    ];

    var $layout = 'default_r';

    /**
     * Displays a view
     *
     * @return void
     * @throws NotFoundException When the view file could not be found
     *         or MissingViewException in debug mode.
     */
    public function index ()
    {
        $this->paginate['Recruit']['limit'] = Configure::read(
                'recruit_page_length');
        $this->Paginator->settings = $this->paginate;
        $this->set('data', $this->Paginator->paginate('Recruit'));
    }

    public function jobdetail ($id = null)
    {
        if (! empty($id)) {
            $this->set('data', 
                    $this->Recruit->find('first', 
                            [
                                    'conditions' => [
                                            'id' => $id
                                    ]
                            ]));
        }
    }

    public function strategy ()
    {
        $this->set('data', 
                $this->Variable->find('first', 
                        [
                                'conditions' => [
                                        'Variable.name' => Variable::RECRUIT_STRATEGY
                                ],
                                'limit' => 1
                        ]));
    }

    public function entry ()
    {
        ;
    }

    public function admin_entry ()
    {
        $this->set('isAdmin', true);
        $this->entry();
        $this->render('entry');
    }

    public function admin_index ()
    {
        $this->set('isAdmin', true);
        
        $this->index();
        $this->render('index');
    }

    public function admin_strategy ()
    {
        $this->Helper = [
                'form'
        ];
        $this->set('isAdmin', true);
        
        if (! empty($this->data)) {
            $this->Variable->save($this->data);
        }
        
        $this->data = $this->Variable->find('first', 
                [
                        'conditions' => [
                                'Variable.name' => Variable::RECRUIT_STRATEGY
                        ],
                        'limit' => 1
                ]);
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

    public function admin_savejob ($id = null)
    {
        $this->set('isAdmin', true);
        
        $this->layout = false;
        $this->autoRender = false;
        
        // Add/Modify/Delete a job
        if (isset($this->data) && ! empty($this->data)) {
            if (isset($this->data['Recruit']['id']) &
                     ! empty($this->data['Recruit']['id'])) {
                if ($this->data['Recruit']['action'] == 'E') {
                    $this->Recruit->save($this->data);
                    
                    $this->log('Save Recruit: ' . $this->data['Recruit']['id']);
                } elseif ($this->data['Recruit']['action'] == 'D') {
                    $this->Recruit->delete($this->data['Recruit']['id']);
                    
                    $this->log(
                            'Delete Recruit: ' . $this->data['Recruit']['id']);
                } else {
                    
                    $this->log(
                            'admin_savenews: 非法的action (' .
                                     $this->data['Recruit']['action'] . ')');
                }
            } else {
                $this->Recruit->save($this->data);
                
                $this->log('Add Recruit :' . $this->Recruit->getInsertID());
            }
            return;
        }
        
        // Get news for Edit/Delete Page
        if (! empty($id)) {
            $this->set('data', 
                    $this->Recruit->find('first', 
                            [
                                    'conditions' => 'id=' . $id
                            ]));
            $this->log('Edit Recruit');
        } else {
            // Prepare blank record for Add Page
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
            
            $this->log('Add Recruit');
        }
        $this->render();
    }

    /**
     * Controller for Element newslist.ctp
     *
     * @return unknown
     */
    public function getAllRecruitList ($limit = 0)
    {
        return $this->getRecruitList($limit);
    }

    public function admin_getAllRecruitList ($limit = 0)
    {
        return $this->getRecruitList($limit);
    }

    /**
     * 取得职位信息列表
     *
     *
     * @param unknown $type
     *            新闻类型（企业新闻、行业新闻、所有）。
     *            $type为null时返回所有新闻列表。
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
}
