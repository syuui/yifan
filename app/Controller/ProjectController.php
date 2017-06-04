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

    public function admin_index ()
    {
        $this->set('isAdmin', true);
        $this->index();
        $this->render('index');
    }

    public function admin_savepost ($id = null)
    {
        $this->set('isAdmin', true);
        
        $this->layout = false;
        $this->autoRender = false;
        
        // Add/Modify/Delete a job
        if (isset($this->data) && ! empty($this->data)) {
            if (isset($this->data['Post']['id']) &
                     ! empty($this->data['Post']['id'])) {
                if ($this->data['Post']['action'] == 'E') {
                    $this->Post->save($this->data);
                    
                    $this->log('Save Post: ' . $this->data['Post']['id']);
                } elseif ($this->data['Post']['action'] == 'D') {
                    $this->Post->delete($this->data['Post']['id']);
                    
                    $this->log('Delete Post: ' . $this->data['Post']['id']);
                } else {
                    
                    $this->log(
                            'admin_savenews: 非法的action (' .
                                     $this->data['Post']['action'] . ')');
                }
            } else {
                $this->Post->save($this->data);
                
                $this->log('Add Recruit :' . $this->Post->getInsertID());
            }
            return;
        }
        
        // Get news for Edit/Delete Page
        if (! empty($id)) {
            $this->set('data', 
                    $this->Post->find('first', 
                            [
                                    'conditions' => 'id=' . $id
                            ]));
            $this->log('Edit Post');
        } else {
            // Prepare blank record for Add Page
            $this->set('data', 
                    [
                            'Post' => [
                                    'id' => '',
                                    'title' => '',
                                    'salary' => '',
                                    'location' => '',
                                    'description' => '',
                                    'public' => true
                            ]
                    ]);
            
            $this->log('Add Post');
        }
        $this->render();
    }
}
