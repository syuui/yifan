<?php
$this->start('sidebar');
echo $this->Element('sidebar/contactus');
$this->end();
?>
<!-- 当前位置提示条 -->
<div class="page_navi">
	您现在的位置：<?php echo $this->Html->link( Configure::read('c_site_title'), array('controller'=>'pages', 'action'=>'display')); ?>
	&gt; 联系我们
</div>
<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m">联系我们</div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">
                    地址：<?php echo Configure::read('contact_address') . $this->Tag->br();   ?>
                    电话：<?php echo Configure::read('contact_tel') . $this->Tag->br();   ?>
                    传真：<?php echo Configure::read('contact_fax') . $this->Tag->br();   ?>
                    邮箱：<?php echo Configure::read('contact_mail') . $this->Tag->br();  ?>
                    邮编：<?php echo Configure::read('contact_zip') . $this->Tag->br();    ?>
                    <?php
                    echo $this->Tag->br();
                    echo $this->Html->image(Configure::read('map_filename'), 
                            [
                                    'class' => 'map',
                                    'alt' => '地图',
                                    'id' => 'mappic',
                                    'onclick' => 'window.open($("#mappic").attr("src"));'
                            ]);
                    ?>
			</div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>