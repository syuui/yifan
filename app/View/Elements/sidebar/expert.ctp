
<!-- 专家风采 -->
<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m">专家风采</div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">
				<ul class="list_style_1">
					<li><?php echo $this->Html->link('专家授课', array('controller'=>'expert', 'action'=>'lession'));	?></li>
					<li><?php echo $this->Html->link('专家义诊', array('controller'=>'expert', 'action'=>'clinic'));	?></li>
					<li><?php echo $this->Html->link('专家查房', array('controller'=>'expert', 'action'=>'round'));	?></li>
					<li><?php echo $this->Html->link('手术教学', array('controller'=>'expert', 'action'=>'operation'));	?></li>
					<li><?php echo $this->Html->link('学术交流', array('controller'=>'expert', 'action'=>'communication'));	?></li>
					<li><?php echo $this->Html->link('帮扶中心揭牌', array('controller'=>'expert', 'action'=>'opening'));	?></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>
<!-- /专家风采 -->

<?php
echo $this->Element('contactus');
?>