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
class ContactusController extends AppController
{

    const CONTACTUS_ADDRESS_NAME = 'contactus_address';

    const CONTACTUS_TEL_NAME = 'contactus_tel';

    const CONTACTUS_FAX_NAME = 'contactus_fax';

    const CONTACTUS_MAIL_NAME = 'contactus_mail';

    const CONTACTUS_ZIP_NAME = 'contactus_zip';

    /**
     * This controller does not use a model
     *
     * @var array
     */
    var $uses = [
            'Contact'
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

    public function index ()
    {
        $this->set('data', $this->getContectus());
    }

    public function admin_index ()
    {
        $this->index();
        $this->set('isAdmin', true);
        $this->render('index');
    }

    private function getContectus ()
    {
        $address = Configure::read('contact_address');
        $tel = Configure::read('contact_tel');
        $fax = Configure::read('contact_fax');
        $mail = Configure::read('contact_mail');
        $zip = Configure::read('contact_zip');
        
        return compact('address', 'tel', 'fax', 'mail', 'zip');
    }
}