<?php
/**
 * 网站元素组件
 *
 * 此组件为固定格式的网站元素提供逻辑。
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
App::uses('Component', 'Controller');

class ElementComponent extends Component
{

    /**
     * 常量
     */
    
    /**
     * 此组件中要用到以下数据模型
     *
     * @var array
     */
    public $uses = [];

    /**
     * 此组件中要用到以下其它组件
     *
     * @var array
     */
    public $components = [];

    /**
     * 生成一个图片数组。
     *
     * @param unknown $type
     *            图片数组的数据来源
     * @param array $options
     *            图片数组的行为
     *            回Render后的HTML。
     */
    public function pictureArray ($type, $options = array())
    {
        ;
    }

    public function newsList ()
    {
        ;
    }

    public function recruitList ()
    {
        ;
    }

    public function contactUs ()
    {
        ;
    }
}

