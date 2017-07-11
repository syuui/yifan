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

$options = [];
$curl = $this->Html->url(
        [
                'controller' => 'project',
                'action' => 'edit',
                $id
        ]);

// 文章标题、更新时间
if (empty($data['Project']['title'])) {
    echo $this->Html->tag('span', Configure::read('MSG00010001'), 
            [
                    'class' => 'project_title',
                    'onclick' => "mLayerShow('" . $curl . "');"
            ]);
} else {
    echo $this->Html->tag('span', $data['Project']['title'], 
            [
                    'class' => 'project_title',
                    'onclick' => "mLayerShow('" . $curl . "');"
            ]);
    echo $this->Html->tag('span', 
            date('Y-m-d', strtotime($data['Project']['updated'])), 
            [
                    'class' => 'project_date'
            ]);
}

$url = $this->Html->url(
        [
                'controller' => 'Project',
                'action' => 'sector',
                $id
        ]);
echo $this->Form->button('新增章节', 
        [
                'onclick' => "mLayerShow('$url');",
                'class' => 'submit'
        ]);

$basepath = ProjectController::UPLOAD_IMAGE . '/' . $data['Project']['id'] . '/';
$ns = [];
foreach ($data['Psector'] as $s) {
    if ($s['type'] === 'P') {
        $url = $this->Html->url(
                [
                        'controller' => 'Project',
                        'action' => 'sector',
                        $s['project_id'],
                        $s['id']
                ]);
        $divcnt = $this->Html->image($basepath . $s['src']) .
                 $this->Html->div('project-sector-subject', $s['message']);
    } else {
        $url = $this->Html->url(
                [
                        'controller' => 'Project',
                        'action' => 'sector',
                        $s['project_id'],
                        $s['id']
                ]);
        $divcnt = $this->Tag->nl2p($s['message']);
    }
    echo $this->Html->div('project-sector', $divcnt, 
            [
                    'onclick' => 'mLayerShow(\'' . $url . '\');'
            ]);
}
?>
