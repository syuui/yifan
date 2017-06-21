<?php
App::uses('AppController', 'Controller');

/**
 * 联系我们 控制器
 *
 * @author Wei.ZHOU
 * @version 1.0
 */
class ContactusController extends AppController
{

    /**
     * 配置文件中 联系我们 - 地址 的键
     *
     * @var string
     */
    const CONTACTUS_ADDRESS_NAME = 'contact_address';

    /**
     * 配置文件中 联系我们 - 电话 的键
     *
     * @var string
     */
    const CONTACTUS_TEL_NAME = 'contact_tel';

    /**
     * 配置文件中 联系我们 - 手机 的键
     *
     * @var string
     */
    const CONTACTUS_MOBILE_NAME = 'contact_mobile';

    /**
     * 配置文件中 联系我们 - 传真 的键
     *
     * @var string
     */
    const CONTACTUS_FAX_NAME = 'contact_fax';

    /**
     * 配置文件中 联系我们 - 邮箱 的键
     *
     * @var string
     */
    const CONTACTUS_MAIL_NAME = 'contact_mail';

    /**
     * 此控制器使用下列模型
     *
     * @var array
     */
    var $uses = [
            'Contact'
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
     * 此控制器中所有页面使用以下布局
     */
    public $layout = 'default_l';

    /**
     * 联系我们 页面的控制器
     */
    public function index ()
    {
        $this->set('data', $this->getContectus());
    }

    /**
     * 管理员用 联系我们 页面的控制器
     */
    public function admin_index ()
    {
        $this->index();
        $this->set('isAdmin', true);
        $this->render('index');
    }

    private function getContectus ()
    {
        $address = Configure::read(ContactusController::CONTACTUS_ADDRESS_NAME);
        $tel = Configure::read(ContactusController::CONTACTUS_TEL_NAME);
        $mobile = Configure::read(ContactusController::CONTACTUS_MOBILE_NAME);
        $fax = Configure::read(ContactusController::CONTACTUS_FAX_NAME);
        $mail = Configure::read(ContactusController::CONTACTUS_MAIL_NAME);
        
        return compact('address', 'tel', 'mobile', 'fax', 'mail');
    }
}