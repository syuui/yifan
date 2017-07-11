<?php
$this->start('sidebar');
echo $this->Element('sidebar/project');
$this->end();
$page_title = $data['Project']['title'];

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
$this->end();

if (! empty($data['Project']['title'])) {
    echo $this->Html->tag('span', $data['Project']['title'], 
            [
                    'class' => 'project_title'
            ]);
}
echo $this->Html->tag('span', 
        date('Y-m-d', strtotime($data['Project']['updated'])), 
        [
                'class' => 'project_date'
        ]);

$basepath = ProjectController::UPLOAD_IMAGE . '/' . $data['Project']['id'] . '/';
foreach ($data['Psector'] as $s) {
    if ($s['type'] === 'P') {
        $divcnt = $this->Html->image($basepath . $s['src']) .
                 $this->Html->div('project-sector-subject', $s['message']);
    } else {
        $divcnt = $this->Tag->nl2p($s['message']);
    }
    echo $this->Html->div('project-sector', $divcnt);
}

?>
