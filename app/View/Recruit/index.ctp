<?php
$this->start('sidebar');
echo $this->Element('sidebar/recruit');
$this->end();
?>
<!-- 当前位置提示条 -->
<div class="page_navi">
	您现在的位置：<?php echo $this->Html->link( Configure::read('c_site_title'), array('controller'=>'pages', 'action'=>'display')); ?>
	&gt; 招贤纳士
</div>
<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m">招贤纳士</div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">
			<?php
if (isset($isAdmin) && $isAdmin) {
    echo $this->Html->link('增加职位', '#', 
            [
                    'onclick' => 'mLayerAction(\'' . $this->Html->url(
                            [
                                    'controller' => 'recruit',
                                    'action' => 'savejob'
                            ]) . '\');',
                    'class' => 'addButton'
            ]);
}
?>
				
<?php
if (! isset($data) || empty($data)) {
    echo Configure::read('MSG00010001');
} else {
    ?>
<table>
					<tr>
						<th>职位信息</th>
						<th>月薪</th>
						<th>工作地点</th>
						<th>发布时间</th>
					</tr>
<?php
    foreach ($data as $d) {
        ?>
    <tr>
						<td class="jobtitle"><?php
        if (isset($isAdmin) && $isAdmin) {
            echo $this->Html->link($d['Recruit']['title'], "#", 
                    [
                            'onclick' => "mLayerAction('" . $this->Html->url(
                                    [
                                            'controller' => 'recruit',
                                            'action' => 'savejob',
                                            $d['Recruit']['id']
                                    ]) . "');",
                            'class' => 'jobtitle'
                    ]);
        } else {
            echo $this->Html->link($d['Recruit']['title'], 
                    [
                            'controller' => 'recruit',
                            'action' => 'jobdetail',
                            $d['Recruit']['id']
                    ], [
                            'class' => 'jobtitle'
                    ]);
        }
        ?></td>
						<td class="salary"><?php echo $d['Recruit']['salary'];    ?></td>
						<td class="location"><?php echo $d['Recruit']['location'];  ?></td>
						<td class="updated"><?php
        
        echo date('Y-m-d', strtotime($d['Recruit']['created']));
        // echo $d['Recruit']['created'];
        ?></td>
					</tr>
<?php
    }
    ?>
</table>
<?php
}
?>

				<div class="pagination">
<?php
echo $this->Paginator->prev('<');
echo $this->Paginator->numbers([
        'separator' => ''
]);
echo $this->Paginator->next('>');
?>
</div>
			</div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>