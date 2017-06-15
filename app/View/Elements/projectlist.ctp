<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m">帮扶项目</div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">
<?php
$len = Configure::read('projectlist_max_length');
$data = $this->requestAction(
        [
                'controller' => 'Project',
                'action' => 'getProjectList',
                $len
        ]);
if (count($data) == 0) {
    echo Configure::read('MSG00010001');
} else {
    foreach ($data as $d) {
        $lst[] = $this->Html->link($d['Post']['title'], 
                [
                        'controller' => 'project',
                        'action' => 'postdetail',
                        $d['Post']['id']
                ]);
    }
    echo $this->Html->nestedList($lst, 
            [
                    'class' => 'list_style_2'
            ]);
}
?>
<div class="see-more"><?php echo $this->Html->link('更多',['controller'=>'project', 'action'=>'index']);    ?></div>
			</div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>