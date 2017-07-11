<?php
App::uses('AppController', 'Controller');
App::uses('Variable', 'Model');

/**
 * 走进朗豪 控制器
 *
 * @author Wei.ZHOU
 * @version 1.0
 */
class CompanyController extends AppController
{

    /**
     * 走进朗豪 企业简介 标识符
     *
     * @var string
     */
    const TYPE_DESCRIPTION = 'D';

    /**
     * 走进朗豪 企业文化 标识符
     *
     * @var string
     */
    const TYPE_CULTURE = 'C';

    /**
     * 走进朗豪 发展战略 标识符
     *
     * @var string
     */
    const TYPE_DEVELOPMENT = 'V';

    /**
     * 走进朗豪 朗豪风采 标识符
     *
     * @var string
     */
    const TYPE_LANHAM = 'L';

    /**
     * 图片文件上传路径
     *
     * @var string
     */
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
    public function admin_edit ($type = CompanyController::TYPE_DESCRIPTION)
    {
        $this->layout = 'mlayer';
        
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
    public function admin_editpic ($type = CompanyController::TYPE_DESCRIPTION)
    {
        $this->layout = 'mlayer';
        
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
                $this->fatal('admin_index_editpic: 非法的action');
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
        
        if (! $this->Variable->delete($this->data['Variable']['id'])) {
            ob_start();
            var_dump($this->data);
            $d = ob_get_clean();
            $this->error("删除数据失败" . PHP_EOL . $d, 
                    AppController::CONTINUE_PROCESS);
            $this->redirect([
                    'controller' => 'company',
                    'action' => 'index'
            ]);
        }
        $npic = $this->Variable->find('count', 
                [
                        'conditions' => [
                                'Variable.value' => $this->data['Variable']['value']
                        ]
                ]);
        if ($npic <= 0) {
            $imgPath = WWW_ROOT . 'img\\' . CompanyController::UPLOAD_IMAGE .
                     '\\' . $this->data['Variable']['value'];
            if (! unlink($imgPath)) {
                $this->error('文件（' . $imgPath . '）删除失败', 
                        AppController::CONTINUE_PROCESS);
                $this->redirect(
                        [
                                'controller' => 'pages',
                                'action' => 'index'
                        ]);
            }
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
            $this->warning('未上传文件');
            return;
        }
        
        $imgPath = WWW_ROOT . 'img\\' . CompanyController::UPLOAD_IMAGE . '\\' .
                 $this->data['Variable']['file']['name'];
        $d = [
                'Variable' => [
                        'name' => $varName,
                        'value' => $this->data['Variable']['file']['name']
                ]
        ];
        
        if (file_exists($imgPath)) {
            $this->error('文件（' . $imgPath . '）已经存在', 
                    AppController::CONTINUE_PROCESS);
            $this->redirect(
                    [
                            'controller' => 'pages',
                            'action' => 'index'
                    ]);
        } else {
            if (copy($this->data['Variable']['file']['tmp_name'], $imgPath)) {
                $this->Variable->save($d);
            } else {
                $this->error('文件（' . $imgPath . '）拷贝失败', 
                        AppController::CONTINUE_PROCESS);
                $this->redirect(
                        [
                                'controller' => 'pages',
                                'action' => 'index'
                        ]);
            }
        }
    }
}
