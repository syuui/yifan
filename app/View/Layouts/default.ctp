<?php
$title = Configure::read('c_site_title');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset();	?>
	<title><?php echo $title;	?></title>
<?php
echo $this->Html->css('common');
echo $this->Html->css('navi');
?>
</head>
<body>
	<div id='contain'>
		<!-- LOGO -->
		<div id='e_logo'>
			<a href="#"><?php echo $this->Html->image('logo.png');	?></a>
		</div>
		<!-- //LOGO -->

		<!-- 下拉菜单 -->
		<div id="e_navi">
			<ul id="dropmenu">
				<li><a href="/">网站首页</a></li>
				<li><a href="/company/profile">公司概况</a></li>
				<li><a href="product/class/">产品中心</a></li>
				<li><a href="news/class/">新闻动态</a></li>
				<li><a href="page/quality/goal.php">质量体系</a></li>
				<li><a href="job/index.php">人才招聘</a></li>
				<li><a href="page/html/display.php">企业风采</a></li>
				<li><a href="page/contact/contact.php">联系我们</a></li>
			</ul>
			<!-- slide -->
			<a href="#"><?php echo $this->Html->image('slide.jpg', array('class'=>'slide'))?></a>
		</div>
		<!-- Content -->
		<div id='content'>
		<?php echo $this->fetch('content'); ?>
		</div>
	</div>
	<div id="bottom">
		<div class="pdv_cnt">
			<div id="bottommenu">
				| <a href="#" target="_self">关于我们</a>| <a href="#" target="_self">联系方式</a>|
				<a href="#" target="_self">信息反馈</a>| <a href="#" target="_self">人才招聘</a>|
				<a href="#" target="_self">友情链接</a>|
			</div>
			<p>Copyright (C) 2017 XXX公司</p>
		</div>

</body>
</html>
