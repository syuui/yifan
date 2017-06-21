<?php
App::uses('AppController', 'Controller');
App::uses('News', 'Model');

/**
 * 新闻资讯 控制器
 *
 * @author Wei.ZHOU
 * @version 1.0
 *         
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
     *            新闻ID
     */
    public function newsdetail ($id = null)
    {
        if (empty($id) || ! is_numeric($id)) {
            $this->warning('ID为空');
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
     * @param unknown $id
     *            新闻ID
     * @throws InternalErrorException DEBUG模式下中止运行，商用模式下抛出InternalErrorException
     */
    public function admin_savenews ($id = null)
    {
        $this->set('isAdmin', true);
        
        $this->layout = 'mlayer';
        
        // 增删改的逻辑
        if (! empty($this->data)) {
            if ($this->data['Post_action'] === '确定') {
                $this->News->save($this->data);
            } elseif ($this->data['Post_action'] === '删除') {
                $this->News->delete($this->data['News']['id']);
            } else {
                $this->warning('非法的action (' . $this->data['Post_action'] . ')');
                if (Configure::read('debug')) {
                    die('非法的action (' . $this->data['Post_action'] . ')');
                } else {
                    throw new InternalErrorException();
                }
            }
            $this->redirect(
                    [
                            'controller' => 'news',
                            'action' => 'newsdetail',
                            $this->data['News']['id']
                    ]);
        }
        
        if (empty($id)) {
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
        } else {
            // 为页面准备既有数据
            $this->set('data', 
                    $this->News->find('first', 
                            [
                                    'conditions' => 'id=' . $id
                            ]));
        }
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
