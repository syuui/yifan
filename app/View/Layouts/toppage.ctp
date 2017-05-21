<?php
$title = Configure::read('c_site_title');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset();	?>
	<title><?php echo $title;	?></title>
<?php
echo $this->Html->css('general');
?>
</head>
<body>
	<div id="contain">
		<?php echo $this->Element('header');	?>
		<div id="contect">
			<!-- left -->
			<div id="left">

				<!-- 产品系列 -->
				<div class="ele_block">
					<div class="ele_bdr_l">
						<div class="ele_bdr_r">
							<div class="ele_ttl_l">
								<div class="ele_ttl_m">产品系列</div>
								<div class="ele_ttl_r"></div>
							</div>
							<div class="ele_cnt">
								<ul class="list_style_1">
									<li><a href="#">常规玻璃瓶输液</a></li>
									<li><a href="#">常规塑瓶输液</a></li>
									<li><a href="#">固体制剂</a></li>
									<li><a href="#">滴剂</a></li>
									<li><a href="#">口服溶液剂</a></li>
									<li><a href="#">治疗性输液</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="ele_ftr_l"></div>
					<div class="ele_ftr_r"></div>
				</div>
				<!-- /产品系列 -->

				<!-- 联系我们 -->
				<div class="ele_block">
					<div class="ele_bdr_l">
						<div class="ele_bdr_r">
							<div class="ele_ttl_l">
								<div class="ele_ttl_m">联系我们</div>
								<div class="ele_ttl_r"></div>
							</div>
							<div class="ele_cnt">
								<div class="ele_cnt_txt">
									地址：杭州市莫山桥南路868号<br> 电话：0571-98765432<br> 传真：0571-98765432<br>
									传真：0571-98765430<br> 邮箱：boss@mail.com<br>邮编：312345
								</div>
							</div>
						</div>
					</div>
					<div class="ele_ftr_l"></div>
					<div class="ele_ftr_r"></div>
				</div>
				<div class="hotline"><?php echo $this->Html->image('hotline.png')?></div>
				<!-- /联系我们 -->
			</div>
			<!-- /left -->

			<!-- middle -->
			<div id="middle">
				<!-- 公司简介 -->
				<div class="ele_block">
					<div class="ele_bdr_l">
						<div class="ele_bdr_r">
							<div class="ele_ttl_l">
								<div class="ele_ttl_m">公司简介</div>
								<div class="ele_ttl_r"></div>
							</div>
							<div class="ele_cnt">
								<div class="ele_cnt_txt">&nbsp;&nbsp;
									杭州某某医药有限公司拥有齐全的经营门类和品种，具备优质完善的经营网络、专业特色的服务内涵、广泛认同的企业商誉，
									经营业绩一直位居全国同行业前列。处于繁华的国道之畔，占地面积三千六百平方米，建筑面积五千五百平方米。
									公司不断探索商业模式转型，加速创新突破发展，销售规模得以较快扩大。
									采用国内先进设备，最新引进的现代化的生产流水线，一直本着质量第一，信誉至上的经营理念，使得我们的产品得到了广大顾客的一致好评，
									产品销往全国各地，企业也得到迅速的发展。</div>
							</div>
						</div>
					</div>
					<div class="ele_ftr_l"></div>
					<div class="ele_ftr_r"></div>
				</div>
				<!-- /公司简介 -->


				<!-- 产品推荐 -->
				<div class="ele_block">
					<div class="ele_bdr_l">
						<div class="ele_bdr_r">
							<div class="ele_ttl_l">
								<div class="ele_ttl_m">产品推荐</div>
								<div class="ele_ttl_r"></div>
							</div>
							<div class="ele_cnt">
								<div class="productlist_index">
									<div class="productlist_index_pic">
										<a href="#" target="_blank"><img src="../img/product_001.jpg"></a>
									</div>
									<div class="productlist_index_title">
										<a href="#" target="_blank" class="title">药品系列</a>
									</div>
								</div>
								<div class="productlist_index">
									<div class="productlist_index_pic">
										<a href="#" target="_blank"><img src="../img/product_001.jpg"></a>
									</div>
									<div class="productlist_index_title">
										<a href="#" target="_blank" class="title">药品系列</a>
									</div>
								</div>
								<div class="productlist_index">
									<div class="productlist_index_pic">
										<a href="#" target="_blank"><img src="../img/product_001.jpg"></a>
									</div>
									<div class="productlist_index_title">
										<a href="#" target="_blank" class="title">药品系列</a>
									</div>
								</div>
								<div class="productlist_index">
									<div class="productlist_index_pic">
										<a href="#" target="_blank"><img src="../img/product_001.jpg"></a>
									</div>
									<div class="productlist_index_title">
										<a href="#" target="_blank" class="title">药品系列</a>
									</div>
								</div>
								<div class="productlist_index">
									<div class="productlist_index_pic">
										<a href="#" target="_blank"><img src="../img/product_001.jpg"></a>
									</div>
									<div class="productlist_index_title">
										<a href="#" target="_blank" class="title">药品系列</a>
									</div>
								</div>
								<div class="productlist_index">
									<div class="productlist_index_pic">
										<a href="#" target="_blank"><img src="../img/product_001.jpg"></a>
									</div>
									<div class="productlist_index_title">
										<a href="#" target="_blank" class="title">药品系列</a>
									</div>
								</div>
								<div class="productlist_index">
									<div class="productlist_index_pic">
										<a href="#" target="_blank"><img src="../img/product_001.jpg"></a>
									</div>
									<div class="productlist_index_title">
										<a href="#" target="_blank" class="title">药品系列</a>
									</div>
								</div>
								<div class="productlist_index">
									<div class="productlist_index_pic">
										<a href="#" target="_blank"><img src="../img/product_001.jpg"></a>
									</div>
									<div class="productlist_index_title">
										<a href="#" target="_blank" class="title">药品系列</a>
									</div>
								</div>
								<div class="productlist_index">
									<div class="productlist_index_pic">
										<a href="#" target="_blank"><img src="../img/product_001.jpg"></a>
									</div>
									<div class="productlist_index_title">
										<a href="#" target="_blank" class="title">药品系列</a>
									</div>
								</div>




								<div class="clearfloat"></div>
							</div>
						</div>
					</div>
					<div class="ele_ftr_l"></div>
					<div class="ele_ftr_r"></div>
				</div>
				<!-- /产品推荐 -->
			</div>
			<!-- /middle -->

			<!-- right -->
			<div id="right">
				<!-- 最新动态 -->
				<div class="ele_block">
					<div class="ele_bdr_l">
						<div class="ele_bdr_r">
							<div class="ele_ttl_l">
								<div class="ele_ttl_m">公司简介</div>
								<div class="ele_ttl_r"></div>
							</div>
							<div class="ele_cnt">
								<ul class="list_style_2">
									<li><a href="news/html/?390.html">公司顺利通过食品最高质量认</a></li>
									<li><a href="news/html/?346.html">全面实施ISO9000国际质量管</a></li>
									<li><a href="news/html/?339.html">全面国际质量管理和质量保证</a></li>
									<li><a href="news/html/?338.html">十佳员工无锡两日游</a></li>
									<li><a href="news/html/?336.html">董事长致新员工的一封信</a></li>
									<li><a href="news/html/?335.html">公司开展操技能大赛</a></li>
									<li><a href="news/html/?320.html">全面实施ISO9000国际质量管</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="ele_ftr_l"></div>
					<div class="ele_ftr_r"></div>
				</div>
				<!-- 最新动态 -->

				<!-- 医药常识 -->
				<div class="ele_block">
					<div class="ele_bdr_l">
						<div class="ele_bdr_r">
							<div class="ele_ttl_l">
								<div class="ele_ttl_m">公司简介</div>
								<div class="ele_ttl_r"></div>
							</div>
							<div class="ele_cnt">
								<ul class="list_style_2">
									<li><a href="news/html/?389.html">容易成瘾药品要注意安全使用</a></li>
									<li><a href="news/html/?388.html">喝豆浆对药物影响</a></li>
									<li><a href="news/html/?387.html">牛奶与补药不可同服</a></li>
									<li><a href="news/html/?386.html">可口可乐和咖啡对药物影响</a></li>
									<li><a href="news/html/?385.html">消除农药残余六法</a></li>
									<li><a href="news/html/?377.html">感冒的分类及中成药选用</a></li>
									<li><a href="news/html/?376.html">运动营养食品行业进入快速发</a></li>
									<li><a href="news/html/?366.html">抗菌药不要自行购买使用</a></li>
									<li><a href="news/html/?358.html">学生健康成长怎么补钙是关键</a></li>
									<li><a href="news/html/?337.html">服药后 半小时内不要抽烟</a></li>
									<li><a href="news/html/?321.html">5类药品不宜长时间保存</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="ele_ftr_l"></div>
					<div class="ele_ftr_r"></div>
				</div>
				<!-- /医药常识 -->

			</div>
			<!-- /right -->
			<div class="clearfloat"></div>
		</div>

		<?php echo $this->Element('footer');	?>
	</div>
</body>
</html>
