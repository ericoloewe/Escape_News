<?php echo $this->Html->css('/css/Pages/Main'); ?>

<!--<link type="text/css" rel="stylesheet" href="/Styles/Pages/Features/Video.css">
<video autoplay loop poster="polina.jpg" id="bgvid" muted>
<source src="../../Media/Videos/poker1.mp4" type="video/mp4">
</video>-->

<?php echo $this->Html->media(
     array(
         '/app/webroot/vid/poker1.mp4'         
     ),
     array('autoplay','muted','loop','id' => "bgvid")
 ); ?>