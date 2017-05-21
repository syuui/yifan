<?php

class UserFixture extends CakeTestFixture
{
    
    // 可选。
    // 设置该属性来加载夹具到不同的测试数据源
    public $useDbConfig = 'test';

    public $fields = array(
            'id' => array(
                    'type' => 'string',
                    'key' => 'primary',
                    'length' => 10,
                    'null' => false
            ),
            'name' => array(
                    'type' => 'string',
                    'length' => 64
            ),
            'password' => array(
                    'type' => 'string',
                    'length' => 64
            )
    );

    public $records = array(
            array(
                    'id' => 'root',
                    'name' => 'Administrator',
                    'password' => 'e10adc3949ba59abbe56e057f20f883e'
            )
    );
}