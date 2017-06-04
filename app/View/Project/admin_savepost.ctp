<?php
$form_s = $this->Form->create('Recruit', 
        [
                'inputDefaults' => [
                        'label' => false,
                        'legend' => false,
                        'div' => false
                ]
        ]);
$form_e = $this->Form->end();
$inputs = $this->Form->Inputs(
        [
                'Post.id' => [
                        'type' => 'hidden',
                        'value' => $data['Post']['id']
                ],
                'Post.action' => [
                        'type' => 'hidden',
                        'value' => 'E',
                        'id' => 'currentAction'
                ],
                'Recruit.title' => [
                        'value' => $data['Post']['title'],
                        'label' => '文章名称',
                        'div' => true
                ]
        ], null, 
        [
                'fieldset' => false,
                'legend' => false
        ]);
$buttons = $this->Form->button('确定', 
        [
                'label' => false,
                'div' => false,
                'class' => 'submit',
                'type' => 'button',
                'id' => 'saveItem'
        ]) . $this->Form->button('删除', 
        [
                'label' => false,
                'div' => false,
                'class' => 'reset',
                'type' => 'button',
                'id' => 'deleteItem'
        ]);

echo $form_s;
?>
<div class="m-layer z-show" id="popup_win">
	<table>
		<tbody>
			<tr>
				<td><article class="lywrap">
						<header class="lytt">
							<h2 class="u-tt"><?php echo isset($data)?'编辑文章' :'增加文章';?></h2>
							<span class="lyclose" onclick="removeLayer();">×</span>
						</header>
						<section class="lyct">
							<p><?php   echo $inputs;   ?>
							</p>
						</section>
						<footer class="lybt">
							<div class="lyother">
								<p></p>
							</div>
							<div class="lybtns"><?php   echo $buttons;  ?></div>
						</footer>
					</article></td>
			</tr>
		</tbody>
	</table>
</div>
<?php echo $form_e; ?>