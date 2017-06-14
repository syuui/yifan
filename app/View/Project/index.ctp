<?php
$this->start('sidebar');
echo $this->Element('sidebar/company');
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
    
    echo '<table>';
    
    foreach ($data as $d) {
        
        $table_cells[] = [
                [
                        $this->Html->link($d['Post']['title'], 
                                [
                                        'controller' => 'project',
                                        'action' => 'postdetail',
                                        $d['Post']['id']
                                ]),
                        [
                                'class' => 'projectlist_index'
                        ]
                ],
                [
                        date('Y-m-d', strtotime($d['Post']['created'])),
                        [
                                'class' => 'project_date'
                        ]
                ]
        ];
    }
    echo $this->Html->tableCells($table_cells);
    
    echo '</table>';
} else {
    echo Configure::read('MSG00010001');
}

echo $this->Html->div('pagination', 
        $this->Paginator->prev(' < ') . $this->Paginator->numbers(
                [
                        'separator' => ' | '
                ]) . $this->Paginator->next(' > '));

?>