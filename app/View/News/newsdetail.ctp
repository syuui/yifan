<?php
$this->start('sidebar');
echo $this->Element('sidebar/news');
$this->end();
?>
<!-- 当前位置提示条 -->
<div class="page_navi">
	您现在的位置：<?php echo $this->Html->link( Configure::read('c_site_title'), array('controller'=>'pages', 'action'=>'display')); ?> &gt; 
	<?php echo $this->Html->link('新闻资讯', ['controller'=>'news', 'action'=>'index']);   ?> &gt; 新闻内容
</div>
<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m">新闻内容</div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">
				<div class="ele_cnt_txt">
<?php
if (empty($data['News']['id'])) {
    echo Configure::read('MSG00010001');
} else {
    ?>
<span class="news_title"><?php echo $data['News']['title'];?></span> <span
						class="news_date"><?php echo $data['News']['updated'];?></span> <span
						class="news_content"><?php echo $this->Tag->nl2p($data['News']['content']);?></span>
<?php
}
?>
				</div>
			</div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>
