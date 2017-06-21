<?php
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

$this->start('sidebar');
echo $this->Element('sidebar/news');
$this->end();
$page_title = '公司动态';

$this->start('page_title');
echo $title;
$this->end();

$this->start('breadcrumb');
$this->Html->addCrumb('新闻资讯', 
        [
                'controller' => 'news',
                'action' => 'index'
        ]);
$this->Html->addCrumb($title);
$this->end();

$url = $this->Html->url(
        [
                'controller' => 'news',
                'action' => 'admin_savenews'
        ]);
$addLink = $this->Html->link('增加新闻', '#', 
        [
                'onclick' => "mLayerShow('$url');",
                'class' => 'submit'
        ]);

?>
<div class="ele_cnt_txt">
<?php
if (isset($isAdmin)) {
    echo $addLink;
}

if (count($data) == 0) {
    echo Configure::read('MSG00010001');
} else {
    foreach ($data as $d) {
        if (isset($isAdmin) && $isAdmin === true) {
            $url = $this->Html->url(
                    [
                            'controller' => 'news',
                            'action' => 'admin_savenews',
                            $d['News']['id']
                    ]);
            $ns[] = $this->Html->link($d['News']['title'], '#', 
                    [
                            'onclick' => "mLayerShow('$url');"
                    ]);
        } else {
            $ns[] = $this->Html->link($d['News']['title'], 
                    [
                            'controller' => 'News',
                            'action' => 'newsdetail',
                            $d['News']['id']
                    ]);
        }
    }
    echo $this->Html->nestedList($ns, 
            [
                    'class' => 'list_style_2'
            ]);
}
?></div>
