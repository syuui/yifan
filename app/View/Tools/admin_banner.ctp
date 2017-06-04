<?php
$this->start('sidebar');
echo $this->Element('sidebar/tools');
$this->end();

$form_s = $this->Form->create('Variable', 
        [
                'type' => 'file'
        ]);
$inputs = $this->Form->file('bannerfile', 
        [
                'class' => 'ipt_file'
        ]);
$submit = $this->Form->submit('上传', 
        [
                'class' => 'submit',
                'div' => false
        ]);
$form_e = $this->Form->end();
?>
<!-- 当前位置提示条 -->
<div class="page_navi">
	您现在的位置：<?php echo $this->Html->link( Configure::read('c_site_title'), array('controller'=>'pages', 'action'=>'display')); ?>
	&gt; <?php echo $this->Html->link('管理工具', array('controller'=>'pages', 'action'=>'tools'));?>
	&gt;<?php echo $type==='L' ? '站名LOGO'  :  '网页横幅';  ?> 
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
echo $form_s;
echo $inputs;
echo $submit;
echo $form_e;
echo $this->Html->image(
        $type === 'L' ? Configure::read('logo_filename') : Configure::read(
                'banner_filename'));
?>
			</div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>