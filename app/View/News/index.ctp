<?php
$this->start('sidebar');
echo $this->Element('sidebar/news');
$this->end();

$url = $this->Html->url(
        [
                'controller' => 'news',
                'action' => 'admin_savenews'
        ]);
$addLink = $this->Html->link('增加新闻', '#', 
        [
                'onclick' => "mLayerAction('$url');",
                'class' => 'addButton'
        ]);

$inews = isset($inews) ? $inews : 'E';
switch ($inews) {
    case 'I':
        $title = '行业动态';
        break;
    case 'E':
        $title = '公司动态';
        break;
    case 'S':
        $title = '搜索结果';
        break;
    default:
        $title = '公司动态';
        break;
}
?>
<!-- 当前位置提示条 -->
<div class="page_navi">
    您现在的位置：<?php echo $this->Html->link( Configure::read('c_site_title'), array('controller'=>'pages', 'action'=>'display')); ?>
    &gt; 新闻资讯 &gt; <?php
    
    echo $title;
    ?>
</div>
<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m"><?php echo $title; ?></div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">
				<div class="ele_cnt_txt">
<?php
if (isset($isAdmin)) {
    echo $addLink;
}

if (count($data) == 0) {
    echo Configure::read('MSG00010001');
} else {
    ?>
                <ul class="list_style_2">
<?php foreach ($data as $d) {        ?>
    <li><?php
        if (isset($isAdmin) && $isAdmin === true) {
            $url = $this->Html->url(
                    [
                            'controller' => 'news',
                            'action' => 'admin_savenews',
                            $d['News']['id']
                    ]);
            echo $this->Html->link($d['News']['title'], '#', 
                    [
                            'onclick' => "mLayerAction('$url');"
                    ]);
        } else {
            echo $this->Html->link($d['News']['title'], 
                    [
                            'controller' => 'News',
                            'action' => 'newsdetail',
                            $d['News']['id']
                    ]);
        }
        ?></li>
					
<?php
    }
    ?>
    </ul>
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
