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
$this->end();

$url = $this->Html->url(
        [
                'controller' => 'project',
                'action' => 'edit'
        ]);

if (isset($isAdmin) && $isAdmin) {
    $addLink = $this->Html->link('增加文章', '#', 
            [
                    'class' => 'submit',
                    'onclick' => "mLayerShow('" . $url . "');"
            ]);
    echo $addLink;
}

$ns = [];
if (! empty($data)) {
    foreach ($data as $d) {
        $div_title = $this->Html->link($d['Project']['title'], 
                [
                        'controller' => 'project',
                        'action' => 'detail',
                        $d['Project']['id']
                ]);
        $div_date = date('Y-m-d', strtotime($d['Project']['created']));
        $ns[] = $this->Html->div('projectlist', 
                $this->Html->div('projectlist_index', $div_title) .
                         $this->Html->div('projectlist_date', $div_date));
    }
    
    echo $this->Html->nestedList($ns, 
            [
                    'class' => 'list_style_2'
            ]);
} else {
    echo Configure::read('MSG00010001');
}

echo $this->Element('pagination');