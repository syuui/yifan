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
class Variable extends AppModel
{

    const ENTERPRISE_DESCRIPTION = 'enterprise_description';

    const ENTERPRISE_CULTURE = 'enterprise_culture';

    const ENTERPRISE_DEVELOPMENT = 'enterprise_development';

    const RECRUIT_STRATEGY = 'recruit_strategy';

    public $useTable = 'variables';

    /**
     * 验证规则
     *
     * 该属性保存的规则，让模型可以在保存数据前验证数据。以字段名为键保存的正则表达式让 模型可以尝试去匹配。
     *
     * @var array
     */
    public $validate = [];

    /**
     * 排序顺序
     *
     * 默认以ID降序排序
     *
     * @var string
     */
    public $order = null;

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

    /**
     * 取得数据库变量
     *
     * 此方法返回一个CakePHP格式的数据库查询数组，其中包含取得的变量的数据库记录。
     * 默认情况下只返回第一个值。
     * 如果$options中包含 type=>first 的键值对，则返回第一个值（默认）。
     * 如果$options中包含 type=>all 的键值对，则返回所有的值。
     * 如果$options中包含 type=>count 的键值对，则返回符合条件的数据个数。
     *
     * @param unknown $name
     *            变量名
     * @param array $options
     *            选项
     *            
     * @return NULL|unknown 包含变量值的数组，遵循Cake规范
     */
    public function getVariable ($name, $options = [])
    {
        $this->log("Param name: $name");
        if (empty($name) || ! is_string($name)) {
            return null;
        }
        
        $con = [
                'conditions' => [
                        'Variable.name' => $name
                ]
        ];
        $type = 'first';
        
        if (key_exists('type', $options)) {
            if ($options['type'] === 'all') {
                $type = 'all';
            } elseif ($options['type'] === 'count') {
                $type = 'count';
            }
        }
        ob_start();
        echo "name: $name";
        var_dump($options);
        $this->log(ob_end_clean());
        
        return $this->find($type, $con);
    }

    /**
     * 设置数据库变量
     *
     * 此方法设置一个数据库变量。
     * 如果$options中包含 'useNameAsId'=>true 的键值对，则$name的值将做为id
     *
     * @param unknown $name
     *            变量名
     *            
     * @param unknown $value
     *            变量值
     *            
     * @param array $options
     *            选项
     *            
     * @return void
     */
    public function setVariable ($name, $value, $options = [])
    {
        if (empty($name) || ! is_string($name)) {
            return;
        }
        
        if (! empty($options) && key_exists('useNameAsId', $options) &&
                 $options['useNameAsId'] === true) {
            $dat = $this->find('first', 
                    [
                            'conditions' => [
                                    'id' => $name
                            ]
                    ]);
            if (count($dat) == 1) {
                $dat['Variable']['value'] = value;
            }
        } else {
            $dat = $this->getVariable($name, 
                    [
                            'type' => 'all'
                    ]);
            if (count($dat) > 1) {
                // 同一个name有多个值，为防止误覆盖，处理停止
                return;
            }
            $dat[0]['Variable']['value'] = $value;
            $this->Variable->save($dat[0]);
        }
    }

    public function returnAAA ()
    {
        return 'AAA';
    }
}
