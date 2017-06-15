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
echo $this->Html->getCrumbs(' &gt; ', null);
$this->end();

$msg = empty($data['Variable']['value']) ? Configure::read('MSG00010001') : $this->Tag->nl2p(
        trim($data['Variable']['value']));

echo $this->Html->div('ele_cnt_txt', $msg);
