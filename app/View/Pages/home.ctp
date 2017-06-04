
<!-- left -->
<div id="left">
<?php echo $this->Element('aboutus');	?>
<?php echo $this->Element('contactus'); ?>
</div>
<!-- /left -->

<!-- middle -->
<div id="middle">
	<!-- 帮扶项目 -->
	<div class="ele_block">
		<div class="ele_bdr_l">
			<div class="ele_bdr_r">
				<div class="ele_ttl_l">
					<div class="ele_ttl_m">帮扶项目</div>
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
	<!-- 帮扶项目 -->

	<!-- 专家风采 -->
	<div class="ele_block">
		<div class="ele_bdr_l">
			<div class="ele_bdr_r">
				<div class="ele_ttl_l">
					<div class="ele_ttl_m">专家风采</div>
					<div class="ele_ttl_r"></div>
				</div>
				<div class="ele_cnt">
					<div class="productlist_index">
						<div class="productlist_index_pic">
							<a href="#" target="_blank"><?php echo $this->Html->image('product_001.jpg');	?></a>
						</div>
						<div class="productlist_index_title">
							<a href="#" target="_blank" class="title">张三</a>
						</div>
					</div>
					<div class="productlist_index">
						<div class="productlist_index_pic">
							<a href="#" target="_blank"><?php echo $this->Html->image('product_001.jpg');	?></a>
						</div>
						<div class="productlist_index_title">
							<a href="#" target="_blank" class="title">李四</a>
						</div>
					</div>
					<div class="productlist_index">
						<div class="productlist_index_pic">
							<a href="#" target="_blank"><?php echo $this->Html->image('product_001.jpg');	?></a>
						</div>
						<div class="productlist_index_title">
							<a href="#" target="_blank" class="title">王五</a>
						</div>
					</div>
					<div class="productlist_index">
						<div class="productlist_index_pic">
							<a href="#" target="_blank"><?php echo $this->Html->image('product_001.jpg');	?></a>
						</div>
						<div class="productlist_index_title">
							<a href="#" target="_blank" class="title">赵六</a>
						</div>
					</div>
					<div class="productlist_index">
						<div class="productlist_index_pic">
							<a href="#" target="_blank"><?php echo $this->Html->image('product_001.jpg');	?></a>
						</div>
						<div class="productlist_index_title">
							<a href="#" target="_blank" class="title">尼莫</a>
						</div>
					</div>
					<div class="productlist_index">
						<div class="productlist_index_pic">
							<a href="#" target="_blank"><?php echo $this->Html->image('product_001.jpg');	?></a>
						</div>
						<div class="productlist_index_title">
							<a href="#" target="_blank" class="title">源静香</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="ele_ftr_l"></div>
		<div class="ele_ftr_r"></div>
	</div>
	<!-- /专家风采 -->
</div>
<!-- /middle -->

<!-- right -->
<div id="right">
	<!-- 新闻资讯 -->
<?php echo $this->element('newslist');  ?>
	<!-- 新闻资讯 -->

	<!-- 招贤纳士 -->
<?php echo $this->element('recruitlist');   ?>
	<!-- /招贤纳士 -->
</div>
<!-- /right -->

<div class="clearfloat"></div>