<?php
$page_title = '管理图片';

$this->start('sidebar');
echo $this->Element('sidebar/tools');
$this->end();

$this->start('page_title');
echo $page_title;
$this->end();

$this->start('breadcrumb');
$this->Html->addCrumb('管理工具', 
        [
                'controller' => 'tools',
                'action' => 'index'
        ]);
$this->Html->addCrumb($page_title);
echo $this->Html->getCrumbs(' &gt; ', null);
$this->end();

echo $this->Html->link('上传图片', 
        [
                'controller' => 'tools',
                'action' => 'editpic'
        ], [
                'class' => 'addButton'
        ]);

foreach ($data as $line) {
    $this->set('d', $line);
    echo $this->Element('picline');
}

if (isset($saveFailed) && $saveFailed) {
    $popTtl = Configure::read('MSG00010002');
    $popMsg = null;
    if ($this->Form->isFieldError('filename')) {
        $popMsg .= $this->Form->error('filename') . $this->Tag->br();
    }
    echo $this->Tag->popup($popTtl, $popMsg, "", '');
}
?>