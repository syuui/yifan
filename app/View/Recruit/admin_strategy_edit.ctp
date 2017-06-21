<?php
$page_title = '人才战略';
$form_s = $this->Form->create('', 
        [
                'type' => 'POST',
                'inputDefaults' => [
                        'label' => false,
                        'div' => false
                ],
                'url' => [
                        'controller' => 'recruit',
                        'action' => 'strategy'
                ]
        ]);
$inputs = $this->Form->inputs(
        [
                'Variable.id' => [
                        'type' => 'hidden',
                        'value' => $data['Variable']['id']
                ],
                'Variable.name' => [
                        'type' => 'hidden',
                        'value' => $data['Variable']['name']
                ],
                'Variable.value' => [
                        'type' => 'textarea',
                        'value' => $data['Variable']['value'],
                        'label' => false,
                        'class' => 'txa_nobutton',
                        'div' => false
                ]
        ], null, 
        [
                'div' => false,
                'fieldset' => false
        ]);
$buttons = $this->Form->button('重置', 
        [
                'class' => 'reset',
                'type' => 'reset',
                'div' => false
        ]) . $this->Form->submit('保存', 
        [
                'class' => 'submit',
                'div' => false
        ]);
$form_e = $this->Form->end();

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