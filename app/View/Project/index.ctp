<?php
$this->start('sidebar');
echo $this->Element('sidebar/project');
$this->end();
$page_title = '帮扶项目';

$this->start('page_title');
echo $page_title;
$this->end();

$this->start('breadcrumb');
$this->Html->addCrumb($page_title);
echo $this->Html->getCrumbs(' &gt; ', null);
$this->end();

$addLink = $this->Html->link('增加文章', 
        [
                'controller' => 'project',
                'action' => 'admin_savepost'
        ], [
                'class' => 'submit'
        ]);

if (isset($isAdmin) && $isAdmin) {
    echo $addLink;
}

if (! empty($data)) {
    foreach ($data as $d) {
        $div_title = $this->Html->link($d['Post']['title'], 
                [
                        'controller' => 'project',
                        'action' => 'postdetail',
                        $d['Post']['id']
                ]);
        $div_date = date('Y-m-d', strtotime($d['Post']['created']));
        echo $this->Html->div('projectlist', 
                $this->Html->div('projectlist_index', $div_title) .
                         $this->Html->div('projectlist_date', $div_date));
    }
} else {
    echo Configure::read('MSG00010001');
}

echo $this->Element('pagination');

?>
