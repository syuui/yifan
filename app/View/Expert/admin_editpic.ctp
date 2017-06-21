<?php
$this->start('page_title');
echo isset($picId) ? '修改图片' : '增加图片';
$this->end();

echo $this->Form->create('Variable', 
        [
                'inputDefaults' => [
                        'label' => false
                ],
                'type' => 'file'
        ]);
echo $this->Form->input('Variable.file', 
        [
                'type' => 'file'
        ]);
echo $this->Form->submit('增加图片', 
        [
                'class' => 'submit',
                'name' => 'Post.action'
        ]);
echo $this->Form->end();

if (isset($pics)) {
    foreach ($pics as $p) {
        echo $this->Form->create('Variable', 
                [
                        'inputDefaults' => [
                                'label' => false
                        ]
                ]);
        echo $this->Form->input('Variable.id', 
                [
                        'type' => 'hidden',
                        'id' => 'VariableSelectedId',
                        'value' => $p['Variable']['id']
                ]);
        echo $this->Form->input('Variable.value', 
                [
                        'type' => 'hidden',
                        'value' => $p['Variable']['value']
                ]);
        $img = '/img/' . ExpertController::UPLOAD_IMAGE . '/' .
                 $p['Variable']['value'];
        echo $this->Html->image($img, 
                [
                        'class' => 'piclist-small'
                ]);
        
        echo $this->Form->submit('删除', 
                [
                        'class' => 'reset',
                        'name' => 'Post.action'
                ]);
        echo $this->Form->end();
    }
}