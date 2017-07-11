
<!-- left -->
<div id="left">
<?php echo $this->Element('aboutus');	?>
<?php echo $this->Element('contactus'); ?>
</div>
<!-- /left -->

<!-- middle -->
<div id="middle">
	<!-- 帮扶项目 -->
    <?php  echo $this->Element('projectlist');  ?>
	<!-- 帮扶项目 -->

	<!-- 专家风采 -->
	<?php echo $this->Element('expertlist');?>
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