<?php
$this->start('sidebar');
echo $this->Element('sidebar/expert');
$this->end();

$this->start('page_title');
echo $page_title;
$this->end();

$this->start('breadcrumb');
$this->Html->addCrumb('专家风采', 
        [
                'controller' => 'expert',
                'action' => 'index'
        ]);
$this->Html->addCrumb($page_title);
echo $this->Html->getCrumbs(' &gt; ', null);
$this->end();

// 编辑图片
$url = $this->Html->url(
        [
                'controller' => 'expert',
                'action' => 'index_editpic',
                $type
        ]);

echo $this->Html->link('编辑图片', '#', 
        [
                'onclick' => "mLayerShow('" . $url . "');",
                'class' => 'submit'
        ]);
foreach ($pics as $p) {
    $img = '/img/' . Uploaditem::UPLOAD_IMAGE . '/' . $p['Variable']['value'];
    
    echo $this->Html->div('piclist_pic', 
            $this->Html->image($img, 
                    [
                            'alt' => $p['Variable']['value'],
                            'onclick' => "mLayerShow('" . $url . "');"
                    ]));
}
?>
<div class="ele_cnt_txt">
<?php

// 编辑文章
$url = $this->Html->url(
        [
                'controller' => 'expert',
                'action' => 'index_edit',
                $type
        ]);
$options = [
        'onclick' => "mLayerShow('${url}');"
];

if (empty($data['Variable']['value'])) {
    echo $this->Html->tag('span', Configure::read('MSG00010001'), $options);
} else {
    echo $this->Html->tag('span', $this->Tag->nl2p($data['Variable']['value']), 
            $options);
}
?>
</div>
