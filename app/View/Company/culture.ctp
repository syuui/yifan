<?php
$this->start('sidebar');
echo $this->Element('sidebar/company');
$this->end();

$msg = empty($data['Variable']['value']) ? Configure::read('MSG00010001') : $this->Tag->nl2p(
        $data['Variable']['value']);
?>
<!-- 当前位置提示条 -->
<div class="page_navi">
	您现在的位置：<?php echo $this->Html->link( Configure::read('c_site_title'), array('controller'=>'pages', 'action'=>'display')); ?>  &gt; 走进朗豪 &gt; 企业文化
</div>
<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m">企业文化</div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">
				<div class="ele_cnt_txt">
<?php
echo $msg?>
				</div>
			</div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>
