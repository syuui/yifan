<?php
$page_title = '招贤纳士';

$this->start('sidebar');
echo $this->Element('sidebar/recruit');
$this->end();

$this->start('page_title');
echo $page_title;
$this->end();

$this->start('breadcrumb');
$this->Html->addCrumb($page_title);
echo $this->Html->getCrumbs(' &gt; ', null);
$this->end();

echo $this->Html->link('增加职位', '#', 
        [
                'onclick' => 'mLayerAction(\'' . $this->Html->url(
                        [
                                'controller' => 'recruit',
                                'action' => 'savejob'
                        ]) . '\');',
                'class' => 'addButton'
        ]);

?>
				
<?php
if (empty($data)) {
    echo Configure::read('MSG00010001');
} else {
    // Header
    ?>
<div class="recruit-hd">
	<div class="recruit-hd-title">招聘职位</div>
	<div class="recruit-hd-location">工作地点</div>
	<div class="recruit-hd-number">人数</div>
	<div class="recruit-hd-detail">详情</div>
</div>
<?php
    
    foreach ($data as $d) {
        echo "<div class=\"recruit-list\">";
        
        echo $this->Html->link($d['Recruit']['title'], "#", 
                [
                        'onclick' => "mLayerAction('" . $this->Html->url(
                                [
                                        'controller' => 'recruit',
                                        'action' => 'savejob',
                                        $d['Recruit']['id']
                                ]) . "');",
                        'class' => 'recruit-list-title'
                ]);
        echo $this->Html->div('recruit-list-location', 
                $d['Recruit']['location']);
        echo $this->Html->div('recruit-list-number', $d['Recruit']['number']);
        echo $this->Html->link('详情', "#", 
                [
                        'onclick' => "mLayerAction('" . $this->Html->url(
                                [
                                        'controller' => 'recruit',
                                        'action' => 'savejob',
                                        $d['Recruit']['id']
                                ]) . "');",
                        'class' => 'recruit-list-detail'
                ]);
        echo "</div>";
    }
}
echo $this->Element('pagination');
?>
