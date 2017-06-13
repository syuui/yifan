<?php
$this->start('sidebar');
echo $this->Element('sidebar/news');
$this->end();

$page_title = '新闻内容';

$this->start('page_title');
echo $page_title;
$this->end();

$this->start('breadcrumb');
$this->Html->addCrumb('新闻资讯', 
        [
                'controller' => 'news',
                'action' => 'index'
        ]);
$this->Html->addCrumb($page_title);
echo $this->Html->getCrumbs(' &gt; ', null);
$this->end();
?>
<div class="ele_cnt_txt">
<?php
if (empty($data['News']['id'])) {
    echo Configure::read('MSG00010001');
} else {
    echo $this->Html->tag('span', $data['News']['title'], 
            [
                    'class' => 'news_title'
            ]);
    echo $this->Html->tag('span', $data['News']['updated'], 
            [
                    'class' => 'news_date'
            ]);
    echo $this->Html->tag('span', $this->Tag->nl2p($data['News']['content']), 
            [
                    'class' => 'news_content'
            ]);
}
?>
</div>
