<?php
$page_title = $data['Recruit']['title'];

$this->start('sidebar');
echo $this->Element('sidebar/recruit');
$this->end();

$this->start('page_title');
echo $page_title;
$this->end();

$this->start('breadcrumb');
$this->Html->addCrumb('职位信息', 
        [
                'controller' => 'recruit',
                'action' => 'index'
        ]);
$this->Html->addCrumb($page_title);
echo $this->Html->getCrumbs(' &gt; ', null);
$this->end();

if (! empty($data)) {
    echo $this->Html->div('jdtitle', $data['Recruit']['title']);
    ?>
<div class="jdline">
	<div class="jdlabel">职位薪资：</div>
	<div class="jddetail"><?php echo $data['Recruit']['salary'];  ?></div>
</div>

<div class="jdline">
	<div class="jdlabel">招聘人数：</div>
	<div class="jddetail"><?php echo $data['Recruit']['number'];    ?></div>
</div>

<div class="jdline">
	<div class="jdlabel">工作地点：</div>
	<div class="jddetail"><?php echo $data['Recruit']['location'];   ?></div>
</div>

<div class="jdline">
	<div class="jdlabel">发布时间：</div>
	<div class="jddetail"><?php echo date('Y-m-d', strtotime($data['Recruit']['created']));  ?></div>
</div>

<div class="jdline">
	<div class="jdtit">职位描述：</div>
	<div class="jdcontent"><?php echo nl2br($data['Recruit']['description']);   ?></div>
</div>

<div class="jdline">
	<div class="jdtit">任职要求：</div>
	<div class="jdcontent"><?php echo nl2br($data['Recruit']['requirement']);   ?></div>
</div>

<?php
} else {
    ?>
<div class="ele_cnt_txt">没有这项职位信息</div>
<?php
}
?>