<?php
$this->start('sidebar');
echo $this->Element('sidebar/tools');
$this->end();
?>
<!-- 当前位置提示条 -->
<div class="page_navi">
	您现在的位置：<?php echo $this->Html->link( Configure::read('c_site_title'), array('controller'=>'pages', 'action'=>'display')); ?>
	&gt; <?php echo $this->Html->link('管理工具', array('controller'=>'pages', 'action'=>'tools'));?>
	&gt; 管理图片
</div>
<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m">管理图片</div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">
<?php
echo $this->Html->link('上传图片', 
        [
                'controller' => 'tools',
                'action' => 'editpic'
        ], [
                'class' => 'addButton'
        ]);

foreach ($data as $line) {
    $this->set('d', $line);
    echo $this->Element('picline');
}
?>
			</div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>
<?php
if (isset($saveFailed) && $saveFailed) {
    $popTtl = Configure::read('MSG00010002');
    $popMsg = null;
    if ($this->Form->isFieldError('filename')) {
        $popMsg .= $this->Form->error('filename') . $this->Tag->br();
    }
    echo $this->Tag->popup($popTtl, $popMsg, "", '');
}
?>