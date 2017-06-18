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
echo $this->Html->getCrumbs(' &gt; ', null);
$this->end();

if (isset($isAdmin) && $isAdmin) {
    $url = $this->Html->url(
            [
                    'controller' => $params['controller'],
                    'action' => $params['action'] . '_editpic'
            ]);
    
    echo $this->Html->link('编辑图片', '#', 
            [
                    'onclick' => "mLayerShow('" . $url . "');",
                    'class' => 'submit'
            ]);
}
foreach ($pics as $p) {
    if (isset($isAdmin) && $isAdmin) {
        $img = '/img/' . Uploaditem::UPLOAD_IMAGE . '/' . $p['Variable']['value'];
        
        echo $this->Html->div('piclist_pic', 
                $this->Html->image($img, 
                        [
                                'alt' => $p['Variable']['value'],
                                'onclick' => "mLayerShow('" . $url . "');"
                        ]));
    } else {
        
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
}
?>
<div class="ele_cnt_txt">
<?php
if (empty($data['Variable']['value'])) {
    echo Configure::read('MSG00010001');
} else {
    $options = [];
    if (isset($isAdmin) && $isAdmin) {
        $url = $this->Html->url(
                [
                        'controller' => $params['controller'],
                        'action' => $params['action'] . '_edit'
                ]);
        $options['onclick'] = "mLayerShow('${url}');";
    }
    echo $this->Html->tag('span', $this->Tag->nl2p($data['Variable']['value']), 
            $options);
}
?>
</div>
