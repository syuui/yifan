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
echo $this->Html->getCrumbs(' &gt; ', null);
$this->end();

if (isset($isAdmin) && $isAdmin) {}

$options = [];
if (isset($isAdmin) && $isAdmin) {
    $curl = $this->Html->url(
            [
                    'controller' => 'project',
                    'action' => 'edit',
                    $id
            ]);
    
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
    }
    
    echo $this->Html->tag('span', 
            date('Y-m-d', strtotime($data['Project']['updated'])), 
            [
                    'class' => 'project_date'
            ]);
    
    // 编辑图片
    $purl = $this->Html->url(
            [
                    'controller' => 'project',
                    'action' => 'editpic',
                    $id
            ]);
    if (! empty($data['Image'])) {
        foreach ($data['Image'] as $p) {
            $src = ProjectController::UPLOAD_IMAGE . '/' . $p['filename'];
            echo $this->Html->div('piclist_pic', 
                    $this->Html->image($src, 
                            [
                                    'alt' => $p['filename'],
                                    'onclick' => "mLayerShow('" . $purl . "');"
                            ]));
        }
    }
    
    echo $this->Html->link('编辑图片', '#', 
            [
                    'onclick' => "mLayerShow('" . $curl . "');",
                    'class' => 'submit'
            ]);
} else {
    echo $this->Html->tag('span', $data['Project']['title'], 
            [
                    'class' => 'project_title'
            ]);
    
    echo $this->Html->tag('span', 
            date('Y-m-d', strtotime($data['Project']['updated'])), 
            [
                    'class' => 'project_date'
            ]);
    
    if (! empty($data['Image'])) {
        foreach ($data['Image'] as $p) {
            $url = ProjectController::UPLOAD_IMAGE . '/' . $p['filename'];
            echo $this->Html->div('piclist_pic', 
                    $this->Html->image($url, 
                            [
                                    'alt' => $p['filename'],
                                    'onclick' => "window.open('" . '/img/' .
                                             ProjectController::UPLOAD_IMAGE .
                                             '/' . $p['filename'] . "');"
                            ]));
        }
    }
}

echo '<div class="ele_cnt_txt">';
if (isset($isAdmin) && $isAdmin) {
    if (empty($data['Project']['content'])) {
        echo $this->Html->tag('span', Configure::read('MSG00010001'), 
                [
                        'onclick' => "mLayerShow('" . $curl . "');"
                ]);
    } else {
        echo $this->Html->tag('span', 
                $this->Tag->nl2p($data['Project']['content']), 
                [
                        'onclick' => "mLayerShow('" . $curl . "');"
                ]);
    }
} else {
    if (empty($data['Project']['content'])) {
        echo $this->Html->tag('span', Configure::read('MSG00010001'));
    } else {
        echo $this->Html->tag('span', 
                $this->Tag->nl2p($data['Project']['content']));
    }
}
echo '</div>';

?>
