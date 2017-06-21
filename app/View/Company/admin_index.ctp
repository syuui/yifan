<?php
$this->start('sidebar');
echo $this->Element('sidebar/company');
$this->end();

$this->start('page_title');
echo $page_title;
$this->end();

$this->start('breadcrumb');
$this->Html->addCrumb('走进朗豪', 
        [
                'controller' => 'company',
                'action' => 'index'
        ]);
$this->Html->addCrumb($page_title);
$this->end();

// 编辑图片
$url = $this->Html->url(
        [
                'controller' => 'company',
                'action' => 'editpic',
                $type
        ]);

echo $this->Html->link('编辑图片', '#', 
        [
                'onclick' => "mLayerShow('" . $url . "');",
                'class' => 'submit'
        ]);
foreach ($pics as $p) {
    $img = '/img/' . CompanyController::UPLOAD_IMAGE . '/' .
             $p['Variable']['value'];
    
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
                'controller' => 'company',
                'action' => 'edit',
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
