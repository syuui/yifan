<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m">新闻资讯</div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">
<?php
$len = Configure::read('newslist_max_length');
$data = $this->requestAction(
        [
                'controller' => 'news',
                'action' => 'getAllNewsList',
                $len
        ]);
if (count($data) == 0) {
    echo Configure::read('MSG00010001');
} else {
    ?>
<ul class="list_style_2">
<?php foreach ($data as $d) {        ?>
    <li><?php echo $this->Html->link($d['News']['title'],['controller'=>'News','action'=>'newsdetail',$d['News']['id']]);?></li>
<?php }    ;?>
</ul>

<?php
}
?>
</div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>