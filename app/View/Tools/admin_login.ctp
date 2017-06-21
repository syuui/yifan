<?php
$title = Configure::read('c_site_title');
?>
<?php echo $this->Html->docType();?>
<html>
<head>
    <?php   echo $this->Element('include'); ?>
    <title><?php echo $title;   ?></title>
<style type="text/css">
.content {
	width: 100%;
	margin-top: 200px;
	text-align: center;
}

.login-form {
	margin: 0px auto;
	border: 1px solid;
	width: 400px;
}

.sitename {
	margin: 30px;
}

.errmsg {
	color: red;
}

.input {
	margin: 30px;
}

.input label {
	width: 100px;
	text-align: left;
	display: inline-block;
}
</style>
</head>
<body>
	<div class="content">
		<div class="login-form">
			<div class="sitename"><?php
echo $this->Html->image(Configure::read('logo_filename'));
if (! empty($error_message)) {
    echo $this->Html->div('errmsg', $error_message);
}
?></div>
<?php

echo $this->Form->create('');
echo $this->Form->input('Login.username', 
        [
                'type' => 'text',
                'label' => '用户名'
        ]);
echo $this->Form->input('Login.password', 
        [
                'type' => 'password',
                'label' => '密码'
        ]);
echo $this->Form->submit('登录', 
        [
                'div' => false,
                'class' => 'submit'
        ]);
echo $this->Form->end();
?>
    	</div>
	</div>

</body>
</html>
