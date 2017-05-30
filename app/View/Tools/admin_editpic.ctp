<?php
$this->start('sidebar');
echo $this->Element('sidebar/tools');
$this->end();
?>
<!-- 当前位置提示条 -->
<div class="page_navi">
	您现在的位置：<?php echo $this->Html->link( Configure::read('c_site_title'), array('controller'=>'pages', 'action'=>'display')); ?>
	&gt; <?php echo $this->Html->link('管理工具', array('controller'=>'pages', 'action'=>'tools'));?>
	&gt; <?php echo $this->Html->link('管理图片', array('controller'=>'tools', 'action'=>'uploadpic'));	?>
	&gt; 编辑图片
</div>
<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m">编辑图片</div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">
<?php
if (isset($data) && ! empty($data)) {
    echo $this->Form->create('Uploaditem', 
            array(
                    'inputDefaults' => array(
                            'label' => false
                    ),
                    "type" => "POST",
                    "onsubmit" => "",
                    'url' => array(
                            'controller' => 'tools',
                            'action' => 'uploadpic'
                    )
            ));
    echo $this->Form->inputs(
            array(
                    'Uploaditem.id' => array(
                            'type' => 'hidden',
                            'value' => $data['Uploaditem']['id']
                    ),
                    'Uploaditem.filename' => array(
                            'label' => '文件名称',
                            'value' => $data['Uploaditem']['filename'],
                            'readonly' => true
                    ),
                    'Uploaditem.description' => array(
                            'label' => '文件说明',
                            'value' => $data['Uploaditem']['description'],
                            'type' => 'textarea',
                            'class' => 'txa_message'
                    )
            ), null, 
            array(
                    'div' => false,
                    'fieldset' => false
            ));
} else {
    echo $this->Form->create('Uploaditem', 
            array(
                    'type' => 'file',
                    'inputDefaults' => array(
                            'label' => false
                    ),
                    "onsubmit" => "",
                    'url' => array(
                            'controller' => 'tools',
                            'action' => 'uploadpic'
                    )
            ));
    echo $this->Form->inputs(
            array(
                    'Uploaditem.file' => array(
                            'label' => '文件名称',
                            'type' => 'file',
                            'class' => 'ipt_file'
                    ),
                    'Uploaditem.description' => array(
                            'label' => '文件说明',
                            'type' => 'textarea',
                            'class' => 'txa_message'
                    )
            ), null, 
            array(
                    'div' => false,
                    'fieldset' => false
            ));
}
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
if (isset($saveFailed) && $saveFailed) {
    //$popTtl = Configure::read('MSG00010002');
    
    $popTtl = 'aaaaaaaaaaa';
    $popMsg = Configure::read('MSG00010002');
    
    if ($this->Form->isFieldError('Uploaditem.filename')) {
        $popMsg .= $this->Form->error('Uploaditem.filename') . $this->Tag->br();
    }
    echo $this->Tag->popup($popTtl, $popMsg, "", '#');
}

echo $this->Form->end();

if (isset($data) && ! empty($data)) {
    echo $this->Form->create('Uploaditem', 
            array(
                    'url' => array(
                            'controller' => 'tools',
                            'action' => 'deletepic'
                    ),
                    'inputDefaults' => array(
                            'label' => false
                    ),
                    'type' => 'POST'
            ));
    echo $this->Form->input('id', array(
            'type' => 'hidden'
    ));
    echo $this->Form->submit('删除', 
            array(
                    'class' => 'reset',
                    'div' => false,
                    'onclick' => "return confirm('真的要删除这个文件吗？');"
            ));
    echo $this->Form->end();
}
?>
			</div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>