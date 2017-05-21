<?php

class UserTest extends CakeTestCase
{

    public $layout = 'test';

    public $fixtures = array(
            'app.user'
    );

    public function setUp ()
    {
        parent::setUp();
        $this->User = ClassRegistry::init('User');
    }

    public function testLogin ()
    {
        $pwd = md5('123456');
        $dat = [
                'User' => [
                        [
                                'id' => 'root',
                                'name' => 'Administrator',
                                'password' => $pwd
                        ]
                ]
        ];
        
        $result = $this->User->login($dat['User']['id'], 
                $dat['User']['password']);
        
        $this->assertEquals($result, $dat);
    }
}