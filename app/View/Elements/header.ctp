<!-- 网站头 -->
<div id="header">
	<div id="sitename"><?php echo $this->Html->image(Configure::read('logo_filename'));	?></div>
	<div id="navi">
		<ul id="dropmenu">
			<li><?php

echo $this->Html->link('首页', 
        [
                'controller' => 'pages',
                'action' => 'index'
        ]);
?></li>
			<li><?php

echo $this->Html->link('走进朗豪', 
        [
                'controller' => 'company',
                'action' => 'index'
        ]);
?></li>
			<li><?php

echo $this->Html->link('新闻资讯', 
        [
                'controller' => 'news',
                'action' => 'index'
        ]);
?></li>
			<li><?php

echo $this->Html->link('帮扶项目', 
        [
                'controller' => 'project',
                'action' => 'index'
        ]);
?></li>
			<li><?php

echo $this->Html->link('专家风采', 
        [
                'controller' => 'expert',
                'action' => 'index'
        ]);
?></li>
			<li><?php

echo $this->Html->link('招贤纳士', 
        [
                'controller' => 'recruit',
                'action' => 'index'
        ]);
?></li>
			<li><?php

echo $this->Html->link('联系我们', 
        [
                'controller' => 'contactus',
                'action' => 'index'
        ]);
?></li>
                <?php
                if (isset($isAdmin) && $isAdmin) {
                    // 管理员用户
                    ?>
    
			<li><?php
                    
                    echo $this->Html->link('管理工具', 
                            [
                                    'controller' => 'tools',
                                    'action' => 'banner'
                            ]);
                    ?></li>		
			<?php
                }
                ?>
			<li class="menuright"></li>
		</ul>
	</div>
	<div id="banner"><?php echo $this->Html->image(Configure::read('banner_filename'));?></div>
</div>
<!-- /网站头 -->