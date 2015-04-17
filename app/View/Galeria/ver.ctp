<?php echo $this->Html->script('/js/Features/jquery.cycle2.min.js'); ?>

<div class="cycle-slideshow"
    data-cycle-fx="scrollHorz"
    data-cycle-timeout="0"
    data-cycle-prev="#prev"
    data-cycle-next="#next"
    >
    <img src="http://malsup.github.io/images/p1.jpg">
    <img src="http://malsup.github.io/images/p2.jpg">
    <img src="http://malsup.github.io/images/p3.jpg">
    <img src="http://malsup.github.io/images/p4.jpg">
</div>

<div class="center">
    <a href=# id="prev">Prev</a> 
    <a href=# id="next">Next</a>
</div>

<style>
    img{
        height: 200px;
        width: 200px;
    }
</style>