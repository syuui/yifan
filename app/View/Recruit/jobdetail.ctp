<?php
$this->start('sidebar');
echo $this->Element('sidebar/recruit');
$this->end();
?>
<!-- 当前位置提示条 -->
<div class="page_navi">
    您现在的位置：<?php echo $this->Html->link( Configure::read('c_site_title'), array('controller'=>'pages', 'action'=>'display')); ?>
    &gt; <?php echo $this->Html->link( '招贤纳士', ['controller'=>'recruit','action'=>'index']);?>
    &gt; 职位信息
</div>
<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m">职位信息</div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">
<?php
if (isset($data) && ! empty($data)) {
    ?>
            <div class="jdtitle"><?php echo $data['Recruit']['title'];  ?></div>
				<div class="jdline">
					<div class="jdlabel">职位薪资：</div>
					<div class="jddetail"><?php echo $data['Recruit']['salary'];  ?></div>
				</div>
				<div class="jdline">
					<div class="jdlabel">招聘人数：</div>
					<div class="jddetail"><?php echo $data['Recruit']['number'];    ?></div>
				</div>
				<div class="jdline">
					<div class="jdlabel">工作地点：</div>
					<div class="jddetail"><?php echo $data['Recruit']['location'];   ?></div>
				</div>
				<div class="jdline">
					<div class="jdlabel">职位描述：</div>
					<div class="jddetail"><?php echo nl2br($data['Recruit']['description']);   ?></div>
				</div>
				<div class="jdline">
					<div class="jdlabel">职位要求：</div>
					<div class="jddetail"><?php echo nl2br($data['Recruit']['requirement']);   ?></div>
				</div>
				
<?php
} else {
    ?>
<div class="ele_cnt_txt">没有这项职位信息</div>    
<?php
}
?>
			</div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>