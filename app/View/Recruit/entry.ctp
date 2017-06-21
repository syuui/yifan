<?php
$page_title = '在线提交';

$this->start('sidebar');
echo $this->Element('sidebar/recruit');
$this->end();

$this->start('page_title');
echo $page_title;
$this->end();

$this->start('breadcrumb');
$this->Html->addCrumb('招贤纳士', 
        [
                'controller' => 'recruit',
                'action' => 'index'
        ]);
$this->Html->addCrumb($page_title);
$this->end();

?>
<div class="ele_cnt_txt">
	<p>多谢您一直以来对我公司的关注。</p>
	<p>
		请将简历邮送至 <U><?php echo $this->Html->link( Configure::read('recruit_mail'), "mailto:". Configure::read('recruit_mail'));  ?></U>。
	</p>
	<p>我们将会在一周之内给您答复。</p>
</div>
