<?php
$page_title = '联系我们';

$this->start('sidebar');
echo $this->Element('sidebar/contactus');
$this->end();

$this->start('page_title');
echo $page_title;
$this->end();

$this->start('breadcrumb');
$this->Html->addCrumb($page_title);
$this->end();
?>
<?php
echo $this->Html->div('s-line', '地址：' . $data['address']);
echo $this->Html->div('s-line', '电话：' . $data['tel']);
echo $this->Html->div('s-line', '手机：' . $data['mobile']);
echo $this->Html->div('s-line', '传真：' . $data['fax']);
echo $this->Html->div('s-line', '邮箱：' . $data['mail']);

echo $this->Html->div('s-line', 
        $this->Html->image(Configure::read('map_filename'), 
                [
                        'class' => 'map',
                        'alt' => '地图',
                        'id' => 'mappic',
                        'onclick' => 'window.open($("#mappic").attr("src"));'
                ]));
?>
