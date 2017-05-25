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
App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package app.Model
 */
class VariableModel extends Model
{

    const ENTERPRISE_DESCRIPTION = 'enterprise_description';

    const ENTERPRISE_CULTURE = 'enterprise_culture';

    const ENTERPRISE_DEVELOPMENT = 'enterprise_development';

    const RECRUIT_STRATEGY = 'recruit_strategy';

    public $useTable = array(
            'variables'
    );

    /**
     * Validate Check
     *
     * @var array
     */
    public $validate = array(
            'id' => array(
                    'rule' => array(
                            'custom',
                            '^[a-z][0-9a-z]{3,9}$'
                    ),
                    'message' => '用户ID必须以小写英文字母开头，只可以包含小写英文字母以及数字，最短4字节，最长10字节。'
            ),
            'name' => array(
                    'rule' => array(
                            'maxLength',
                            64
                    ),
                    'message' => '用户名最长64字节。'
            )
    );

    public function readVariable ($name)
    {
        if (is_null($name)) {
            return null;
        }
        $rlt = $this->findFirst(
                array(
                        'conditions' => array(
                                'Variable.name' => $name
                        ), // 查询条件数组
                        'recursive' => 1, // 整型
                                          // 字段名数组
                        'fields' => array(
                                'Variable.*'
                        ),
                        // 定义排序的字符串或者数组
                        'order' => array(
                                'Variable.modified DESC'
                        ),
                        'limit' => 1
                ));
        if (empty($rlt) || empty($rlt['Variable']['value'])) {
            return null;
        }
        return $rlt['Variable'];
    }

    public function saveVariable ($name, $value)
    {
        if (empty($this->readVariable($name))) {
            $dat = array(
                    'Variable' => array(
                            'name' => $name,
                            'value' => $value,
                            'created' => 'NOW()',
                            'modified' => 'NOW()'
                    )
            );
        } else {
            $dat = array(
                    'Variable' => array(
                            'name' => $name,
                            'value' => $value
                    )
            );
        }
        
        $this->save($dat);
    }
}
