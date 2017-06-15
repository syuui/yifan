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
echo $this->Html->getCrumbs(' &gt; ', null);
$this->end();
?>
地址：<?php echo Configure::read('contact_address') . $this->Tag->br();   ?>
电话：<?php echo Configure::read('contact_tel') . $this->Tag->br();   ?>
传真：<?php echo Configure::read('contact_fax') . $this->Tag->br();   ?>
邮箱：<?php echo Configure::read('contact_mail') . $this->Tag->br();  ?>
<?php
echo $this->Tag->br();
echo $this->Html->image(Configure::read('map_filename'), 
        [
                'class' => 'map',
                'alt' => '地图',
                'id' => 'mappic',
                'onclick' => 'window.open($("#mappic").attr("src"));'
        ]);
?>
