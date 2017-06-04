<?php
$this->start('sidebar');
echo $this->Element('sidebar/project');
$this->end();

$url = $this->Html->url(
        [
                'controller' => 'project',
                'action' => 'admin_savepost'
        ]);
$addLink = $this->Html->link('增加文章', '#',
        [
                'onclick' => "mLayerAction('$url');",
                'class' => 'addButton'
        ]);
?>
<!-- 当前位置提示条 -->
<div class="page_navi">
    您现在的位置：<?php echo $this->Html->link( Configure::read('c_site_title'),['controller'=>'pages', 'action'=>'display']); ?>
    &gt; 帮扶项目
</div>
<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m">帮扶项目</div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">
<?php

echo $addLink;  

if (isset($data) && ! empty($data)) {
    
    ?>
<table>
<?php
    foreach ($data as $d) {
        ?>
    <tr>
						<td class="jobtitle"><?php
        if (isset($isAdmin) && $isAdmin) {
            echo $this->Html->link($d['Post']['title'], "#", 
                    [
                            'onclick' => "mLayerAction('" . $this->Html->url(
                                    [
                                            'controller' => 'project',
                                            'action' => 'savepost',
                                            $d['Post']['id']
                                    ]) . "');",
                            'class' => 'jobtitle'
                    ]);
        } else {
            echo $this->Html->link($d['Post']['title'], 
                    [
                            'controller' => 'project',
                            'action' => 'postdetail',
                            $d['Post']['id']
                    ], 
                    [
                            'class' => 'jobtitle'
                    ]);
        }
        ?></td>
						<td><?php
        echo date('Y-m-d', strtotime($d['Post']['created']));
        ?></td>
					</tr>
<?php
    }
    ?>
</table>

<?php
} else {
    echo Configure::read('MSG00010001');
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
