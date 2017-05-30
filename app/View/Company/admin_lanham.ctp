<?php
App::uses('Uploaditem', 'Model');

$this->start('sidebar');
echo $this->Element('sidebar/company');
$this->end();

if (isset($dscr['Variable']['value']) && ! empty($dscr['Variable']['value'])) {
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
        array(
                'inputDefaults' => array(
                        'label' => false,
                        'div' => false
                )
        ));

$inputs = $this->Form->inputs(
        array(
                'Variable.id' => array(
                        'type' => 'hidden',
                        'div' => false,
                        'value' => $dscr['Variable']['id']
                ),
                'Variable.name' => array(
                        'type' => 'hidden',
                        'div' => 'false',
                        'value' => $dscr['Variable']['name']
                ),
                'Variable.value' => array(
                        'type' => 'textarea',
                        'class' => 'txa_message_l',
                        'label' => false,
                        'div' => false,
                        'fieldSet' => false,
                        'value' => $val
                )
        ), null, 
        array(
                'fieldset' => false,
                'legend' => false
        ));

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
?>
<!-- 当前位置提示条 -->
<div class="page_navi">
	您现在的位置：<?php echo $this->Html->link( Configure::read('c_site_title'), array('controller'=>'pages', 'action'=>'display')); ?> &gt; 走进朗豪
	&gt; 朗豪风采
</div>
<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m">朗豪风采</div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">
<?php
foreach ($pics as $p) {
    ?>
<div class="productlist_index">
					<div class="productlist_index_pic">
<?php
    $img = Uploaditem::UPLOAD_IMAGE . '/' . $p['Variable']['value'];
    echo $this->Html->image($img, 
            array(
                    'alt' => $p['Variable']['value'],
                    'url' => "#",
                    'onclick' => 'mLayerAction("' . $this->Html->url(
                            array(
                                    'controller' => 'company',
                                    'action' => 'admin_lanham_editpic',
                                    $p['Variable']['id']
                            )) . '");'
            ));
    ?>
</div>
				</div>
<?php
}

echo $addLink;

echo $form_s;
echo $inputs;
echo $buttons;
echo $form_e;
?>
			</div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>