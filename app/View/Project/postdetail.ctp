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
if (! empty($data)) {
    echo $this->Html->div('jdtitle', $data['Post']['title']);
    
    if (isset($isAdmin) && $isAdmin) {
        /* 保存文章用表单 */
        echo $this->Form->create('Post', 
                [
                        'url' => [
                                'controller' => 'project',
                                'action' => 'savepost'
                        ],
                        'inputDefaults' => [
                                'div' => false,
                                'label' => false
                        ]
                ]);
        echo $this->Form->input('Post.id', 
                [
                        'type' => 'hidden',
                        'value' => $data['Post']['id']
                ]);
        echo $this->Form->input('Post.title', 
                [
                        'label' => '文章标题',
                        'value' => $data['Post']['title']
                ]);
        echo $this->Form->submit('保存', 
                [
                        'class' => 'submit',
                        'div' => false,
                        'name' => 'Post.action'
                ]);
        echo $this->Form->end();
        /* 保存文章用表单结束 */
        
        /* 增加节用表单 */
        echo $this->Form->create('Sector', 
                [
                        'url' => [
                                'controller' => 'project',
                                'action' => 'savesector'
                        ],
                        'inputDefaults' => [
                                'div' => false,
                                'label' => false
                        ]
                ]);
        echo $this->Form->input('Sector.post_id', 
                [
                        'value' => $data['Post']['id'],
                        'type' => 'hidden'
                ]);
        echo $this->Form->submit('增加节', 
                [
                        'class' => 'submit',
                        'name' => 'Sector.action'
                ]);
        echo $this->Form->end();
        /* 增加节用表单结束 */
        
        /* 删除文章用表单 */
        echo $this->Form->create('Post', 
                [
                        'url' => [
                                'controller' => 'project',
                                'action' => 'savepost'
                        ],
                        'inputDefaults' => [
                                'div' => false,
                                'label' => false
                        ]
                ]);
        echo $this->Form->input('Post.id', 
                [
                        'type' => 'hidden',
                        'value' => $data['Post']['id']
                ]);
        echo $this->Form->submit('删除文章', 
                [
                        'class' => 'reset',
                        'name' => 'Post.action'
                ]);
        echo $this->Form->end();
        /* 删除文章用表单结束 */
    }
    
    foreach ($data['Sector'] as $s) {
        if (isset($isAdmin) && $isAdmin) {
            ?>
<div class="jdline">
<?php
            echo $this->Form->create('Sector', 
                    [
                            'url' => [
                                    'controller' => 'project',
                                    'action' => 'savesector'
                            ],
                            'inputDefaults' => [
                                    'label' => false,
                                    'div' => false
                            ]
                    ]);
            echo $this->Form->input('Sector.id', 
                    [
                            'type' => 'hidden',
                            'value' => $s['id']
                    ]);
            echo $this->Form->input('Sector.seq', 
                    [
                            'div' => false,
                            'value' => $s['seq']
                    ]);
            echo $this->Html->link('+', '#', 
                    [
                            'onclick' => 'switchOnOff("sector_' . $s['id'] .
                                     '");',
                                    'style' => 'float: right; font-size: 16px; font-weight: bold; margin-right: 10px; border: 1px solid; width: 30px; text-align: center;'
                    ]);
            
            ?>
<div id="sector_<?php echo $s['id'];?>" style="display: none;">
<?php
            echo $this->Form->input('Sector.message', 
                    [
                            'label' => false,
                            'class' => 'txa_message',
                            'value' => $s['message']
                    ]);
            echo $this->Form->input('Sector.post_id', 
                    [
                            'value' => $data['Post']['id'],
                            'type' => 'hidden'
                    ]);
            echo $this->Form->submit('保存', 
                    [
                            'div' => false,
                            'class' => 'submit',
                            'name' => 'Sector.action'
                    ]);
            echo $this->Form->end();
            
            echo $this->Form->create('Sector', 
                    [
                            'url' => [
                                    'controller' => 'project',
                                    'action' => 'savesector'
                            ],
                            'inputDefaults' => [
                                    'label' => false,
                                    'div' => false
                            ]
                    ]);
            echo $this->Form->input('Sector.id', 
                    [
                            'type' => 'hidden',
                            'value' => $s['id']
                    ]);
            echo $this->Form->input('Sector.post_id', 
                    [
                            'value' => $data['Post']['id'],
                            'type' => 'hidden'
                    ]);
            echo $this->Form->submit('删除', 
                    [
                            'div' => false,
                            'class' => 'reset',
                            'name' => 'Sector.action'
                    ]);
            echo $this->Form->end();
        } else {
            echo $s['message'];
        }
        ?></div>
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
