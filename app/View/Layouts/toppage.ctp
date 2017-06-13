<?php
$title = Configure::read('c_site_title');
?>
<?php echo $this->Html->docType();?>
<html>
<head>
	<?php	echo $this->Element('include');	?>
	<title><?php echo $title;	?></title>
</head>
<body>
	<div id="contain">
		<?php echo $this->Element('header');	?>
		<div id="contect">
		<?php echo $this->fetch('content');	?>
		</div>

		<?php echo $this->Element('footer');	?>
	</div>
<?php
if (Configure::read('debug') > 0) {
    echo $this->Element('sql_dump');
}
?>
</body>
</html>
