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

    const ENTERPRISE_DESCRIPTION_PIC = 'enterprise_description_pics';

    const ENTERPRISE_CULTURE = 'enterprise_culture';

    const ENTERPRISE_CULTURE_PIC = 'enterprise_culture_pics';

    const ENTERPRISE_DEVELOPMENT = 'enterprise_development';

    const ENTERPRISE_DEVELOPMENT_PIC = 'enterprise_development_pics';

    const ENTERPRISE_LANHAM = 'enterprise_lanham';

    const ENTERPRISE_LANHAM_PIC = 'enterprise_lanham_pics';

    const RECRUIT_STRATEGY = 'recruit_strategy';

    const EXPERT_LESSION = 'expert_lession';

    const EXPERT_LESSION_PIC = 'expert_lession_pic';

    const EXPERT_CLINIC = 'expert_clinic';

    const EXPERT_CLINIC_PIC = 'expert_clinic_pic';

    const EXPERT_ROUND = 'expert_round';

    const EXPERT_ROUND_PIC = 'expert_round_pic';

    const EXPERT_OPERATION = 'expert_operation';

    const EXPERT_OPERATION_PIC = 'expert_operation_pic';

    const EXPERT_COMMUNICATION = 'expert_communication';

    const EXPERT_COMMUNICATION_PIC = 'expert_communication_pic';

    const EXPERT_OPENING = 'expert_opening';

    const EXPERT_OPENING_PIC = 'expert_opening_pic';

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

    public $findMethods = array(
            'companyPicList' => true
    );

    protected function _findCompanyPicList ($state, $query, $results = array())
    {
        if ($state === 'before') {
            $query['conditions']['name'] = Variable::ENTERPRISE_LANHAM_PIC;
            return $query;
        }
        return $results;
    }
}
