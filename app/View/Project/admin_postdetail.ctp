<?php
$this->start('sidebar');
echo $this->Element('sidebar/project');
$this->end();
$page_title = $data['Post']['title'];

$this->start('page_title');
echo $page_title;
$this->end();

$this->start('breadcrumb');
$this->Html->addCrumb('帮扶项目', 
        [
                'controller' => 'project',
                'action' => 'index'
        ]);
$this->Html->addCrumb($page_title);
echo $this->Html->getCrumbs(' &gt; ', null);
$this->end();

$url = $this->Html->url(
        [
                'controller' => 'project',
                'action' => 'admin_savepost'
        ]);
?>

<?php
if (! empty($data)) {
    echo $this->Html->tag('span', $data['Post']['title'], 
            [
                    'class' => 'news_title'
            ]);
    
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
                    'value' => $data['Post']['title'],
                    'class' => 'txt_button2_title'
            ]);
    echo $this->Form->submit('保存', 
            [
                    'class' => 'submit',
                    'div' => false,
                    'name' => 'Post.action'
            ]);
    echo $this->Form->input('Post.id', 
            [
                    'type' => 'hidden',
                    'value' => $data['Post']['id']
            ]);
    echo $this->Form->submit('删除文章', 
            [
                    'class' => 'reset',
                    'name' => 'Post.action',
                    'div' => false
            ]);
    echo $this->Form->end();
    /* 删除文章用表单结束 */
    
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
    
    foreach ($data['Sector'] as $s) {
        ?>
<div class="jd-block">
	<div class="jd-title">
<?php
        echo $s['seq'];
        echo $this->Html->link('+', '#', 
                [
                        'onclick' => 'switchOnOff("sector_' . $s['id'] . '");',
                        'class' => 'switch-link'
                ]);
        
        ?></div>
	<div class="jdline">
		<div id="sector_<?php echo $s['id'];?>" style="display: none;">
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
                        'value' => $s['seq'],
                        'label' => '表示顺序'
                ]);
        
        echo $this->Form->input('Sector.message', 
                [
                        'label' => false,
                        'class' => 'txa_button',
                        'value' => $s['message']
                ]);
        echo $this->Form->input('Sector.id', 
                [
                        'value' => $s['id'],
                        'type' => 'hidden'
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
        ?>
</div>
	</div>
</div>
<?php
    }
} else {
    echo Configure::read('MSG00010001');
}

?>
