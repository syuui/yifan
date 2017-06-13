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
            'Post',
            'Sector',
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
            'Post' => [
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
        $this->paginate['Posts']['limit'] = Configure::read('page_length');
        $this->Paginator->settings = $this->paginate;
        $this->set('data', $this->Paginator->paginate('Post'));
    }

    public function postdetail ($id = null)
    {
        if (! empty($id)) {
            $this->set('data', 
                    $this->Post->find('first', 
                            [
                                    'conditions' => [
                                            'id' => $id
                                    ]
                            ]));
            $this->set('sectors', 
                    $this->Sector->find('all', 
                            [
                                    'conditions' => [
                                            'post_id' => $id
                                    ]
                            ]));
        }
    }

    public function admin_postdetail ($id = null)
    {
        $this->set('isAdmin', true);
        $this->postdetail($id);
        $this->render('postdetail');
    }

    public function admin_index ()
    {
        $this->set('isAdmin', true);
        $this->index();
        $this->render('index');
    }

    public function admin_savepost ($id = null)
    {
        $this->set('isAdmin', true);
        
        if (! empty($this->data)) {
            if ($this->data['Post_action'] === "保存") {
                $this->Post->save($this->data['Post']);
            } elseif ($this->data['Post_action'] === "删除文章") {
                $this->Post->delete($this->data['Post']['id']);
            }
            $this->redirect([
                    'controller' => 'project',
                    'action' => 'index'
            ]);
        }
        
        // Get records for Edit/Delete Page
        if (! empty($id)) {
            $this->set('data', 
                    $this->Post->find('first', 
                            [
                                    'conditions' => [
                                            'id' => $id
                                    ]
                            ]));
            $this->set('sectors', 
                    $this->Sector->find('all', 
                            [
                                    'conditions' => [
                                            'post_id' => $id
                                    ]
                            ]));
            $this->log('Edit Post');
        } else {
            // Prepare blank record for Add Page
            $this->set('data', 
                    [
                            'Post' => [
                                    'id' => '',
                                    'title' => ''
                            ]
                    ]);
            
            $this->log('Add Post');
        }
    }

    public function admin_savesector ()
    {
        $this->set('isAdmin', true);
        
        if (! isset($this->data['Sector_action'])) {
            $this->log('Project: admin_savesector: Bad Sector_action');
            
            // TODO: Error
        }
        
        switch ($this->data['Sector_action']) {
            case "保存":
                if (! empty($this->data['Sector']['id'])) {
                    $this->Sector->save($this->data['Sector']);
                } else {
                    ;
                    // TODO: error
                }
                break;
            case "删除":
                if (! empty($this->data['Sector']['id'])) {
                    $this->Sector->delete($this->data['Sector']['id']);
                } else {
                    ;
                    // TODO: error
                }
                break;
            
            case "增加节":
                if (! empty($this->data['Sector']['post_id'])) {
                    $sql = "SELECT MAX(`Sector`.`seq`) AS `maxseq` " .
                             "FROM `sectors` as `Sector` WHERE `Sector`.`post_id` = " .
                             $this->data['Sector']['post_id'] . " Limit 1";
                    $r = $this->Sector->query($sql);
                    
                    $d = [
                            'Sector' => [
                                    'post_id' => $this->data['Sector']['post_id'],
                                    'seq' => $r[0][0]['maxseq'] + 10
                            ]
                    ];
                    $this->Sector->save($d);
                } else {
                    $this->log(
                            'Project: admin_savesector: bad post_id:' .
                                     $this->data['Secotr']['post_id']);
                    // TODO: error
                }
                break;
            
            default:
                // TODO: error
                break;
        }
        
        $id = $this->data['Sector']['post_id'];
        $this->data = null;
        $this->postdetail($id);
        $this->render('postdetail');
    }
}
