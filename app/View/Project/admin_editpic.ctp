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
echo $this->Form->input('Image.file', 
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
        echo $this->Form->create('Image', 
                [
                        'inputDefaults' => [
                                'label' => false
                        ]
                ]);
        echo $this->Form->input('Image.id', 
                [
                        'type' => 'hidden',
                        'value' => $p['Image']['id']
                ]);
        echo $this->Form->input('Image.filename', 
                [
                        'type' => 'hidden',
                        'value' => $p['Image']['filename']
                ]);
        $img = '/img/' . ProjectController::UPLOAD_IMAGE . '/' .
                 $p['Image']['filename'];
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