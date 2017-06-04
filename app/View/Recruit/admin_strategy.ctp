<?php
$this->start('sidebar');
echo $this->Element('sidebar/recruit');
$this->end();

$form_s = $this->Form->create('', 
        [
                "type" => "POST",
                "onsubmit" => "",
                'inputDefaults' => [
                        'label' => false,
                        'div' => false
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
                        'class' => 'txa_message',
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
?>
<!-- 当前位置提示条 -->
<div class="page_navi">
    您现在的位置：<?php echo $this->Html->link( Configure::read('c_site_title'), array('controller'=>'pages', 'action'=>'display')); ?>
    &gt; <?php echo $this->Html->link( '招贤纳士', ['controller'=>'recruit','action'=>'index']);?>
    &gt; 人才战略
</div>
<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m">人才战略</div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">
<?php
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