<?php echo $this->Html->css("product");	?>

<!-- 产品分类（列表） -->
<div class='pdv_class pdv_class_31'>
	<div class='pdv_content'>
		<div class="pdv_border">
			<div class="pdv_rbg">
				<div class="pdv_ttl_l">
					<div class="pdv_ttl_m">产品系列</div>
					<div class="pdv_ttl_r"></div>
				</div>
				<div clas="pdv_cnt">
					<div class="productclass_dolphin">
						<a href="../product/class/?115.html" class="productclass_dolphin">常规玻璃瓶输液</a>
						<a href="../product/class/?116.html" class="productclass_dolphin">常规塑瓶输液</a>
						<a href="../product/class/?74.html" class="productclass_dolphin">固体制剂</a>
						<a href="../product/class/?119.html" class="productclass_dolphin">滴剂</a>
						<a href="../product/class/?134.html" class="productclass_dolphin">口服溶液剂</a>
						<a href="../product/class/?136.html" class="productclass_dolphin">治疗性输液</a>
					</div>
				</div>
			</div>
		</div>
		<div class="pdv_ftr_l"></div>
		<div class="pdv_ftr_r"></div>
	</div>
</div>

<!-- 产品搜索表单 -->
<div class='pdv_class pdv_class_32'>
	<div class='pdv_content'>
		<div class="pdv_border">
			<div class="pdv_rbg">
				<div class="pdv_ttl_l">
					<div class="pdv_ttl_m">产品搜索</div>
					<div class="pdv_ttl_r"></div>
				</div>
				<div class="pdv_cnt">
					<div class="productsearchformzone">
						<form id="#" method="post" action="../product/class/index.php">
							<div class="productsearchform">
								<select name="catid" id="catid" class="box">
									<option value="0">请选择分类</option>
									<option value='74'>固体制剂</option>
									<option value='115'>常规玻璃瓶输液</option>
									<option value='116'>常规塑瓶输液</option>
									<option value='119'>滴剂</option>
									<option value='134'>口服溶液剂</option>
									<option value='136'>治疗性输液</option>
								</select>
							</div>
							<div class="productsearchform">
								<input name="key" type="text" id="productsearchform_key"
									value="" style="width: 153px;" class="inputtext">
							</div>
							<div class="productsearchform2">
								<input name="imageField" id="button" type="image"
									src="../img/search5.gif">
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
		<div class="pdv_ftr_l"></div>
		<div class="pdv_ftr_r"></div>
	</div>
</div>
