
<!-- 栏目导航 -->
<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m">栏目导航</div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">
				<ul class="list_style_2">
					<li><a href="news/html/?390.html">公司动态</a></li>
					<li><a href="news/html/?346.html">行业动态</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>
<!-- /栏目导航 -->

<!-- 资讯搜索 -->
<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m">资讯搜索</div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">
				<form action="/news/search" method="POST">
				<?php
    echo $this->Form->input('keyword');
    echo $this->Form->submit("Search");
    ?>
				</form>

			</div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>
<!-- /资讯搜索 -->

<!-- 最新动态 -->
<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m">最新动态</div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">
				<ul class="list_style_2">
					<li><a href="news/html/?390.html">XXXX医院YYYY项目顺利实施</a></li>
					<li><a href="news/html/?346.html">XXXX医院YYYY项目顺利实施</a></li>
					<li><a href="news/html/?339.html">XXXX医院YYYY项目顺利实施</a></li>
					<li><a href="news/html/?338.html">XXXX医院YYYY项目顺利实施</a></li>
					<li><a href="news/html/?336.html">XXXX医院YYYY项目顺利实施</a></li>
					<li><a href="news/html/?335.html">XXXX医院YYYY项目顺利实施</a></li>
					<li><a href="news/html/?320.html">XXXX医院YYYY项目顺利实施</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>
<!-- /最新动态 -->