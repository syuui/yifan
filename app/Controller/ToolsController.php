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
class ToolsController extends AppController
{

    /**
     * This controller does not use a model
     *
     * @var array
     */
    var $uses = [
            'Uploaditem',
            'Variable'
    ];

    /*
     * 此controller使用下列helper
     *
     * @var array
     */
    public $helper = [
            'Tag'
    ];

    /**
     * Specify the layout used in this controller
     */
    public $layout = 'default_l';

    public function beforeRender ()
    {
        $this->set('isAdmin', true);
    }

    public function admin_banner ($type = 'B')
    {
        $this->set('type', $type);
        
        if ($type === 'L') {
            $tar = WWW_ROOT . 'img\\' . Configure::read('logo_filename');
        } else {
            $tar = WWW_ROOT . 'img\\' . Configure::read('banner_filename');
        }
        
        if (isset($this->data['Variable']['bannerfile']) &
                 ! empty($this->data['Variable']['bannerfile'])) {
            
            if (empty($this->data['Variable']['bannerfile']['tmp_name'])) {
                // 没选择任何图片
                $this->log('没选择任何图片');
            } else {
                if (file_exists($tar)) {
                    unlink($tar);
                }
                copy($this->data['Variable']['bannerfile']['tmp_name'], $tar);
                $this->log("Copy file to $tar");
            }
        }
        $this->set('page_title', $type === 'L' ? '网站LOGO' : '网站横幅');
    }
}


