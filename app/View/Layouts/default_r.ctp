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

			<div id="content">
			<?php echo $this->fetch('content');	?>
			</div>

			<!-- right -->
			<div id="right">
			<?php echo $this->fetch('sidebar');	?>
			</div>
			<!-- /right -->

			<div class="clearfloat"></div>
		</div>
		<!-- /contect -->
		<?php echo $this->Element('footer');	?>
	</div>
</body>
</html>
