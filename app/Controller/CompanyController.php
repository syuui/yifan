<?php
/**
 * Static content controller.
 *
 * This file will render views from views/Company/
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
App::uses('Variable', 'Model');
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
class CompanyController extends AppController
{

    const TYPE_DESCRIPTION = 'D';

    const TYPE_CULTURE = 'C';

    const TYPE_DEVELOPMENT = 'V';

    const TYPE_LANHAM = 'L';

    /**
     * 此控制器中使用以下模型
     *
     * @var array
     */
    public $uses = [
            'Variable'
    ];

    /**
     * 此控制器中使用以下助件
     *
     * @var array
     */
    public $helpers = [
            'Tag'
    ];

    /**
     * 此控制器使用的布局
     *
     * @var string
     */
    public $layout = 'default_l';

    /**
     * 用户用页面的控制器
     *
     * @param string $type
     *            CompanyController::TYPE_DESCRIPTION: 企业简介
     *            CompanyController::TYPE_CULTURE: 企业文化
     *            CompanyController::TYPE_DEVELOPMENT: 发展战略
     *            CompanyController::TYPE_LANHAM: 朗豪风采
     */
    public function index ($type = CompanyController::TYPE_DESCRIPTION)
    {
        switch ($type) {
            case CompanyController::TYPE_DESCRIPTION:
                $name = Variable::ENTERPRISE_DESCRIPTION;
                $pics = Variable::ENTERPRISE_DESCRIPTION_PIC;
                $page_title = '企业简介';
                break;
            case CompanyController::TYPE_CULTURE:
                $name = Variable::ENTERPRISE_CULTURE;
                $pics = Variable::ENTERPRISE_CULTURE_PIC;
                $page_title = '企业文化';
                break;
            case CompanyController::TYPE_DEVELOPMENT:
                $name = Variable::ENTERPRISE_DEVELOPMENT;
                $pics = Variable::ENTERPRISE_DEVELOPMENT_PIC;
                $page_title = '发展战略';
                break;
            case CompanyController::TYPE_LANHAM:
                $name = Variable::ENTERPRISE_LANHAM;
                $pics = Variable::ENTERPRISE_LANHAM_PIC;
                $page_title = '朗豪风采';
                break;
            default:
                $name = Variable::ENTERPRISE_DESCRIPTION;
                $pics = Variable::ENTERPRISE_DESCRIPTION_PIC;
                $page_title = '企业简介';
                break;
        }
        $this->set('pics', $this->getPageData($pics, 'all'));
        $this->set('data', $this->getPagedata($name));
        $this->set('type', $type);
        $this->set('page_title', $page_title);
    }

    /**
     * 管理用页面的控制器
     *
     * @return void
     */
    public function admin_index ($type = CompanyController::TYPE_DESCRIPTION)
    {
        $this->set('isAdmin', true);
        
        if (! empty($this->data)) {
            $this->Variable->save($this->data);
        }
        $this->index($type);
    }

    /**
     * 管理用页面 - 修改正文内容的控制器
     * AJAX服务器端
     *
     * @param string $type            
     */
    public function admin_index_edit (
            $type = CompanyController::TYPE_DESCRIPTION)
    {
        $this->set('isAdmin', true);
        $this->layout = 'mLayer';
        
        switch ($type) {
            case CompanyController::TYPE_DESCRIPTION:
                $name = Variable::ENTERPRISE_DESCRIPTION;
                $page_title = '企业简介';
                break;
            case CompanyController::TYPE_CULTURE:
                $name = Variable::ENTERPRISE_CULTURE;
                $page_title = '企业文化';
                break;
            case CompanyController::TYPE_DEVELOPMENT:
                $name = Variable::ENTERPRISE_DEVELOPMENT;
                $page_title = '发展战略';
                break;
            case CompanyController::TYPE_LANHAM:
                $name = Variable::ENTERPRISE_LANHAM;
                $page_title = '朗豪风采';
                break;
            default:
                $name = Variable::ENTERPRISE_DESCRIPTION;
                $page_title = '企业简介';
                break;
        }
        $this->set('type', $type);
        $this->set('name', $name);
        $this->set('data', $this->getPageData($name));
        $this->set('page_title', $page_title);
    }

    /**
     * 管理用页面 - 修改图片的控制器
     * AJAX服务器端
     *
     * @return void
     */
    public function admin_index_editpic (
            $type = CompanyController::TYPE_DESCRIPTION)
    {
        $this->set('isAdmin', true);
        
        $this->layout = 'mLayer';
        
        switch ($type) {
            case CompanyController::TYPE_DESCRIPTION:
                $pics = Variable::ENTERPRISE_DESCRIPTION_PIC;
                break;
            case CompanyController::TYPE_CULTURE:
                $pics = Variable::ENTERPRISE_CULTURE_PIC;
                break;
            case CompanyController::TYPE_DEVELOPMENT:
                $pics = Variable::ENTERPRISE_DEVELOPMENT_PIC;
                break;
            case CompanyController::TYPE_LANHAM:
                $pics = Variable::ENTERPRISE_LANHAM_PIC;
                break;
            default:
                $pics = Variable::ENTERPRISE_DESCRIPTION_PIC;
                break;
        }
        if (! empty($this->data)) {
            if ($this->data['Post_action'] === '删除') {
                $this->delPicture();
            } elseif ($this->data['Post_action'] === '增加图片') {
                $this->addPicture($pics);
            } else {
                $this->log('admin_index_editpic: 非法的action');
            }
            $this->redirect(
                    [
                            'controller' => 'company',
                            'action' => 'index',
                            $type
                    ]);
        }
        $this->set('pics', $this->getPageData($pics, 'all'));
    }

    /**
     * 取得页面数据
     *
     * @param unknown $varName
     *            Variable表中的变量名称
     * @param string $findMethod
     *            模型中的findMethod
     *            
     * @return unknown
     */
    private function getPageData ($varName, $findMethod = 'first')
    {
        return $this->Variable->find($findMethod, 
                [
                        'conditions' => [
                                'Variable.name' => $varName
                        ]
                ]);
    }

    /**
     * 删除图片
     */
    private function delPicture ()
    {
        if (empty($this->data)) {
            return;
        }
        
        $this->Variable->delete($this->data['Variable']['id']);
        $npic = $this->Variable->find('count', 
                [
                        'conditions' => [
                                'Variable.value' => $this->data['Variable']['value']
                        ]
                ]);
        if ($npic <= 0) {
            $imgPath = WWW_ROOT . 'img\\' . Uploaditem::UPLOAD_IMAGE . '\\' .
                     $this->data['Variable']['value'];
            unlink($imgPath);
        }
    }

    /**
     * 追加图片
     *
     * @param unknown $varName
     *            Variable表中的变量名称
     */
    private function addPicture ($varName)
    {
        if (empty($this->data['Variable']['file']['tmp_name'])) {
            return;
        }
        
        $imgPath = WWW_ROOT . 'img\\' . Uploaditem::UPLOAD_IMAGE . '\\' .
                 $this->data['Variable']['file']['name'];
        $d = [
                'Variable' => [
                        'name' => $varName,
                        'value' => $this->data['Variable']['file']['name']
                ]
        ];
        $this->Variable->save($d);
        
        if (! file_exists($imgPath)) {
            copy($this->data['Variable']['file']['tmp_name'], $imgPath);
        }
    }
}
