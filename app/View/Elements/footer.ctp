<?php
$glue = ' | ';
$links[] = $this->Html->link('关于我们', 
        [
                'controller' => 'company',
                'action' => 'index'
        ]);
$links[] = $this->Html->link('联系方式', 
        [
                'controller' => 'company',
                'action' => 'contactus'
        ]);
$links[] = $this->Html->link('信息反馈', 
        [
                'controller' => 'company',
                'action' => 'index'
        ]);
$links[] = $this->Html->link('人才招聘', 
        [
                'controller' => 'recruit',
                'action' => 'index'
        ]);
$links[] = $this->Html->link('友情链接', 
        [
                'controller' => 'company',
                'action' => 'index'
        ]);
$str_links = $glue . implode($glue, $links) . $glue;
?>
<!-- 网站脚 -->
<div id="footer">
	<div class="ele_block">
		<div id="footermenu"><?php echo $str_links;?></div>
		<p>
			Copyright (C) 2017 Lanham Corp., Ltd. All rights reserved<br />朗豪拓达（北京）科技发展有限公司
			版权所有
		</p>
	</div>
</div>
<!-- /网站脚 -->