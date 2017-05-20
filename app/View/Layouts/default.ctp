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
	<!-- contain -->
	<div id='contain'>
		<!-- LOGO -->
		<div id='e_logo'>
			<a href="#"><?php echo $this->Html->image('logo.png');	?></a>
		</div>
		<!-- //LOGO -->

		<!-- 下拉菜单 -->
		<?php echo $this->Element('navi'); ?>
		<!-- //下拉菜单 -->

		<!-- Content -->
		<div id='content'>
		<?php echo $this->fetch('content'); ?>
		</div>
		<!-- //Content -->
	</div>
	<!-- //contain -->

	<?php echo $this->Element('footer');	?>
</body>
</html>
