<?php
$page_title = '发展战略';

$this->start('sidebar');
echo $this->Element('sidebar/company');
$this->end();

$this->start('page_title');
echo $page_title;
$this->end();

$this->start('breadcrumb');
$this->Html->addCrumb('走进朗豪', 
        [
                'controller' => 'company',
                'action' => 'index'
        ]);
$this->Html->addCrumb($page_title);
echo $this->Html->getCrumbs(' &gt; ', null);
$this->end();

$form_s = $this->Form->create('', 
        [
                'inputDefaults' => [
                        'label' => false,
                        'div' => false
                ],
                "type" => "POST",
                "onsubmit" => ""
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

echo $form_s;
echo $inputs;
echo $buttons;
echo $form_e;
