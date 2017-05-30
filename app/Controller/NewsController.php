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
App::uses('News', 'Model');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an
 * application
 *
 * @package app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class NewsController extends AppController
{

    /**
     * This controller uese following models
     *
     * @var array
     */
    public $uses = [
            'News'
    ];

    /**
     * Specify layout used in this page.
     */
    public $layout = 'default_r';

    /**
     * This controller uses following helpers
     *
     * @var array
     */
    public $helpers = [
            'Tag'
    ];

    /**
     * Displays a view
     *
     * @return void
     * @throws NotFoundException When the view file could not be found
     *         or MissingViewException in debug mode.
     */
    public function index ()
    {
        $this->set('data', $this->getNewsList(News::NEWSTYPE_ENTERPRISE));
        $this->set('inews', 'E');
    }

    public function inews ()
    {
        $this->set('data', $this->getNewsList(News::NEWSTYPE_INDUSTRY));
        $this->set('inews', 'I');
        $this->render('index');
    }

    public function search ()
    {
        if (empty($this->data['News']['keyword'])) {
            $this->set('data', []);
        } else {
            $this->set('data', 
                    $this->News->find('search', 
                            [
                                    'keyword' => $this->data['News']['keyword']
                            ]));
        }
        $this->set('inews', 'S');
        $this->render('index');
    }

    public function newsdetail ($id = null)
    {
        if (empty($id) || ! is_numeric($id) || $id < 0) {
            $this->set('data', []);
        } else {
            $this->set('data', 
                    $this->News->find('first', 
                            [
                                    'conditions' => [
                                            'id' => $id
                                    ]
                            ]));
        }
    }

    public function admin_search ()
    {
        $this->set('isAdmin', true);
        $this->search();
    }

    public function admin_newsdetail ($id = null)
    {
        $this->set('isAdmin', true);
        $this->newsdetail($id);
        $this->render('newsdetail');
    }

    public function admin_index ()
    {
        $this->set('isAdmin', true);
        $this->set('data', $this->getNewsList(News::NEWSTYPE_ENTERPRISE));
        $this->render('index');
    }

    public function admin_inews ()
    {
        $this->set('isAdmin', true);
        $this->set('inews', true);
        $this->set('data', $this->getNewsList(News::NEWSTYPE_INDUSTRY));
        $this->render('index');
    }

    public function admin_savenews ($id = null)
    {
        $this->set('isAdmin', true);
        
        $this->layout = false;
        $this->autoRender = false;
        
        // Add/Modify/Delete a news
        if (isset($this->data) && ! empty($this->data)) {
            if (isset($this->data['News']['id']) &
                     ! empty($this->data['News']['id'])) {
                if ($this->data['News']['action'] == 'E') {
                    $this->News->save($this->data);
                    
                    $this->log('Save News: ' . $this->data['News']['id']);
                } elseif ($this->data['News']['action'] == 'D') {
                    $this->News->delete($this->data['News']['id']);
                    
                    $this->log('Delete News: ' . $this->data['News']['id']);
                } else {
                    
                    $this->log(
                            'admin_savenews: 非法的action (' .
                                     $this->data['News']['action'] . ')');
                }
            } else {
                $this->News->save($this->data);
                
                $this->log('Add News :' . $this->News->getInsertID());
            }
            return;
        }
        
        // Get news for Edit/Delete Page
        if (! empty($id)) {
            $this->set('data', 
                    $this->News->find('first', 
                            [
                                    'conditions' => 'id=' . $id
                            ]));
            $this->log('Edit News');
        } else {
            // Prepare blank record for Add Page
            $this->set('data', 
                    [
                            'News' => [
                                    'id' => '',
                                    'title' => '',
                                    'type' => News::NEWSTYPE_ENTERPRISE,
                                    'content' => ''
                            ]
                    ]);
            
            $this->log('Add News');
        }
        $this->render();
    }

    /**
     * Controller for Element newslist.ctp
     *
     * @return unknown
     */
    public function getAllNewsList ($limit = 0)
    {
        return $this->getNewsList(null, $limit);
    }

    public function admin_getAllNewsList ($limit = 0)
    {
        return $this->getAllNewsList($limit);
    }

    /**
     * 取得新闻列表
     *
     *
     * @param unknown $type
     *            新闻类型（企业新闻、行业新闻、所有）。
     *            $type为null时返回所有新闻列表。
     * @param number $limit
     *            取得件数上限
     * @return unknown
     */
    private function getNewsList ($type = null, $limit = 0)
    {
        $options = [
                'fields' => [
                        'News.id',
                        'News.title'
                ]
        ];
        if (! empty($type)) {
            $options['conditions']['type'] = $type;
        }
        if ($limit != 0) {
            $options['limit'] = $limit;
        }
        return $this->News->find('all', $options);
    }
}
