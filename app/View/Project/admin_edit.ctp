<?php
$this->start('sidebar');
echo $this->Element('sidebar/project');
$this->end();

$this->start('form_s');
echo $this->Form->create('Project', 
        [
                'url' => [
                        'controller' => 'project',
                        'action' => 'detail',
                        $id
                ],
                'inputDefaults' => [
                        'label' => false
                ]
        ]);
$this->end();

echo $this->Form->input('Project.id', 
        [
                'type' => 'hidden',
                'value' => $data['Project']['id']
        ]);
echo $this->Form->input('Project.title', 
        [
                'label' => '文章标题',
                'value' => $data['Project']['title'],
                'class' => 'txt_button2_title'
        ]);
echo $this->Form->input('Project.content', 
        [
                'label' => '文章内容',
                'value' => $data['Project']['content'],
                'class' => 'txa_button'
        ]);

$this->start('buttons');
echo $this->Form->submit('保存', 
        [
                'class' => 'submit',
                'div' => false,
                'name' => 'Post.action'
        ]);
echo $this->Form->input('Project.id', 
        [
                'type' => 'hidden',
                'value' => $data['Project']['id']
        ]);
echo $this->Form->submit('删除', 
        [
                'class' => 'reset',
                'name' => 'Post.action',
                'div' => false
        ]);
$this->end();

$this->start('form_e');
echo $this->Form->end();
$this->end();