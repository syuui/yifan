<?php
App::uses('CompanyController', 'Controller');

echo $this->Form->create('Variable', 
        array(
                'inputDefaults' => array(
                        'label' => false,
                        'div' => false
                )
        ));
?>
<div class="m-layer z-show" id="popup_win">
	<table>
		<tbody>
			<tr>
				<td><article class="lywrap">
						<header class="lytt">
							<h2 class="u-tt"><?php echo isset($data)?'修改图片' :'增加图片';?></h2>
							<span class="lyclose" onclick="removeLayer();">×</span>
						</header>
						<section class="lyct">
							<p>
<?php
if (! isset($data)) {
    $data = [
            'Variable' => [
                    'id' => '',
                    'name' => CompanyController::LANHAM_PICTURE,
                    'value' => ''
            ]
    ];
}

echo $this->Form->Inputs(
        [
                'Variable.id' => [
                        'type' => 'hidden',
                        'value' => $data['Variable']['id']
                ],
                'Variable.name' => [
                        'type' => 'hidden',
                        'value' => $data['Variable']['name']
                ],
                'Variable.value' => [
                        'type' => 'text',
                        'value' => $data['Variable']['value'],
                        'label' => '图片文件名'
                ],
                'action' => [
                        'type' => 'hidden',
                        'value' => 'E',
                        'id' => 'currentAction'
                ]
        ], null, [
                'fieldset' => false
        ]);
?>							
							</p>
						</section>
						<footer class="lybt">
							<div class="lyother">
								<p></p>
							</div>
							<div class="lybtns">
<?php
$url = $this->Html->url(
        [
                'controller' => 'company',
                'action' => 'admin_lanham_editpic'
        ]);
echo $this->Form->button('确定', 
        [
                'label' => false,
                'div' => false,
                'class' => 'submit',
                'type' => 'button',
                'id' => 'saveItem'
        ]);
if (! empty($data['Variable']['id'])) {
    echo $this->Form->button('删除', 
            [
                    'label' => false,
                    'div' => false,
                    'class' => 'reset',
                    'type' => 'button',
                    'id' => 'deleteItem'
            ]);
}
?>
							</div>
						</footer>
					</article></td>
			</tr>
		</tbody>
	</table>
</div>
<?php $this->Form->end();?>