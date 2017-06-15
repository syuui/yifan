<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m">招贤纳士</div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">
<?php
$len = Configure::read('recruit_max_length');
$data = $this->requestAction(
        [
                'controller' => 'recruit',
                'action' => 'getAllRecruitList',
                $len
        ]);
if (count($data) == 0) {
    echo Configure::read('MSG00010001');
} else {
    ?>
<ul class="list_style_2">
<?php foreach ($data as $d) {        ?>
    <li><?php echo $this->Html->link($d['Recruit']['title'],['controller'=>'Recruit','action'=>'jobdetail',$d['Recruit']['id']]);?></li>
<?php }    ;?>
</ul>

<?php
}
?>
<div class="see-more"><?php echo $this->Html->link('更多',['controller'=>'recruit', 'action'=>'index']);?></div>
			</div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>