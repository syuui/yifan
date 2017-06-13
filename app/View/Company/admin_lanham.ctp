<?php
App::uses('Uploaditem', 'Model');

$page_title = '朗豪风采';

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

if (! empty($dscr['Variable']['value'])) {
    $val = $dscr['Variable']['value'];
} else {
    $val = Configure::read('MSG00010001');
    $dscr = [
            'Variable' => [
                    'id' => '',
                    'name' => CompanyController::LANHAM_DESCRIPTION,
                    'value' => ''
            ]
    ];
}

$form_s = $this->Form->create('Variable', 
        [
                'inputDefaults' => [
                        'label' => false,
                        'div' => false
                ]
        ]);

$inputs = $this->Form->inputs(
        [
                'Variable.id' => [
                        'type' => 'hidden',
                        'div' => false,
                        'value' => $dscr['Variable']['id']
                ],
                'Variable.name' => [
                        'type' => 'hidden',
                        'div' => 'false',
                        'value' => $dscr['Variable']['name']
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

$addLink = $this->Html->link('增加图片', "#", 
        [
                'onclick' => 'mLayerAction("' . $this->Html->url(
                        [
                                'controller' => 'company',
                                'action' => 'admin_lanham_editpic'
                        ]) . '");',
                'class' => 'addButton'
        ]);

foreach ($pics as $p) {
    $img = $this->Html->image(
            Uploaditem::UPLOAD_IMAGE . '/' . $p['Variable']['value'], 
            [
                    'alt' => $p['Variable']['value'],
                    'url' => "#",
                    'onclick' => 'mLayerAction("' . $this->Html->url(
                            [
                                    'controller' => 'company',
                                    'action' => 'admin_lanham_editpic',
                                    $p['Variable']['id']
                            ]) . '");'
            ]);
    echo $this->Html->div('piclist_index', 
            $this->Html->div('piclist_index_pic', $img));
}

echo $addLink;

echo $form_s;
echo $inputs;
echo $buttons;
echo $form_e;