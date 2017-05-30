<div class="pic_line">
<?php
echo $this->Form->create(
        array(
                'inputDefaults' => array(
                        'label' => false,
                        'div' => false
                ),
                "type" => "POST",
                "onsubmit" => ""
        ));
echo $this->Form->inputs(
        array(
                'Uploaditem.id' => array(
                        'type' => 'hidden',
                        'value' => $d['Uploaditem']['id'],
                        'div' => false
                )
        ), null, array(
                'fieldset' => false
        ));

echo $this->Html->image($d['Uploaditem']['folder'] . '/' . $d['Uploaditem']['filename'], 
        array(
                'class' => 'pic_line_img',
                'alt' => nl2br(trim($d['Uploaditem']['description']))
        ));
echo $this->Html->tag('span', nl2br($d['Uploaditem']['description']), 
        array(
                'class' => 'pic_line_txt'
        ));
?>
<div class="pic_line_button">
<?php
$action = $this->Html->url(
        array(
                'controller' => 'tools',
                'action' => 'editpic',
                $d['Uploaditem']['id']
        ));
echo $this->Form->button('编辑', 
        array(
                'class' => 'submit',
                'div' => false,
                'onclick' => "location.href='$action';",
                'type' => 'button'
        ));

?>
</div>
<?php echo $this->Form->end();?>
</div>