<?php
$this->start('sidebar');
echo $this->Element('sidebar/company');
$this->end();

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
$this->end();

foreach ($pics as $p) {
    $url = CompanyController::UPLOAD_IMAGE . '/' . $p['Variable']['value'];
    echo $this->Html->div('piclist_pic', 
            $this->Html->image($url, 
                    [
                            'alt' => $p['Variable']['value'],
                            'onclick' => "window.open('" . '/img/' .
                                     CompanyController::UPLOAD_IMAGE . '/' .
                                     $p['Variable']['value'] . "');"
                    ]));
}

?>
<div class="ele_cnt_txt">
<?php
if (empty($data['Variable']['value'])) {
    echo $this->Html->tag('span', Configure::read('MSG00010001'));
} else {
    echo $this->Html->tag('span', $this->Tag->nl2p($data['Variable']['value']));
}
?>
</div>
