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

    public function admin_uploadpic ()
    {
        $this->set('data', 
                $this->Uploaditem->find('all', 
                        [
                                'type' => Uploaditem::UPLOAD_IMAGE
                        ]));
    }

    public function admin_deletepic ()
    {
        $tar_path = WWW_ROOT . 'img\\' . Uploaditem::UPLOAD_IMAGE . '\\';
        
        if (! empty($this->data) && isset($this->data['Uploaditem']['id']) &&
                 ! empty($this->data['Uploaditem']['id'])) {
            
            $d = $this->Uploaditem->find('first', 
                    [
                            'conditions' => [
                                    'id' => $this->data['Uploaditem']['id']
                            ]
                    ]);
            if (empty($d) || empty($d['Uploaditem'])) {
                $this->log(
                        'Uploaditem not exists. ID: ' .
                                 $this->data['Uploaditem']['id']);
            }
            if (file_exists($tar_path . $d['Uploaditem']['filename']) &&
                     unlink($tar_path . $d['Uploaditem']['filename'])) {
                $this->Uploaditem->delete($this->data['Uploaditem']['id']);
            } else {
                $this->log(
                        'Uploaditem file not exist: ' . $tar_path .
                                 $d['Uploaditem']['filename']);
            }
        }
        
        $this->redirect(
                [
                        'controller' => 'tools',
                        'action' => 'uploadpic'
                ]);
    }

    public function admin_editpic ($id = null)
    {
        $tar_path = WWW_ROOT . 'img\\' . Uploaditem::UPLOAD_IMAGE . '\\';
        
        if (! empty($this->data)) {
            
            $d = $this->data;
            $saved = true;
            
            if (isset($d['Uploaditem']['file'])) {
                // 新增图片
                if (empty($d['Uploaditem']['file']['tmp_name'])) {
                    // 没选择任何图片
                    $saved = false;
                    $this->log('没选择任何图片');
                } else {
                    $d['Uploaditem']['filename'] = $this->data['Uploaditem']['file']['name'];
                    $d['Uploaditem']['folder'] = Uploaditem::UPLOAD_IMAGE;
                    
                    if ($this->Uploaditem->save($d)) {
                        copy($d['Uploaditem']['file']['tmp_name'], 
                                $tar_path . $d['Uploaditem']['file']['name']);
                        $this->log(
                                "Copy file " .
                                         $d['Uploaditem']['file']['tmp_name'] .
                                         " to " . $tar_path .
                                         $d['Uploaditem']['file']['name']);
                        $saved = true;
                    } else {
                        $saved = false;
                        $this->log('Failed to save a new file');
                    }
                }
            } else {
                // 编辑现有图片
                if ($this->Uploaditem->save($d)) {
                    $this->log('Updated files.');
                    $saved = true;
                } else {
                    $saved = false;
                    $this->log('Failed to update files');
                }
            }
            if ($saved) {
                $this->redirect(
                        [
                                'controller' => 'tools',
                                'action' => 'uploadpic'
                        ]);
            }
        }
        
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
    }
}


