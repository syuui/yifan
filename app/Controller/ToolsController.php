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
            'Uploaditem'
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

    public function admin_uploadpic ()
    {
        $tar_path = WWW_ROOT . 'img\\' . Uploaditem::UPLOAD_IMAGE . '\\';
        if (! empty($this->data)) {
            $d = $this->data;
            if (isset($d['Uploaditem']['file'])) {
                // 新增图片
                if (empty($d['Uploaditem']['file']['tmp_name'])) {
                    // 没选择任何图片
                    $this->set('saveFailed', true);
                    $this->log('没选择任何图片');
                } else {
                    $d['Uploaditem']['filename'] = $this->data['Uploaditem']['file']['name'];
                    $d['Uploaditem']['folder'] = Uploaditem::UPLOAD_IMAGE;
                    
                    copy($d['Uploaditem']['file']['tmp_name'], 
                            $tar_path . $d['Uploaditem']['file']['name']);
                    if (! $this->Uploaditem->save($d)) {
                        $this->set('saveFailed', true);
                    }
                }
            } else {
                if (! $this->Uploaditem->save($d)) {
                    $this->set('saveFailed', true);
                }
            }
        }
        
        $this->set('data', 
                $this->Uploaditem->find('all', 
                        [
                                'type' => Uploaditem::UPLOAD_IMAGE
                        ]));
    }

    public function admin_deletepic ()
    {
        if (! empty($this->data) && isset($this->data['Uploaditem']['id']) &&
                 ! empty($this->data['Uploaditem']['id'])) {
            $this->Uploaditem->delete($this->data['Uploaditem']['id']);
        }
        
        $this->redirect(
                [
                        'controller' => 'tools',
                        'action' => 'uploadpic'
                ]);
    }

    public function admin_editpic ($id = null)
    {
        if (! empty($id)) {
            $this->data = $this->Uploaditem->find('first', 
                    [
                            'conditions' => [
                                    'Uploaditem.id' => $id
                            ]
                    ]);
            $this->set('data', $this->data);
        }
    }
}
