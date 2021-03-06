<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    const INTERNAL_ERROR_EXCEPTION = "500";

    const CONTINUE_PROCESS = "200";

    const PAGE_NOT_FOUND_EXCEPTION = "404";

    public function debug ($message)
    {
        if (Configure::read('debug') >= 2) {
            $backtrace = debug_backtrace();
            array_shift($backtrace);
            CakeLog::write('debug', 
                    $backtrace[0]['class'] . '::' . $backtrace[0]['function'] .
                             ": " . $message);
        }
    }

    public function info ($message)
    {
        $backtrace = debug_backtrace();
        array_shift($backtrace);
        CakeLog::write('info', 
                $backtrace[0]['class'] . '::' . $backtrace[0]['function'] . ": " .
                         $message);
    }

    public function warning ($message)
    {
        $backtrace = debug_backtrace();
        array_shift($backtrace);
        CakeLog::write('warning', 
                $backtrace[0]['class'] . '::' . $backtrace[0]['function'] . ": " .
                         $message);
        if (Configure::read('debug')) {
            die($message);
        }
    }

    public function error ($message, 
            $method = AppController::INTERNAL_ERROR_EXCEPTION)
    {
        $backtrace = debug_backtrace();
        array_shift($backtrace);
        CakeLog::write('error', 
                $backtrace[0]['class'] . '::' . $backtrace[0]['function'] . ": " .
                         $message);
        if (Configure::read('debug')) {
            die($message);
        } else {
            switch ($method) {
                case AppController::PAGE_NOT_FOUND_EXCEPTION:
                    throw new PageNowFoundException();
                    break;
                case AppController::CONTINUE_PROCESS:
                    break;
                case AppController::INTERNAL_ERROR_EXCEPTION:
                    
                    throw new InternalErrorException();
                    break;
                default:
                    throw new InternalErrorException();
                    break;
            }
        }
    }

    public function fatal ($message)
    {
        $backtrace = debug_backtrace();
        array_shift($backtrace);
        CakeLog::write('fatal', 
                $backtrace[0]['class'] . '::' . $backtrace[0]['function'] . ": " .
                         $message);
        if (Configure::read('debug')) {
            die($message);
        } else {
            throw new InternalErrorException();
        }
    }

    public function beforeFilter ()
    {
        parent::beforeFilter();
        if (! empty($this->request->params['prefix']) &&
                 $this->request->params['prefix'] === 'admin') {
            $this->set('isAdmin', true);
            $login = $this->Session->read('login');
            if (empty($login) || ! $login) {
                if (! ($this->request->params['controller'] === 'tools' &&
                         $this->request->params['action'] === 'admin_login'))
                    $this->redirect(
                            [
                                    'controller' => 'tools',
                                    'action' => 'login'
                            ]);
            }
        }
    }
}
