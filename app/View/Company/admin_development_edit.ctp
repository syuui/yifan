<?php
$form_s = $this->Form->create('', 
        [
                'inputDefaults' => [
                        'label' => false,
                        'div' => false
                ],
                'type' => 'POST',
                'url' => [
                        'controller' => 'company',
                        'action' => 'development'
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
        ]);
$buttons .= $this->Form->submit('保存', 
        [
                'class' => 'submit',
                'div' => false
        ]);

$form_e = $this->Form->end();

$this->start('page_title');
echo '发展战略';
$this->end();

$this->start('page_footer');
echo $buttons;
$this->end();

echo $form_s;
echo $inputs;
echo $form_e;
