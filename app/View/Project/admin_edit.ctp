<?php
$this->start('sidebar');
echo $this->Element('sidebar/project');
$this->end();

$this->start('form_s');
echo $this->Form->create('Project', 
        [
                'url' => [
                        'controller' => 'project',
                        'action' => 'edit',
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
if (! empty($data['Project']['id'])) {
    echo $this->Form->submit('删除', 
            [
                    'class' => 'reset',
                    'name' => 'Post.action',
                    'div' => false,
                    'onclick' => 'return confirm("真的要删除这篇文章吗？");'
            ]);
}
$this->end();

$this->start('form_e');
echo $this->Form->end();
$this->end();