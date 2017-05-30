<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppModel', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package app.Model
 */
class Uploaditem extends AppModel
{

    const UPLOAD_IMAGE = 'posts';

    const UPLOAD_FILE = 'files';

    /**
     * 数据库表的名称
     *
     * useTable 属性指定数据库表的名称。默认情况下，模型会使用模型类名的小写复数形
     * 式。可以设定为其他表，如果希望模型不使用数据库表，也可以设置为``false``。
     *
     * @var string
     */
    public $useTable = 'uploaditems';

    /**
     * 验证规则
     *
     * 该属性保存的规则，让模型可以在保存数据前验证数据。以字段名为键保存的正则表达式让 模型可以尝试去匹配。
     *
     * @var array
     */
    public $validate = [
            'filename' => [
                    'rule' => 'isUnique',
                    'required' => true,
                    'allowEmpty' => false,
                    'message' => '已经存在一个同名的文件'
            ]
    ];

    /**
     * 排序顺序
     *
     * 默认以ID降序排序
     *
     * @var string
     */
    public $order = [];

    /**
     * 模型名称
     *
     * 模型的名称。如果不在模型文件中指定，这会被构造函数设为类名。
     *
     * @var string
     */
    public $name = 'Variable';

    /**
     * 虚字段
     *
     * 这个模型的虚字段数组。虚字段是具有别名的 SQL 表达式。
     * 加入该属性的虚字段会和模型 的其它字段一样读取，但不能保存。
     *
     * @var array
     */
    public $virtualFields = [];

    /**
     * 使用缓存
     *
     * 若设为 true，单个请求中模型读取的数据会被缓存。该缓存仅保存在内存中，且仅保持(当
     * 前)请求所持续的时间段。任何对相同数据的重复请求会由该缓存处理。
     *
     * @var string
     */
    public $cacheQueries = true;

    public function onlyone ($check)
    {
        $this->log('Validate will return false.');
        return false;
    }
}
