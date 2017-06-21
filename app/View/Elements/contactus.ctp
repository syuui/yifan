<?php
App::uses('ContactusController', 'Controller');
?>
<!-- 联系我们 -->
<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m">联系我们</div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">
				<div class="culine">
					<div class="culabel"><?php echo $this->Html->image('address.png',['class'=>'adr_icon']);   ?></div>
					<div class="cudetail"><?php echo Configure::read(ContactusController::CONTACTUS_ADDRESS_NAME);  ?></div>
				</div>
				<div class="culine">
					<div class="culabel"><?php echo $this->Html->image('tel.png',['class'=>'adr_icon']);   ?></div>
					<div class="cudetail"><?php echo Configure::read(ContactusController::CONTACTUS_TEL_NAME);  ?></div>
				</div>
				<div class="culine">
					<div class="culabel"><?php echo $this->Html->image('mobile.png',['class'=>'adr_icon']);   ?></div>
					<div class="cudetail"><?php echo Configure::read(ContactusController::CONTACTUS_MOBILE_NAME);  ?></div>
				</div>
				<div class="culine">
					<div class="culabel"><?php echo $this->Html->image('fax.png',['class'=>'adr_icon']);   ?></div>
					<div class="cudetail"><?php echo Configure::read(ContactusController::CONTACTUS_FAX_NAME);   ?></div>
				</div>
				<div class="culine">
					<div class="culabel"><?php echo $this->Html->image('mail.png',['class'=>'adr_icon']);   ?></div>
					<div class="cudetail"><?php echo Configure::read(ContactusController::CONTACTUS_MAIL_NAME);  ?></div>
				</div>
			</div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>
<div class="hotline"><?php echo $this->Html->image(Configure::read('hotline_filename'));    ?></div>
<!-- /联系我们 -->