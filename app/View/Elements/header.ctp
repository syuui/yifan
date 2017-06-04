<!-- 网站头 -->
<div id="header">
	<div id="sitename"><?php echo $this->Html->image(Configure::read('logo_filename'));	?></div>
	<div id="navi">
		<ul id="dropmenu">
			<?php
if (isset($isAdmin) && $isAdmin) {
    // 管理员用户
    ?>
			<li><a href="/admin/pages/display">首页</a></li>
			<li><a href="/admin/company">走进朗豪</a></li>
			<li><a href="/admin/news">新闻资讯</a></li>
			<li><a href="/admin/project/">帮扶项目</a></li>
			<li><a href="/admin/expert">专家风采</a></li>
			<li><a href="/admin/recruit">招贤纳士</a></li>
			<li><a href="/admin/contactus">联系我们</a></li>
			<li><a href="/admin/pages/tools">管理工具</a></li>		
			<?php
} else {
    // 一般用户
    ?>
			<li><a href="/">首页</a></li>
			<li><a href="/company">走进朗豪</a></li>
			<li><a href="/news">新闻资讯</a></li>
			<li><a href="/project/">帮扶项目</a></li>
			<li><a href="/expert">专家风采</a></li>
			<li><a href="/recruit">招贤纳士</a></li>
			<li><a href="/contactus">联系我们</a></li>
			<?php
}
?>
			<li class="menuright"></li>
		</ul>
	</div>
	<div id="banner"><?php echo $this->Html->image(Configure::read('banner_filename'));?></div>
</div>
<!-- /网站头 -->