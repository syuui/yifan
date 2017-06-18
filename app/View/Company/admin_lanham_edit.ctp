<?php
App::uses('Uploaditem', 'Model');

if (! empty($data['Variable']['value'])) {
    $val = $data['Variable']['value'];
} else {
    $val = Configure::read('MSG00010001');
    $data = [
            'Variable' => [
                    'id' => '',
                    'name' => Variable::ENTERPRISE_LANHAM,
                    'value' => ''
            ]
    ];
}

$form_s = $this->Form->create('Variable', 
        [
                'inputDefaults' => [
                        'label' => false,
                        'div' => false
                ],
                'type' => 'POST',
                'url' => [
                        'controller' => 'company',
                        'action' => 'lanham'
                ]
        ]);

$inputs = $this->Form->inputs(
        [
                'Variable.id' => [
                        'type' => 'hidden',
                        'div' => false,
                        'value' => $data['Variable']['id']
                ],
                'Variable.name' => [
                        'type' => 'hidden',
                        'div' => 'false',
                        'value' => $data['Variable']['name']
                ],
                'Variable.value' => [
                        'type' => 'textarea',
                        'class' => 'txa_nobutton',
                        'label' => false,
                        'div' => false,
                        'fieldSet' => false,
                        'value' => $val
                ]
        ], null, 
        [
                'fieldset' => false,
                'legend' => false
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
echo '朗豪风采';
$this->end();

$this->start('page_footer');
echo $buttons;
$this->end();

echo $form_s;
echo $inputs;
echo $form_e;
