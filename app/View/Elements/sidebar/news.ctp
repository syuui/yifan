<?php
$form_s = $this->Form->create('', 
        [
                'type' => 'POST',
                'url' => [
                        'controller' => 'news',
                        'action' => 'search'
                ]
        ]);
$this->Form->inputDefaults(
        array(
                'label' => false,
                'div' => false,
                'class' => 'keyword'
        ));
$input = $this->Form->input('keyword');
$submit = $this->Form->submit("搜索", 
        [
                'class' => 'search_button',
                'div' => false
        ]);
$form_e = $this->Form->end();
?>
<!-- 栏目导航 -->
<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m">栏目导航</div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">
				<ul class="list_style_2">
					<li><?php echo $this->Html->link('公司动态', array('controller'=>'news', 'action'=>'index'));?></li>
					<li><?php echo $this->Html->link('行业动态', array('controller'=>'news', 'action'=>'inews'));?></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>
<!-- /栏目导航 -->

<!-- 资讯搜索 -->
<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m">资讯搜索</div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">
<?php
echo $form_s;
echo $input;
echo $submit;
echo $form_e;
?>
			</div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>
<!-- /资讯搜索 -->

<!-- 最新动态 -->
<?php echo $this->element('newslist');  ?>
<!-- /最新动态 -->