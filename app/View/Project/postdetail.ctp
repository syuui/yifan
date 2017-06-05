<?php
$this->start('sidebar');
echo $this->Element('sidebar/project');
$this->end();

$url = $this->Html->url(
        [
                'controller' => 'project',
                'action' => 'admin_savepost'
        ]);
?>
<!-- 当前位置提示条 -->
<div class="page_navi">
    您现在的位置：<?php echo $this->Html->link( Configure::read('c_site_title'),['controller'=>'pages', 'action'=>'display']); ?>
    &gt; <?php echo $this->Html->link('帮扶项目', ['controller'=>'project', 'action'=>'index']);    ?>
    &gt; <?php echo isset($data['Post']['title']) ? $data['Post']['title'] : Configure::read('MSG00010001'); ?>
</div>
<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m"><?php echo isset($data['Post']['title']) ? $data['Post']['title'] : Configure::read('MSG00010001'); ?></div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">
<?php
if (isset($data) && ! empty($data)) {
    ?>
<div class="jdtitle"><?php echo $data['Post']['title']; ?></div>

<?php
    
    echo $this->Form->create('Sector', 
            [
                    'url' => [
                            'controller' => 'project',
                            'action' => 'savesector'
                    ]
            ]);
    echo $this->Form->input('Sector.post_id', 
            [
                    'value' => $data['Post']['id'],
                    'type' => 'hidden'
            ]);
    echo $this->Form->submit('增加节', [
            'class' => 'submit'
    ]);
    echo $this->Form->end();
    
    foreach ($data['Sector'] as $s) {
        if (isset($isAdmin) && $isAdmin) {
            echo $this->Form->create('Sector');
            ?>
<div class="jdline">
<?php
            
            echo $this->Form->input('Sector.seq', 
                    [
                            'div' => false,
                            'value' => $s['seq']
                    ]);
            ?>
                    <a href="#"
						onclick='switchOnOff("sector_<?php echo $s['id'];?>")'
						style="float: right; font-size: 16px; font-weight: bold; margin-right: 10px; border: 1px solid; width: 30px; text-align: center;">+</a>
<?php
            echo $this->Form->input('Sector.message', 
                    [
                            'div' => [
                                    'id' => "sector_" . $s['id'],
                                    'style' => 'display:none;'
                            ],
                            'label' => false,
                            'class' => 'txa_message'
                    ]);
            echo $this->Form->end();
        }
        ?>
				</div>
<?php
    }
} else {
    echo Configure::read('MSG00010001');
}

?>
			</div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>
