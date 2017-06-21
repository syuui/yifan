<?php
$page_title = '人才战略';

$this->start('sidebar');
echo $this->Element('sidebar/recruit');
$this->end();

$this->start('page_title');
echo $page_title;
$this->end();

$this->start('breadcrumb');
$this->Html->addCrumb('招贤纳士', 
        [
                'controller' => 'recruit',
                'action' => 'index'
        ]);
$this->Html->addCrumb($page_title);
$this->end();

$msg = empty($data['Variable']['value']) ? Configure::read('MSG00010001') : $this->Tag->nl2p(
        trim($data['Variable']['value']));

if (isset($isAdmin) && $isAdmin) {
    // 编辑文章
    $url = $this->Html->url(
            [
                    'controller' => 'recruit',
                    'action' => 'admin_strategy_edit'
            ]);
    $options = [
            'onclick' => "mLayerShow('${url}');"
    ];
    echo $this->Html->div('ele_cnt_txt', $msg, $options);
} else {
    echo $this->Html->div('ele_cnt_txt', $msg);
}
