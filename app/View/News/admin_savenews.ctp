<?php
App::uses('NewsModel', 'Model');

$form_s = $this->Form->create('News', 
        [
                'inputDefaults' => [
                        'label' => false,
                        'legend' => false,
                        'div' => false
                ]
        ]);
$form_e = $this->Form->end();
$inputs = $this->Form->Inputs(
        [
                'News.id' => [
                        'type' => 'hidden',
                        'value' => $data['News']['id']
                ],
                'News.action' => [
                        'type' => 'hidden',
                        'value' => 'E',
                        'id' => 'currentAction'
                ],
                'News.title' => [
                        'value' => $data['News']['title'],
                        'label' => '标题',
                        'div' => true
                ],
                'News.type' => [
                        'type' => 'select',
                        'options' => [
                                'E' => '企业动态',
                                'I' => '行业动态'
                        ],
                        'label' => '分类',
                        'div' => true
                ],
                'News.content' => [
                        'type' => 'textarea',
                        'value' => $data['News']['content'],
                        'label' => '内容',
                        'div' => true
                ]
        ], null, 
        [
                'fieldset' => false,
                'legend' => false
        ]);
$buttons = $this->Form->submit('确定', 
        [
                'label' => false,
                'div' => false,
                'class' => 'submit',
                'id' => 'saveItem',
                'name' => 'Post.action'
        ]) . $this->Form->submit('删除', 
        [
                'label' => false,
                'div' => false,
                'class' => 'reset',
                'id' => 'deleteItem',
                'name' => 'Post.action'
        ]);

$this->start('form_s');
echo $form_s;
$this->end();

$this->start('page_title');
echo empty($data['News']['id']) ? '编辑新闻' : '增加新闻';
$this->end();

$this->start('buttons');
echo $buttons;
$this->end();

$this->start('form_e');
echo $form_e;
$this->end();

echo $inputs;