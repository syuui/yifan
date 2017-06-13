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
     * 此控制器中使用以下模型
     *
     * @var array
     */
    public $uses = [
            'News'
    ];

    /**
     * 此控制器使用的布局
     *
     * @var string
     */
    public $layout = 'default_r';

    /**
     * 此控制器中使用以下助件
     *
     * @var array
     */
    public $helpers = [
            'Tag'
    ];

    /**
     * [新闻资讯]-[公司动态]的控制器
     *
     * @return void
     */
    public function index ()
    {
        $this->set('data', $this->getNewsList(News::NEWSTYPE_ENTERPRISE));
        $this->set('inews', 'E');
    }

    /**
     * [新闻资讯]-[行业动态]的控制器
     *
     * 这个控制器与 index 控制器共用一个视图
     *
     * @return void
     */
    public function inews ()
    {
        $this->set('data', $this->getNewsList(News::NEWSTYPE_INDUSTRY));
        $this->set('inews', 'I');
        $this->render('index');
    }

    /**
     * [新闻资讯]-[搜索]
     *
     * 这个控制器与 index 控制器共用一个视图
     *
     * @return void
     */
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

    /**
     * [新闻资讯]-[新闻内容]的控制器
     *
     * @param unknown $id            
     */
    public function newsdetail ($id = null)
    {
        if (empty($id) || ! is_numeric($id)) {
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

    /**
     * 管理工具 [新闻资讯]-[搜索]
     *
     * 这个控制器与 index 控制器共用一个视图
     *
     * @return void
     */
    public function admin_search ()
    {
        $this->set('isAdmin', true);
        $this->search();
    }

    /**
     * 管理工具 [新闻资讯]-[新闻内容]
     *
     * 这个控制器与 newsdetail 控制器共用一个视图
     *
     * @return void
     */
    public function admin_newsdetail ($id = null)
    {
        $this->set('isAdmin', true);
        $this->newsdetail($id);
        $this->render('newsdetail');
    }

    /**
     * 管理工具 [新闻资讯]-[公司动态]的控制器
     *
     * 这个控制器与 index 控制器共用一个视图
     *
     * @return void
     */
    public function admin_index ()
    {
        $this->set('isAdmin', true);
        $this->set('data', $this->getNewsList(News::NEWSTYPE_ENTERPRISE));
        $this->render('index');
    }

    /**
     * 管理工具 [新闻资讯]-[行业动态]的控制器
     *
     * 这个控制器与 index 控制器共用一个视图
     *
     * @return void
     */
    public function admin_inews ()
    {
        $this->set('isAdmin', true);
        $this->set('inews', true);
        $this->set('data', $this->getNewsList(News::NEWSTYPE_INDUSTRY));
        $this->render('index');
    }

    /**
     * 管理工具 [新闻资讯]-[公司动态]的控制器
     *
     * 新闻数据的增、删、改的逻辑。
     *
     * @return void
     */
    public function admin_savenews ($id = null)
    {
        $this->set('isAdmin', true);
        
        $this->layout = false;
        $this->autoRender = false;
        
        // 增删改的逻辑
        if (! empty($this->data)) {
            if (empty($this->data['News']['id'])) {
                if ($this->data['News']['action'] == 'E') {
                    // 改
                    $this->News->save($this->data);
                } elseif ($this->data['News']['action'] == 'D') {
                    // 删
                    $this->News->delete($this->data['News']['id']);
                } else {
                    $this->log(
                            'admin_savenews: 非法的action (' .
                                     $this->data['News']['action'] . ')');
                }
            } else {
                // 增
                $this->News->save($this->data);
            }
            return;
        }
        
        // 为页面准备既有数据
        if (! empty($id)) {
            $this->set('data', 
                    $this->News->find('first', 
                            [
                                    'conditions' => 'id=' . $id
                            ]));
        } else {
            // 为页面准备空数据
            $this->set('data', 
                    [
                            'News' => [
                                    'id' => '',
                                    'title' => '',
                                    'type' => News::NEWSTYPE_ENTERPRISE,
                                    'content' => ''
                            ]
                    ]);
        }
        $this->render();
    }

    /**
     * [元素块]-[新闻一览]的控制器
     *
     * @return unknown
     */
    public function getAllNewsList ($limit = 0)
    {
        return $this->getNewsList(null, $limit);
    }

    /**
     * 管理工具 [元素块]-[新闻一览]的控制器
     *
     * @return unknown
     */
    public function admin_getAllNewsList ($limit = 0)
    {
        return $this->getAllNewsList($limit);
    }

    /**
     * 取得新闻列表
     *
     * 这个方法为各控制器中所用的新闻信息列表取得数据
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
