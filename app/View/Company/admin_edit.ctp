<?php
$this->start('page_title');
echo $page_title;
$this->end();

$this->start('form_s');
echo $this->Form->create('', 
        [
                'inputDefaults' => [
                        'label' => false,
                        'div' => false
                ],
                'type' => 'POST',
                'url' => [
                        'controller' => 'company',
                        'action' => 'index',
                        $type
                ]
        ]);
$this->end('form_s');

echo $this->Form->inputs(
        [
                'Variable.id' => [
                        'type' => 'hidden',
                        'value' => empty($data['Variable']['id']) ? '' : $data['Variable']['id']
                ],
                'Variable.name' => [
                        'type' => 'hidden',
                        'value' => empty($data['Variable']['name']) ? $name : $data['Variable']['name']
                ],
                'Variable.value' => [
                        'type' => 'textarea',
                        'value' => empty($data['Variable']['value']) ? '' : $data['Variable']['value'],
                        'label' => false,
                        'class' => 'txa_nobutton',
                        'div' => false
                ]
        ], null, 
        [
                'div' => false,
                'fieldset' => false
        ]);

$this->start('buttons');
echo $this->Form->button('重置', 
        [
                'class' => 'reset',
                'type' => 'reset',
                'div' => false
        ]);
echo $this->Form->submit('保存', 
        [
                'class' => 'submit',
                'div' => false
        ]);
$this->end();

$this->start('form_e');
echo $this->Form->end();
$this->end();
