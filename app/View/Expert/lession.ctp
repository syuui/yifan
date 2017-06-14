<?php
$page_title = '专家风采';

$this->start('sidebar');
echo $this->Element('sidebar/expert');
$this->end();

$this->start('page_title');
echo $page_title;
$this->end();

$this->start('breadcrumb');
$this->Html->addCrumb('专家风采', 
        [
                'controller' => 'expert',
                'action' => 'index'
        ]);
echo $this->Html->getCrumbs(' &gt; ', null);
$this->end();
?>

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
<div class="clearfloat"></div>
<div class="ele_cnt_txt">
	专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采<br />
	专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采<br />
	专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采<br />
	专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采专家风采<br />
</div>

