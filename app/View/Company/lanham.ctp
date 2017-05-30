<?php
$this->start('sidebar');
echo $this->Element('sidebar/company');
$this->end();
?>

<!-- 当前位置提示条 -->
<div class="page_navi">
	您现在的位置：<?php echo $this->Html->link( Configure::read('c_site_title'), array('controller'=>'pages', 'action'=>'display')); ?> &gt; 走进朗豪  &gt; 朗豪风采
</div>
<div class="ele_block">
	<div class="ele_bdr_l">
		<div class="ele_bdr_r">
			<div class="ele_ttl_l">
				<div class="ele_ttl_m">朗豪风采</div>
				<div class="ele_ttl_r"></div>
			</div>
			<div class="ele_cnt">
<?php
foreach ($pics as $p) :
    ?>
    <div class="productlist_index">
					<div class="productlist_index_pic">
		<?php
    $img = Uploaditem::UPLOAD_IMAGE . '/' . $p['Variable']['value'];
    echo $this->Html->image($img, 
            array(
                    'alt' => $p['Variable']['value']
            ));
    ?>
					</div>
				</div>    
<?php
endforeach
?>
				<div class="ele_cnt_txt">
<?php
if (isset($dscr['Variable']['value']) && ! empty($dscr['Variable']['value'])) {
    $val = $dscr['Variable']['value'];
} else {
    $val = Configure::read('MSG00010001');
}
echo nl2br(trim($val));
?>
				</div>
			</div>
		</div>
	</div>
	<div class="ele_ftr_l"></div>
	<div class="ele_ftr_r"></div>
</div>
