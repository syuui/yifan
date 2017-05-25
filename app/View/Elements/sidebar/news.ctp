
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
					<li><?php echo $this->Html->link('公司动态', array('controller'=>'company', 'action'=>'cnews'));?></li>
					<li><?php echo $this->Html->link('行业动态', array('controller'=>'company', 'action'=>'inews'));?></li>
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
				<form
					action="<?php echo $this->Html->url(array('controller'=>'news', 'action'=>'search'));	?>"
					method="POST">
				<?php
    echo $this->Form->input('keyword');
    echo $this->Form->submit("Search");
    ?>
				</form>

			</div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>
<!-- /资讯搜索 -->

<!-- 最新动态 -->
<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m">最新动态</div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">
				<ul class="list_style_2">
					<li><?php echo $this->Html->link('XXXX医院YYYY项目顺利实施', array('controller'=>'news', 'action'=>'displaynews', 5))?></li>
					<li><?php echo $this->Html->link('XXXX医院YYYY项目顺利实施', array('controller'=>'news', 'action'=>'displaynews', 5))?></li>
					<li><?php echo $this->Html->link('XXXX医院YYYY项目顺利实施', array('controller'=>'news', 'action'=>'displaynews', 5))?></li>
					<li><?php echo $this->Html->link('XXXX医院YYYY项目顺利实施', array('controller'=>'news', 'action'=>'displaynews', 5))?></li>
					<li><?php echo $this->Html->link('XXXX医院YYYY项目顺利实施', array('controller'=>'news', 'action'=>'displaynews', 5))?></li>
					<li><?php echo $this->Html->link('XXXX医院YYYY项目顺利实施', array('controller'=>'news', 'action'=>'displaynews', 5))?></li>
					<li><?php echo $this->Html->link('XXXX医院YYYY项目顺利实施', array('controller'=>'news', 'action'=>'displaynews', 5))?></li>
					<li><?php echo $this->Html->link('XXXX医院YYYY项目顺利实施', array('controller'=>'news', 'action'=>'displaynews', 5))?></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>
<!-- /最新动态 -->