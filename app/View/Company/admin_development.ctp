<?php
$this->start('sidebar');
echo $this->Element('sidebar/company');
$this->end();
?>
<!-- 当前位置提示条 -->
<div class="page_navi">
	您现在的位置：<?php echo $this->Html->link( Configure::read('c_site_title'), array('controller'=>'pages', 'action'=>'display')); ?>
	&gt; 发展战略
</div>
<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m">发展战略</div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">
<?php
echo $this->Form->create('', 
        array(
                'inputDefaults' => array(
                        'label' => false,
                        'div' => false
                ),
                "type" => "POST",
                "onsubmit" => ""
        ));
echo $this->Form->inputs(
        array(
                'Variable.id' => array(
                        'type' => 'hidden',
                        'value' => $data['Variable']['id']
                ),
                'Variable.name' => array(
                        'type' => 'hidden',
                        'value' => $data['Variable']['name']
                ),
                'Variable.value' => array(
                        'type' => 'textarea',
                        'value' => $data['Variable']['value'],
                        'label' => false,
                        'class' => 'txa_message',
                        'div' => false
                )
        ), null, 
        array(
                'div' => false,
                'fieldset' => false
        ));
echo $this->Form->button('重置', 
        array(
                'class' => 'reset',
                'type' => 'reset',
                'div' => false
        ));
echo $this->Form->submit('保存', 
        array(
                'class' => 'submit',
                'div' => false
        ));
echo $this->Form->end();
?>
			</div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>