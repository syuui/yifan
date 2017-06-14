<?php
$this->start('sidebar');
echo $this->Element('sidebar/company');
$this->end();
$page_title = '企业文化';

$this->start('page_title');
echo $page_title;
$this->end();

$this->start('breadcrumb');
$this->Html->addCrumb('走进朗豪', 
        [
                'controller' => 'company',
                'action' => 'index'
        ]);
$this->Html->addCrumb($page_title);
echo $this->Html->getCrumbs(' &gt; ', null);
$this->end();

foreach ($pics as $p) {
    $url = Uploaditem::UPLOAD_IMAGE . '/' . $p['Variable']['value'];
    echo $this->Html->div('piclist_pic', 
            $this->Html->image($url, 
                    [
                            'alt' => $p['Variable']['value'],
                            'onclick' => "window.open('" . '/img/' .
                                     Uploaditem::UPLOAD_IMAGE . '/' .
                                     $p['Variable']['value'] . "');"
                    ]));
}
?>
<div class="ele_cnt_txt">
<?php
if (! empty($dscr['Variable']['value'])) {
    echo $this->Tag->nl2p($dscr['Variable']['value']);
} else {
    echo Configure::read('MSG00010001');
}
?>
</div>