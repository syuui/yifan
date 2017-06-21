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
                'Recruit.id' => [
                        'type' => 'hidden',
                        'value' => $data['Recruit']['id']
                ],
                'Recruit.title' => [
                        'value' => $data['Recruit']['title'],
                        'label' => '职位名称',
                        'div' => true
                ],
                'Recruit.salary' => [
                        'value' => $data['Recruit']['salary'],
                        'label' => '职位月薪',
                        'div' => true
                ],
                'Recruit.location' => [
                        'value' => $data['Recruit']['location'],
                        'label' => '工作地点',
                        'div' => true
                ],
                'Recruit.number' => [
                        'value' => $data['Recruit']['number'],
                        'label' => '招聘人数',
                        'div' => true
                ],
                'Recruit.description' => [
                        'value' => $data['Recruit']['description'],
                        'label' => '职位描述',
                        'div' => true
                ],
                'Recruit.requirement' => [
                        'value' => $data['Recruit']['requirement'],
                        'label' => '职位要求',
                        'div' => true
                ]
        ], null, 
        [
                'fieldset' => false,
                'legend' => false
        ]);
$buttons = $this->Form->submit('确定', 
        [
                'label' => false,
                'div' => false,
                'class' => 'submit',
                'id' => 'saveItem',
                'name' => 'Post.action'
        ]) . $this->Form->submit('删除', 
        [
                'label' => false,
                'div' => false,
                'class' => 'reset',
                'id' => 'deleteItem',
                'name' => 'Post.action'
        ]);

echo $form_s;
?>
<div class="m-layer z-show" id="popup_win">
	<table>
		<tbody>
			<tr>
				<td><article class="lywrap">
						<header class="lytt">
							<h2 class="u-tt"><?php echo isset($data)?'编辑职位' :'增加职位';?></h2>
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