<?php
$this->start('sidebar');
echo $this->Element('sidebar/company');
$this->end();
$page_title = $data['Post']['title'];

$this->start('page_title');
echo $page_title;
$this->end();

$this->start('breadcrumb');
$this->Html->addCrumb('帮扶项目', 
        [
                'controller' => 'project',
                'action' => 'index'
        ]);
$this->Html->addCrumb($page_title);
echo $this->Html->getCrumbs(' &gt; ', null);
$this->end();

if (! empty($data)) {
    echo $this->Html->tag('span', $data['Post']['title'], 
            [
                    'class' => 'project_title'
            ]);
    echo $this->Html->tag('span', $data['Post']['updated'], 
            [
                    'class' => 'project_date'
            ]);
    
    $msg = '';
    foreach ($data['Sector'] as $s) {
        $msg .= $this->Tag->nl2p($s['message']);
    }
    echo $this->Html->div('ele_cnt_txt', $msg);
} else {
    echo Configure::read('MSG00010001');
}

?>
