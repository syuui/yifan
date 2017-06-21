<?php
App::uses('AppController', 'Controller');
App::uses('Uploaditem', 'Model');

/**
 * 管理工具 页面的控制器
 *
 * @author Wei.ZHOU
 * @version 1.0
 */
class ToolsController extends AppController
{

    const ADMIN_PASSWORD = 'ZhangYiFan01';

    /**
     * 此控制器使用以下模型
     *
     * @var array
     */
    var $uses = [
            'Variable'
    ];

    /*
     * 此控制器使用下列助件
     *
     * @var array
     */
    public $helper = [
            'Tag'
    ];

    /**
     * 此控制器使用以下组件
     *
     * @var array
     */
    var $components = [
            'Session'
    ];

    /**
     * 此控制器中所用页面均使用以下布局
     */
    public $layout = 'default_l';

    /**
     * 此控制器中所有功能皆为管理员用
     */
    public function beforeRender ()
    {
        $this->set('isAdmin', true);
    }

    /**
     * 网页横幅、LOGO设置页面的控制器
     *
     * @param string $type
     *            L:LOGO
     *            其它：横幅
     */
    public function admin_banner ($type = 'B')
    {
        $this->set('type', $type);
        
        if ($type === 'L') {
            $tar = WWW_ROOT . 'img\\' . Configure::read('logo_filename');
        } else {
            $tar = WWW_ROOT . 'img\\' . Configure::read('banner_filename');
        }
        
        if (! empty($this->data['Variable']['bannerfile']['tmp_name'])) {
            if (file_exists($tar)) {
                unlink($tar);
                $this->warning('图片已存在(' . $tar . ')，删除完毕');
            }
            copy($this->data['Variable']['bannerfile']['tmp_name'], $tar);
            $this->warning('拷贝新文件(' . $tar . ')');
        }
        $this->set('page_title', $type === 'L' ? '网站LOGO' : '网站横幅');
    }

    public function admin_login ()
    {
        $this->layout = false;
        if (! empty($this->data)) {
            if ($this->data['Login']['username'] === 'lanham' && $this->data['Login']['password'] ===
                     ToolsController::ADMIN_PASSWORD) {
                $this->warning('管理员用户登录成功');
                
                $this->Session->write('login', true);
                $this->redirect(
                        [
                                'controller' => 'pages',
                                'action' => 'index'
                        ]);
            } else {
                $this->set('error_message', '错误的用户名/密码');
                $this->warning(
                        '管理员用户登录失败：(ID:' . $this->data['Login']['username'] .
                                 '  PW:' . $this->data['Login']['password']) . ')';
            }
        }
    }

    public function admin_logout ()
    {
        $this->Session->delete('login');
        $this->redirect(
                [
                        'controller' => 'tools',
                        'action' => 'login'
                ]);
    }
}


