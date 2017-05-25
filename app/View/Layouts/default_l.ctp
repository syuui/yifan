<?php
$title = Configure::read('c_site_title');
?>
<?php echo $this->Html->docType();	?>
<html>
<head>
	<?php	echo $this->Html->charset();	?>
	<?php	echo $this->Html->css('general');	?>
	<title><?php echo $title;	?></title>
</head>
<body>
	<div id="contain">
		<?php echo $this->Element('header');	?>
		<!-- contect -->
		<div id="contect">
			<!-- left -->
			<div id="left">
			<?php echo $this->fetch('sidebar');	?>
			</div>
			<!-- /left -->


			<div id="content">
			<?php echo $this->fetch('content');	?>
			</div>
			<div class="clearfloat"></div>
		</div>
		<!-- /contect -->
		<?php echo $this->Element('footer');	?>
	</div>
<?php
if (Configure::read('debug') > 0) {
    echo $this->Element('sql_dump');
}
?>
</body>
</html>
