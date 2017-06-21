<?php
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

$form_s = $this->Form->create('Variable', 
        [
                'type' => 'file'
        ]);
$inputs = $this->Form->file('bannerfile', 
        [
                'class' => 'ipt_file'
        ]);
$submit = $this->Form->submit('上传', 
        [
                'class' => 'submit',
                'div' => false
        ]);
$form_e = $this->Form->end();

echo $form_s;
echo $inputs;
echo $submit;
echo $form_e;
echo $this->Html->image(
        $type === 'L' ? Configure::read('logo_filename') : Configure::read(
                'banner_filename'));