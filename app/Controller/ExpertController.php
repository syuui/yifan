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
class ExpertController extends AppController
{

    const TYPE_LESSION = 'L';

    const TYPE_CLINIC = 'C';

    const TYPE_ROUND = 'R';

    const TYPE_OPERATION = 'O';

    const TYPE_COMMUNICATION = 'M';

    const TYPE_OPENING = 'P';

    const UPLOAD_IMAGE = 'posts';

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
     *            ExpertController::TYPE_LESSION: 企业简介
     *            CompanyController::TYPE_CULTURE: 企业文化
     *            CompanyController::TYPE_DEVELOPMENT: 发展战略
     *            CompanyController::TYPE_LANHAM: 朗豪风采
     */
    public function index ($type = ExpertController::TYPE_LESSION)
    {
        switch ($type) {
            case ExpertController::TYPE_LESSION:
                $name = Variable::EXPERT_LESSION;
                $pics = Variable::EXPERT_LESSION_PIC;
                $page_title = '专家授课';
                break;
            case ExpertController::TYPE_CLINIC:
                $name = Variable::EXPERT_CLINIC;
                $pics = Variable::EXPERT_CLINIC_PIC;
                $page_title = '专家义诊';
                break;
            case ExpertController::TYPE_ROUND:
                $name = Variable::EXPERT_ROUND;
                $pics = Variable::EXPERT_ROUND_PIC;
                $page_title = '专家查房';
                break;
            case ExpertController::TYPE_OPERATION:
                $name = Variable::EXPERT_OPERATION;
                $pics = Variable::EXPERT_OPERATION_PIC;
                $page_title = '手术教学';
                break;
            case ExpertController::TYPE_COMMUNICATION:
                $name = Variable::EXPERT_COMMUNICATION;
                $pics = Variable::EXPERT_COMMUNICATION_PIC;
                $page_title = '学术交流';
                break;
            case ExpertController::TYPE_OPENING:
                $name = Variable::EXPERT_OPENING;
                $pics = Variable::EXPERT_OPENING_PIC;
                $page_title = '帮扶中心揭牌';
                break;
            default:
                $name = Variable::EXPERT_LESSION;
                $pics = Variable::EXPERT_LESSION_PIC;
                $page_title = '专家授课';
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
    public function admin_index ($type = ExpertController::TYPE_LESSION)
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
    public function admin_edit ($type = ExpertController::TYPE_LESSION)
    {
        $this->set('isAdmin', true);
        $this->layout = 'mLayer';
        
        switch ($type) {
            case ExpertController::TYPE_LESSION:
                $name = Variable::EXPERT_LESSION;
                $page_title = '专家授课';
                break;
            case ExpertController::TYPE_CLINIC:
                $name = Variable::EXPERT_CLINIC;
                $page_title = '专家义诊';
                break;
            case ExpertController::TYPE_ROUND:
                $name = Variable::EXPERT_ROUND;
                $page_title = '专家查房';
                break;
            case ExpertController::TYPE_OPERATION:
                $name = Variable::EXPERT_OPERATION;
                $page_title = '手术教学';
                break;
            case ExpertController::TYPE_COMMUNICATION:
                $name = Variable::EXPERT_COMMUNICATION;
                $page_title = '学术交流';
                break;
            case ExpertController::TYPE_OPENING:
                $name = Variable::EXPERT_OPENING;
                $page_title = '帮扶中心揭牌';
                break;
            default:
                $name = Variable::EXPERT_LESSION;
                $page_title = '专家授课';
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
    public function admin_editpic ($type = ExpertController::TYPE_LESSION)
    {
        $this->set('isAdmin', true);
        
        $this->layout = 'mLayer';
        
        switch ($type) {
            case ExpertController::TYPE_LESSION:
                $pics = Variable::EXPERT_LESSION_PIC;
                break;
            case ExpertController::TYPE_CLINIC:
                $pics = Variable::EXPERT_CLINIC_PIC;
                break;
            case ExpertController::TYPE_ROUND:
                $pics = Variable::EXPERT_ROUND_PIC;
                break;
            case ExpertController::TYPE_OPERATION:
                $pics = Variable::EXPERT_OPERATION_PIC;
                break;
            case ExpertController::TYPE_COMMUNICATION:
                $pics = Variable::EXPERT_COMMUNICATION_PIC;
                break;
            case ExpertController::TYPE_OPENING:
                $pics = Variable::EXPERT_OPENING_PIC;
                break;
            default:
                $pics = Variable::EXPERT_LESSION_PIC;
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
                            'controller' => 'expert',
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
        
        $imgPath = WWW_ROOT . 'img\\' . ExpertController::UPLOAD_IMAGE . '\\' .
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
