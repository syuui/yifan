<script language="javascript">
function switchForm() {
	var sl = $("#PsectorType");
    if( sl.val() == "T" ) {
        $("#PsectorImage").hide();
        $("#PsectorFileDiv").hide();
        
    } else {
        $("#PsectorImage").show();
        $("#PsectorFileDiv").show();
    }
}
</script>
<?php
$this->start('page_title');
echo "编辑文章段落";
$this->end();

$this->start('form_s');
echo $this->Form->create('Psector', 
        [
                'type' => 'file',
                'inputDefaults' => [
                        'label' => false,
                        'legend' => false,
                        'div' => false
                ]
        ]);
$this->end();

$form_input = $this->Form->input('Psector.id', 
        [
                'type' => 'hidden',
                'value' => $data['Psector']['id']
        ]);
$form_input .= $this->Form->input('Psector.project_id', 
        [
                'type' => 'hidden',
                'value' => $data['Psector']['project_id']
        ]);
$form_input .= $this->Form->input('Psector.src', 
        [
                'type' => 'hidden',
                'value' => $data['Psector']['src']
        ]);
$form_input .= $this->Form->input('Psector.seq', 
        [
                'type' => 'input',
                'value' => $data['Psector']['seq'],
                'label' => '序号'
        ]);
$form_input .= $this->Form->input('Psector.type', 
        [
                'type' => 'select',
                'value' => $data['Psector']['type'],
                'options' => [
                        'T' => '文章',
                        'P' => '图片'
                ],
                'onchange' => 'switchForm();',
                'label' => '章节类型'
        ]);
if (! empty($data['Psector']['type']) && $data['Psector']['type'] === 'P') {
    $form_file = $this->Form->input('Psector.file', 
            [
                    'type' => 'file',
                    'div' => [
                            'id' => 'PsectorFileDiv'
                    ]
            ]);
    if (! empty($data['Psector']['src'])) {
        $form_file = $this->Html->image(
                ProjectController::UPLOAD_IMAGE . '/' .
                         $data['Psector']['project_id'] . '/' .
                         $data['Psector']['src'], 
                        [
                                'id' => 'PsectorImage'
                        ]) . $form_file;
    }
} else {
    $form_file = $this->Form->input('Psector.file', 
            [
                    'type' => 'file',
                    'div' => [
                            'id' => 'PsectorFileDiv',
                            'style' => 'display:none;'
                    ]
            ]);
    if (! empty($data['Psector']['src'])) {
        $form_file = $this->Html->image(
                ProjectController::UPLOAD_IMAGE . '/' .
                         $data['Psector']['project_id'] . '/' .
                         $data['Psector']['src'], 
                        [
                                'id' => 'PsectorImage',
                                'style' => 'display: none;'
                        ]) . $form_file;
    }
}

$form_message = $this->Form->input('Psector.message', 
        [
                'value' => $data['Psector']['message']
        ]);

echo $form_input;
echo $form_file;
echo $form_message;

$this->start('buttons');
echo $this->Form->submit('保存', 
        [
                'name' => 'Post.action',
                'class' => 'submit'
        ]);
if (! empty($data['Psector']['id'])) {
    echo $this->Form->submit('删除', 
            [
                    'name' => 'Post.action',
                    'class' => 'reset',
                    'onclick' => 'return confirm(\'真的要删除这个章节吗？\');'
            ]);
}
$this->end();

$this->start('form_e');
echo $this->Form->end();
$this->end();
