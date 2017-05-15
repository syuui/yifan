<?php
$title = Configure::read('c_site_title');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset();	?>
	<title><?php echo $title;	?></title>
<?php
echo $this->Html->css('common');
echo $this->Html->css('navi');
echo $this->Html->css('toppage');
// echo $this->Html->css('product');
// echo $this->Html->css('form');
// echo $this->Html->css('newslist');
// echo $this->Html->css('bottommenu');
// echo $this->Html->css('search');
?>
</head>
<body>
	<div id='contain'>
		<!-- LOGO -->
		<div id='e_logo'>
			<a href="#"><?php echo $this->Html->image('logo.png');	?></a>
		</div>
		<!-- //LOGO -->

		<!-- 下拉菜单 -->
		<div id="e_navi">
			<ul id="dropmenu">
				<li><a href="index.php">网站首页</a></li>
				<li><a href="page/html/company.php">公司概况</a></li>
				<li><a href="product/class/">产品中心</a></li>
				<li><a href="news/class/">新闻动态</a></li>
				<li><a href="page/quality/goal.php">质量体系</a></li>
				<li><a href="job/index.php">人才招聘</a></li>
				<li><a href="page/html/display.php">企业风采</a></li>
				<li><a href="page/contact/contact.php">联系我们</a></li>
			</ul>
			<!-- slide -->
			<a href="#"><?php echo $this->Html->image('slide.jpg', array('class'=>'slide'))?></a>
		</div>
		<!-- Content -->
		<div id='content'>
			<!-- 空白边框 -->
			<div id="prd_01" class="prd_blk">
				<div class="productclass_dolphin">
					<a href="product/class/?115.html" target="_self"
						class="productclass_dolphin">常规玻璃瓶输液</a> <a
						href="product/class/?116.html" target="_self"
						class="productclass_dolphin">常规塑瓶输液</a> <a
						href="product/class/?74.html" target="_self"
						class="productclass_dolphin">固体制剂</a> <a
						href="product/class/?119.html" target="_self"
						class="productclass_dolphin">滴剂</a> <a
						href="product/class/?134.html" target="_self"
						class="productclass_dolphin">口服溶液剂</a> <a
						href="product/class/?136.html" target="_self"
						class="productclass_dolphin">治疗性输液</a>

				</div>

			</div>





			<div id='pdv_13910' class='pdv_class' title='产品推荐'
				style='width: 480px; height: 345px; top: 266px; left: 259px; z-index: 1'>
				<div id='spdv_13910' class='pdv_content'
					style='overflow: hidden; width: 100%; height: 100%'>
					<div class="pdv_border"
						style="border: 0px; height: 100%; padding: 0; margin: 0; background: url(../img/lbg.png) 0 0 repeat-y">
						<div
							style="height: 100%; background: url(../img/rbg.png) right repeat-y; padding-bottom: 15px;">
							<div
								style="height: 38px; border: 0px; padding: 0; margin: 0; background: url(../img/title.png) 0 0 no-repeat">
								<div
									style="float: left; font: 12px/31px Simsun; color: #fff; padding-left: 40px;">产品推荐</div>
								<div
									style="float: right; width: 12px; height: 38px; background: url(../img/title.png) -988px 0 no-repeat"></div>
							</div>
							<div style="margin: 0px; padding: 0px;">&nbsp;</div>
						</div>
					</div>
					<div
						style="margin-top: -16px; height: 16px; line-height: 16px; background: url(../img/title.png) 0px -366px no-repeat">&nbsp;</div>
					<div
						style="float: right; margin-top: -16px; line-height: 16px; width: 12px; height: 16px; background: url(../img/title.png) -988px -366px no-repeat">&nbsp;</div>

				</div>
			</div>

			<!-- 产品分类（列表） -->
			<div id='pdv_14825' class='pdv_class' title='产品系列'
				style='width: 224px; height: 300px; top: 0px; left: 11px; z-index: 9'>
				<div id='spdv_14825' class='pdv_content'
					style='overflow: hidden; width: 100%; height: 100%'>
					<div class="pdv_border"
						style="border: 0px; height: 100%; padding: 0; margin: 0; background: url(../img/lbg.png) 0 0 repeat-y">
						<div
							style="height: 100%; background: url(../img/rbg.png) right repeat-y; padding-bottom: 15px;">
							<div
								style="height: 38px; border: 0px; padding: 0; margin: 0; background: url(../img/title.png) 0 0 no-repeat">
								<div
									style="float: left; font: 12px/31px Simsun; color: #fff; padding-left: 40px;">产品系列</div>
								<div
									style="float: right; width: 12px; height: 38px; background: url(../img/title.png) -988px 0 no-repeat"></div>
							</div>
							<div style="margin: 0px; padding: 0px;">
								<div class="productclass_dolphin">


									<a href="product/class/?115.html" target="_self"
										class="productclass_dolphin">常规玻璃瓶输液</a> <a
										href="product/class/?116.html" target="_self"
										class="productclass_dolphin">常规塑瓶输液</a> <a
										href="product/class/?74.html" target="_self"
										class="productclass_dolphin">固体制剂</a> <a
										href="product/class/?119.html" target="_self"
										class="productclass_dolphin">滴剂</a> <a
										href="product/class/?134.html" target="_self"
										class="productclass_dolphin">口服溶液剂</a> <a
										href="product/class/?136.html" target="_self"
										class="productclass_dolphin">治疗性输液</a>

								</div>

							</div>
						</div>
					</div>
					<div
						style="margin-top: -16px; height: 16px; line-height: 16px; background: url(../img/title.png) 0px -366px no-repeat">&nbsp;</div>
					<div
						style="float: right; margin-top: -16px; line-height: 16px; width: 12px; height: 16px; background: url(../img/title.png) -988px -366px no-repeat">&nbsp;</div>

				</div>
			</div>


			<div id='pdv_12539' class='pdv_class' title='公司简介'
				style='width: 480px; height: 242px; top: 0px; left: 259px; z-index: 7'>
				<div id='spdv_12539' class='pdv_content'
					style='overflow: hidden; width: 100%; height: 100%'>
					<div class="pdv_border"
						style="border: 0px; height: 100%; padding: 0; margin: 0; background: url(../img/lbg.png) 0 0 repeat-y">
						<div
							style="height: 100%; background: url(../img/rbg.png) right repeat-y; padding-bottom: 15px;">
							<div
								style="height: 38px; border: 0px; padding: 0; margin: 0; background: url(../img/title.png) 0 0 no-repeat">
								<div
									style="float: left; font: 12px/31px Simsun; color: #fff; padding-left: 40px;">公司简介</div>
								<div
									style="float: right; width: 12px; height: 38px; background: url(../img/title.png) -988px 0 no-repeat"></div>
							</div>
							<div style="margin: 0px; padding: 0px;">



								<div
									style="PADDING-BOTTOM: 5px; PADDING-LEFT: 30px; PADDING-RIGHT: 30px; PADDING-TOP: 12px">
									<font
										style="LINE-HEIGHT: 22px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; COLOR: #303030; FONT-SIZE: 12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;杭州某某医药有限公司拥有齐全的经营门类和品种，具备优质完善的经营网络、专业特色的服务内涵、广泛认同的企业商誉，经营业绩一直位居全国同行业前列。处于繁华的国道之畔，占地面积三千六百平方米，建筑面积五千五百平方米。公司不断探索商业模式转型，加速创新突破发展，销售规模得以较快扩大。采用国内先进设备，最新引进的现代化的生产流水线，一直本着质量第一，信誉至上的经营理念，使得我们的产品得到了广大顾客的一致好评，产品销往全国各地，企业也得到迅速的发展。</font>
								</div>









							</div>
						</div>
					</div>
					<div
						style="margin-top: -16px; height: 16px; line-height: 16px; background: url(../img/title.png) 0px -366px no-repeat">&nbsp;</div>
					<div
						style="float: right; margin-top: -16px; line-height: 16px; width: 12px; height: 16px; background: url(../img/title.png) -988px -366px no-repeat">&nbsp;</div>

				</div>
			</div>

			<!-- 自选产品列表 -->

			<div id='pdv_10809' class='pdv_class' title=''
				style='width: 452px; height: 274px; top: 326px; left: 281px; z-index: 8'>
				<div id='spdv_10809' class='pdv_content'
					style='overflow: hidden; width: 100%; height: 100%'>
					<div class="pdv_border"
						style="margin: 0; padding: 0; height: 100%; border: 0px solid; background:;">
						<div
							style="height: 25px; margin: 1px; display: none; background:;">
							<div
								style="float: left; margin-left: 12px; line-height: 25px; font-weight: bold; color:">

							</div>
							<div style="float: right; margin-right: 10px; display: inline">
								<a href="product/class" style="line-height: 25px; color:">更多</a>
							</div>
						</div>
						<div style="padding: 0px">

							<div class="productlist_index">
								<div class="fang" style="width: 127px; height: 94px">
									<div class="picFit" style="width: 127px; height: 94px">
										<a href="product/html/?77.html" target="_blank">
										<?php echo $this->Html->image('product_001.jpg',array('style'=>'width:127px;height:94px;border:none;'));	?>
										</a>
									</div>
								</div>
								<div class="title">
									<a href="product/html/?77.html" target="_blank" class="title">药品系列</a>
								</div>
							</div>
							<div class="productlist_index">
								<div class="fang" style="width: 127px; height: 94px">
									<div class="picFit" style="width: 127px; height: 94px">
										<a href="product/html/?77.html" target="_blank">
										<?php echo $this->Html->image('product_001.jpg',array('style'=>'width:127px;height:94px;border:none;'));	?>
										</a>
									</div>
								</div>
								<div class="title">
									<a href="product/html/?77.html" target="_blank" class="title">药品系列</a>
								</div>
							</div>
							<div class="productlist_index">
								<div class="fang" style="width: 127px; height: 94px">
									<div class="picFit" style="width: 127px; height: 94px">
										<a href="product/html/?77.html" target="_blank">
										<?php echo $this->Html->image('product_001.jpg',array('style'=>'width:127px;height:94px;border:none;'));	?>
										</a>
									</div>
								</div>
								<div class="title">
									<a href="product/html/?77.html" target="_blank" class="title">药品系列</a>
								</div>
							</div>
							<div class="productlist_index">
								<div class="fang" style="width: 127px; height: 94px">
									<div class="picFit" style="width: 127px; height: 94px">
										<a href="product/html/?77.html" target="_blank">
										<?php echo $this->Html->image('product_001.jpg',array('style'=>'width:127px;height:94px;border:none;'));	?>
										</a>
									</div>
								</div>
								<div class="title">
									<a href="product/html/?77.html" target="_blank" class="title">药品系列</a>
								</div>
							</div>
							<div class="productlist_index">
								<div class="fang" style="width: 127px; height: 94px">
									<div class="picFit" style="width: 127px; height: 94px">
										<a href="product/html/?77.html" target="_blank">
										<?php echo $this->Html->image('product_001.jpg',array('style'=>'width:127px;height:94px;border:none;'));	?>
										</a>
									</div>
								</div>
								<div class="title">
									<a href="product/html/?77.html" target="_blank" class="title">药品系列</a>
								</div>
							</div>
							<div class="productlist_index">
								<div class="fang" style="width: 127px; height: 94px">
									<div class="picFit" style="width: 127px; height: 94px">
										<a href="product/html/?77.html" target="_blank">
										<?php echo $this->Html->image('product_001.jpg',array('style'=>'width:127px;height:94px;border:none;'));	?>
										</a>
									</div>
								</div>
								<div class="title">
									<a href="product/html/?77.html" target="_blank" class="title">药品系列</a>
								</div>
							</div>

						</div>
					</div>

				</div>
			</div>



			<!-- 文章列表 -->

			<div id='pdv_14827' class='pdv_class' title='最新动态'
				style='width: 224px; height: 241px; top: 0px; left: 767px; z-index: 10'>
				<div id='spdv_14827' class='pdv_content'
					style='overflow: hidden; width: 100%; height: 100%'>
					<div class="pdv_border"
						style="border: 0px; height: 100%; padding: 0; margin: 0; background: url(../img/lbg.png) 0 0 repeat-y">
						<div
							style="height: 100%; background: url(../img/rbg.png) right repeat-y; padding-bottom: 15px;">
							<div
								style="height: 38px; border: 0px; padding: 0; margin: 0; background: url(../img/title.png) 0 0 no-repeat">
								<div
									style="float: left; font: 12px/31px Simsun; color: #fff; padding-left: 40px;">最新动态</div>
								<div
									style="float: right; width: 12px; height: 38px; background: url(../img/title.png) -988px 0 no-repeat"></div>
							</div>
							<div style="margin: 0px; padding: 0px;">

								<ul class="newslist">

									<li class="newslist"><a href="news/html/?390.html"
										target="_self" class="newslist">公司顺利通过食品最高质量认</a></li>

									<li class="newslist"><a href="news/html/?346.html"
										target="_self" class="newslist">全面实施ISO9000国际质量管</a></li>

									<li class="newslist"><a href="news/html/?339.html"
										target="_self" class="newslist">全面国际质量管理和质量保证</a></li>

									<li class="newslist"><a href="news/html/?338.html"
										target="_self" class="newslist">十佳员工无锡两日游</a></li>

									<li class="newslist"><a href="news/html/?336.html"
										target="_self" class="newslist">董事长致新员工的一封信</a></li>

									<li class="newslist"><a href="news/html/?335.html"
										target="_self" class="newslist">公司开展操技能大赛</a></li>

									<li class="newslist"><a href="news/html/?320.html"
										target="_self" class="newslist">全面实施ISO9000国际质量管</a></li>

								</ul>

							</div>
						</div>
					</div>
					<div
						style="margin-top: -16px; height: 16px; line-height: 16px; background: url(../img/title.png) 0px -366px no-repeat">&nbsp;</div>
					<div
						style="float: right; margin-top: -16px; line-height: 16px; width: 12px; height: 16px; background: url(../img/title.png) -988px -366px no-repeat">&nbsp;</div>

				</div>
			</div>

			<!-- HTML编辑区 -->

			<div id='pdv_14826' class='pdv_class' title='联系我们'
				style='width: 224px; height: 204px; top: 317px; left: 11px; z-index: 12'>
				<div id='spdv_14826' class='pdv_content'
					style='overflow: visible; width: 100%;'>
					<div class="pdv_border"
						style="border: 0px; height: 100%; padding: 0; margin: 0; background: url(../img/lbg.png) 0 0 repeat-y">
						<div
							style="height: 100%; background: url(../img/rbg.png) right repeat-y; padding-bottom: 15px;">
							<div
								style="height: 38px; border: 0px; padding: 0; margin: 0; background: url(../img/title.png) 0 0 no-repeat">
								<div
									style="float: left; font: 12px/31px Simsun; color: #fff; padding-left: 40px;">联系我们</div>
								<div
									style="float: right; width: 12px; height: 38px; background: url(../img/title.png) -988px 0 no-repeat"></div>
							</div>
							<div style="margin: 0px; padding: 0px;">
								<div
									style="PADDING-BOTTOM: 25px; PADDING-LEFT: 26px; PADDING-RIGHT: 20px; FONT: 12px/18px simsun; COLOR: #464646; PADDING-TOP: 18px">
									地址：杭州市莫山桥南路868号<br />电话：0571-98765432<br />传真：0571-98765432<br />传真：0571-98765430<br />邮箱：boss@mail.com<br />邮编：312345
								</div>
							</div>
						</div>
					</div>
					<div
						style="margin-top: -16px; height: 16px; line-height: 16px; background: url(../img/title.png) 0px -366px no-repeat">&nbsp;</div>
					<div
						style="float: right; margin-top: -16px; line-height: 16px; width: 12px; height: 16px; background: url(../img/title.png) -988px -366px no-repeat">&nbsp;</div>

				</div>
			</div>

			<!-- 文章列表 -->

			<div id='pdv_17183' class='pdv_class' title='医药常识'
				style='width: 224px; height: 345px; top: 266px; left: 767px; z-index: 13'>
				<div id='spdv_17183' class='pdv_content'
					style='overflow: hidden; width: 100%; height: 100%'>
					<div class="pdv_border"
						style="border: 0px; height: 100%; padding: 0; margin: 0; background: url(../img/lbg.png) 0 0 repeat-y">
						<div
							style="height: 100%; background: url(../img/rbg.png) right repeat-y; padding-bottom: 15px;">
							<div
								style="height: 38px; border: 0px; padding: 0; margin: 0; background: url(../img/title.png) 0 0 no-repeat">
								<div
									style="float: left; font: 12px/31px Simsun; color: #fff; padding-left: 40px;">医药常识</div>
								<div
									style="float: right; width: 12px; height: 38px; background: url(../img/title.png) -988px 0 no-repeat"></div>
							</div>
							<div style="margin: 0px; padding: 0px;">

								<ul class="newslist">

									<li class="newslist"><a href="news/html/?389.html"
										target="_self" class="newslist">容易成瘾药品要注意安全使用</a></li>

									<li class="newslist"><a href="news/html/?388.html"
										target="_self" class="newslist">喝豆浆对药物影响</a></li>

									<li class="newslist"><a href="news/html/?387.html"
										target="_self" class="newslist">牛奶与补药不可同服</a></li>

									<li class="newslist"><a href="news/html/?386.html"
										target="_self" class="newslist">可口可乐和咖啡对药物影响</a></li>

									<li class="newslist"><a href="news/html/?385.html"
										target="_self" class="newslist">消除农药残余六法</a></li>

									<li class="newslist"><a href="news/html/?377.html"
										target="_self" class="newslist">感冒的分类及中成药选用</a></li>

									<li class="newslist"><a href="news/html/?376.html"
										target="_self" class="newslist">运动营养食品行业进入快速发</a></li>

									<li class="newslist"><a href="news/html/?366.html"
										target="_self" class="newslist">抗菌药不要自行购买使用</a></li>

									<li class="newslist"><a href="news/html/?358.html"
										target="_self" class="newslist">学生健康成长怎么补钙是关键</a></li>

									<li class="newslist"><a href="news/html/?337.html"
										target="_self" class="newslist">服药后 半小时内不要抽烟</a></li>

									<li class="newslist"><a href="news/html/?321.html"
										target="_self" class="newslist">5类药品不宜长时间保存</a></li>

								</ul>

							</div>
						</div>
					</div>
					<div
						style="margin-top: -16px; height: 16px; line-height: 16px; background: url(../img/title.png) 0px -366px no-repeat">&nbsp;</div>
					<div
						style="float: right; margin-top: -16px; line-height: 16px; width: 12px; height: 16px; background: url(../img/title.png) -988px -366px no-repeat">&nbsp;</div>

				</div>
			</div>

			<!-- 图片/FLASH -->

			<div id='pdv_17801' class='pdv_class' title=''
				style='width: 210px; height: 84px; top: 531px; left: 18px; z-index: 17'>
				<div id='spdv_17801' class='pdv_content'
					style='overflow: hidden; width: 100%; height: 100%'>
					<div class="pdv_border"
						style="margin: 0; padding: 0; height: 100%; border: 0px solid; background:;">
						<div
							style="height: 25px; margin: 1px; display: none; background:;">
							<div
								style="float: left; margin-left: 12px; line-height: 25px; font-weight: bold; color:">

							</div>
							<div style="float: right; margin-right: 10px; display: none">
								<a href="-1" style="line-height: 25px; color:">更多</a>
							</div>
						</div>
						<div style="padding: 0px">

					<?php echo $this->Html->image('hotline.png',array('border'=>'0','width'=>'100%'))?>

						</div>
					</div>

				</div>
			</div>
		</div>
		<div id='bottom'
			style='width: 1002px; height: 210px; background: url(effect/source/bg/cbg.png)'>


			<!-- 图片/FLASH -->

			<div id='pdv_13914' class='pdv_class' title=''
				style='width: 1002px; height: 178px; top: 30px; left: 0px; z-index: 4'>
				<div id='spdv_13914' class='pdv_bottom'
					style='overflow: hidden; width: 100%; height: 100%'>
					<div class="pdv_border"
						style="margin: 0; padding: 0; height: 100%; border: 0px solid; background:;">
						<div
							style="height: 25px; margin: 1px; display: none; background:;">
							<div
								style="float: left; margin-left: 12px; line-height: 25px; font-weight: bold; color:">

							</div>
							<div style="float: right; margin-right: 10px; display: none">
								<a href="-1" style="line-height: 25px; color:">更多</a>
							</div>
						</div>
						<div style="padding: 0px">

							<?php echo $this->Html->image('1358744778.png', array('width'=>'100%','border'=>'0'))?>
						

						</div>
					</div>

				</div>
			</div>

			<!-- 底部菜单（一级） -->

			<div id='pdv_10813' class='pdv_class'
				style='width: 1002px; height: 34px; top: 38px; left: 0px; z-index: 5'>
				<div id='spdv_10813' class='pdv_bottom'
					style='overflow: hidden; width: 100%; height: 100%'>
					<div class="pdv_border"
						style="margin: 0; padding: 0; height: 100%; border: 0px solid; background:;">
						<div
							style="height: 25px; margin: 1px; display: none; background:;">
							<div
								style="float: left; margin-left: 12px; line-height: 25px; font-weight: bold; color:">
								脚注栏目</div>
							<div style="float: right; margin-right: 10px; display: none">
								<a href="-1" style="line-height: 25px; color:">更多</a>
							</div>
						</div>
						<div style="padding: 0px">

							<div id="bottommenu">
								| <a href="page/html/company.php" target="_self">关于我们</a>| <a
									href="page/contact/contact.php" target="_self">联系方式</a>| <a
									href="page/contact/feedback.php" target="_self">信息反馈</a>| <a
									href="job/index.php" target="_self">人才招聘</a>| <a
									href="advs/link/" target="_self">友情链接</a>|

							</div>


						</div>
					</div>

				</div>
			</div>

			<!-- 底部信息编辑区 -->

			<div id='pdv_10807' class='pdv_class' title=''
				style='width: 1002px; height: 83px; top: 100px; left: 0px; z-index: 14'>
				<div id='spdv_10807' class='pdv_bottom'
					style='overflow: hidden; width: 100%; height: 100%'>
					<div class="pdv_border"
						style="margin: 0; padding: 0; height: 100%; border: 0px solid; background:;">
						<div
							style="height: 25px; margin: 1px; display: none; background:;">
							<div
								style="float: left; margin-left: 12px; line-height: 25px; font-weight: bold; color:">

							</div>
							<div style="float: right; margin-right: 10px; display: none">
								<a href="-1" style="line-height: 25px; color:">更多</a>
							</div>
						</div>
						<div style="padding: 0px">
							<div
								style="width: 100%; text-align: center; font: 12px/20px Arial, Helvetica, sans-serif">
								<div
									style="TEXT-ALIGN: center; LINE-HEIGHT: 24px; MARGIN: 0px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; COLOR: #464646">版权所有
									Copyright(C)2009-2012 杭州某某生物制药公司</div>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>


</body>
</html>
