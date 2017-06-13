<?php
$page_title = '企业简介';

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
echo $this->Html->getCrumbs(' &gt; ', null);
$this->end();
?>
<div class="ele_cnt_txt">
<?php
if (empty($data['Variable']['value'])) {
    echo Configure::read('MSG00010001');
} else {
    echo $this->Tag->nl2p($data['Variable']['value']);
}
?>
</div>
