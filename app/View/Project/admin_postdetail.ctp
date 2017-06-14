<?php
$this->start('sidebar');
echo $this->Element('sidebar/company');
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
    echo $this->Form->end();
    /* 保存文章用表单结束 */
    
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
        $form_s = $this->Form->create('Sector', 
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
        $inputs = $this->Form->input('Sector.id', 
                [
                        'type' => 'hidden',
                        'value' => $s['id']
                ]);
        $inputs .= $this->Form->input('Sector.seq', 
                [
                        'div' => false,
                        'value' => $s['seq']
                ]);
        $inputs .= $this->Html->link('+', '#', 
                [
                        'onclick' => 'switchOnOff("sector_' . $s['id'] . '");',
                        'style' => 'float: right; font-size: 16px; font-weight: bold; margin-right: 10px; border: 1px solid; width: 30px; text-align: center;'
                ]);
        $jdline_div = $form_s . $inputs;
        ?>
<div class="jdline">
	<div id="sector_<?php echo $s['id'];?>" style="display: none;">
<?php
        $sinputs = $this->Form->input('Sector.message', 
                [
                        'label' => false,
                        'class' => 'txa_message',
                        'value' => $s['message']
                ]);
        $sinputs .= $this->Form->input('Sector.post_id', 
                [
                        'value' => $data['Post']['id'],
                        'type' => 'hidden'
                ]);
        $submit = $this->Form->submit('保存', 
                [
                        'div' => false,
                        'class' => 'submit',
                        'name' => 'Sector.action'
                ]);
        $form_e = $this->Form->end();
        
        $form2_s = $this->Form->create('Sector', 
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
        $inputs2 = $this->Form->input('Sector.id', 
                [
                        'type' => 'hidden',
                        'value' => $s['id']
                ]);
        $inputs2 .= $this->Form->input('Sector.post_id', 
                [
                        'value' => $data['Post']['id'],
                        'type' => 'hidden'
                ]);
        $submit2 = $this->Form->submit('删除', 
                [
                        'div' => false,
                        'class' => 'reset',
                        'name' => 'Sector.action'
                ]);
        $form2_e = $this->Form->end();
        $sector_div = $this->Html->div('sector_' . $s['id'], 
                $sinputs . $submit . $form_e . $form2_s . $inputs2 . $submit2 .
                         $form2_e, 
                        [
                                'style' => 'display: none;'
                        ]);
        echo $this->Html->div('jdline', $jdline_div . $sector_div);
    }
} else {
    echo Configure::read('MSG00010001');
}

?>
