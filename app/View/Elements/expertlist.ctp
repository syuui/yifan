<?php
$len = Configure::read('expert_max_length');
$data = $this->requestAction(
        [
                'controller' => 'expert',
                'action' => 'getAllExpertList',
                $len
        ]);
?>
<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m">专家风采</div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">
<?php

if (count($data) == 0) {
    echo Configure::read('MSG00010001');
} else {
    foreach ($data as $d) {
        $url = ExpertController::UPLOAD_IMAGE . '/' . $d['Variable']['value'];
        ?>
        <div class="expertlist_index">
					<div class="expertlist_index_pic"><?php echo $this->Html->image($url);   ?></div>
				</div>
<?php
    }
}
?>
<div class="see-more"><?php echo $this->Html->link('更多',['controller'=>'expert', 'action'=>'index']);?></div>
			</div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>