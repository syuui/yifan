<?php
$this->start('sidebar');
echo $this->Element('sidebar/recruit');
$this->end();
?>
<!-- 当前位置提示条 -->
<div class="page_navi">
	您现在的位置：<?php echo $this->Html->link( Configure::read('c_site_title'), array('controller'=>'pages', 'action'=>'display')); ?>
	&gt; <?php echo $this->Html->link( '招贤纳士', ['controller'=>'recruit', 'action'=>'index']);?> 
	&gt; 在线提交
</div>
<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m">在线提交</div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">
				<div class="ele_cnt_txt">
				<p>多谢您一直以来对我公司的关注。</p>
				<p>请将简历邮送至 <U><?php echo $this->Html->link( Configure::read('recruit_mail'), "mailto:". Configure::read('recruit_mail'));  ?></U>。</p>
				<p>我们将会在一周之内给您答复。</p>
			</div>
			</div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>