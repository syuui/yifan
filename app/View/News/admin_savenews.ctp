<?php
App::uses('NewsModel', 'Model');

$form_s = $this->Form->create('News', 
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
                'News.id' => [
                        'type' => 'hidden',
                        'value' => $data['News']['id']
                ],
                'News.action' => [
                        'type' => 'hidden',
                        'value' => 'E',
                        'id' => 'currentAction'
                ],
                'News.title' => [
                        'value' => $data['News']['title'],
                        'label' => '标题',
                        'div' => true
                ],
                'News.type' => [
                        'type' => 'select',
                        'options' => [
                                'E' => '企业动态',
                                'I' => '行业动态'
                        ],
                        'label' => '分类',
                        'div' => true
                ],
                'News.content' => [
                        'type' => 'textarea',
                        'value' => $data['News']['content'],
                        'label' => '内容',
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
							<h2 class="u-tt"><?php echo isset($data)?'编辑新闻' :'增加新闻';?></h2>
							<span class="lyclose" onclick="removeLayer();">×</span>
						</header>
						<section class="lyct">
							<p><?php   echo $inputs;   ?></p>
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