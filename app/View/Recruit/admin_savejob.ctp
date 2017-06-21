<?php
$page_title = '职位信息';
$form_s = $this->Form->create('Recruit', 
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
                'Recruit.id' => [
                        'type' => 'hidden',
                        'value' => $data['Recruit']['id']
                ],
                'Recruit.title' => [
                        'value' => $data['Recruit']['title'],
                        'label' => '职位名称',
                        'div' => true
                ],
                'Recruit.salary' => [
                        'value' => $data['Recruit']['salary'],
                        'label' => '职位月薪',
                        'div' => true
                ],
                'Recruit.location' => [
                        'value' => $data['Recruit']['location'],
                        'label' => '工作地点',
                        'div' => true
                ],
                'Recruit.number' => [
                        'value' => $data['Recruit']['number'],
                        'label' => '招聘人数',
                        'div' => true
                ],
                'Recruit.description' => [
                        'value' => $data['Recruit']['description'],
                        'label' => '职位描述',
                        'div' => true
                ],
                'Recruit.requirement' => [
                        'value' => $data['Recruit']['requirement'],
                        'label' => '职位要求',
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
echo $page_title;
$this->end();

echo $inputs;

$this->start('buttons');
echo $buttons;
$this->end();

$this->start('form_e');
echo $form_e;
$this->end();
