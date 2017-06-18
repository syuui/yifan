<div class="m-layer z-show" id="popup_win">

	<table>
		<tbody>
			<tr>
				<td><article class="lywrap">
				<?php echo $this->fetch('form_s');?>
						<header class="lytt">
							<h2 class="u-tt"><?php echo $this->fetch('page_title');  ?></h2>
							<span class="lyclose" onclick="removeLayer();">×</span>
						</header>
						<section class="lyct">
							<p><?php echo $this->fetch('content');?></p>
						</section>
						<footer class="lybt">
							<div class="lyother">
								<p><?php echo $this->fetch('page_hint');    ?></p>
							</div>
							<div class="lybtns"><?php echo $this->fetch('buttons');?></div>
						</footer>
                <?php echo $this->fetch('form_e');?>
					</article></td>
			</tr>
		</tbody>
	</table>

</div>
