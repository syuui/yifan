<?php
$title = Configure::read('c_site_title');

echo $this->Html->docType();
?>
<html>
<head>
    <?php   echo $this->Element('include'); ?>
    <title><?php echo $title;   ?></title>
</head>
<body>
	<!-- contain -->
	<div id="contain">
        <?php echo $this->Element('header');    ?>
        
        <!-- contect -->
		<div id="contect">

			<!-- content -->
			<div id="content">
				<!-- 当前位置提示条 -->
				<div class="page_navi">您现在的位置：
<?php
echo $this->Html->link($title, 
        [
                'controller' => 'pages',
                'action' => 'display'
        ]) . ' &gt; ';
echo $this->fetch('breadcrumb');
?></div>

				<div class="ele_block">
					<div class="ele_bdr_l">
						<div class="ele_bdr_r">
							<div class="ele_ttl_l">
								<div class="ele_ttl_m"><?php echo $this->fetch('page_title'); ?></div>
								<div class="ele_ttl_r"></div>
							</div>
							<div class="ele_cnt"><?php echo $this->fetch('content'); ?></div>
						</div>
					</div>
					<div class="ele_ftr_l"></div>
					<div class="ele_ftr_r"></div>
				</div>
			</div>
			<!-- /content -->

			<!-- right -->
			<div id="right"><?php echo $this->fetch('sidebar');  ?></div>
			<!-- /right -->
		</div>
		<div class="clearfloat"></div>

		<!-- /contect -->
        
        <?php echo $this->Element('footer');    ?>
    </div>
<?php
if (Configure::read('debug') > 0) {
    echo $this->Element('sql_dump');
}
?>
</body>
</html>
