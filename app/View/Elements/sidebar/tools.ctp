
<!-- 管理工具 -->
<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m">管理工具</div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">


				<fieldset>
					<legend>上传工具</legend>
					<ul class="list_style_2">
						<li><?php echo $this->Html->link('管理图片',['controller'=>'tools','action'=>'uploadpic']);	?></li>
					</ul>
				</fieldset>

				<fieldset>
					<legend>共通设置</legend>
					<ul class="list_style_2">
						<li><?php echo $this->Html->link('网页横幅', ['controller'=>'tools','action'=>'banner']);?></li>
						<li><?php echo $this->Html->link('站名LOGO', ['controller'=>'tools','action'=>'banner','L']);?></li>
					</ul>

				</fieldset>
			</div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>
<!-- /管理工具 -->
