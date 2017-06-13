<?php
$this->start('sidebar');
echo $this->Element('sidebar/project');
$this->end();

$form_s = $this->Form->create('Post', 
        [
                'inputDefaults' => [
                        'label' => false,
                        'legend' => false,
                        'div' => false
                ]
        ]);
$form_e = $this->Form->end();
$inputs = $this->Form->Inputs(
        [
                'Post.id' => [
                        'type' => 'hidden',
                        'value' => $data['Post']['id']
                ],
                'Post.title' => [
                        'value' => $data['Post']['title'],
                        'label' => '文章名称',
                        'div' => true
                ]
        ], null, 
        [
                'fieldset' => false,
                'legend' => false
        ]);

$url = $this->Html->url(
        [
                'controller' => 'project',
                'action' => 'savesector'
        ]);
$buttons = $this->Form->submit('保存', 
        [
                'label' => false,
                'div' => false,
                'class' => 'submit',
                'name' => 'Post.action'
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
echo $form_s;
echo $inputs;
echo $buttons;
echo $form_e;
?>
            </div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>
