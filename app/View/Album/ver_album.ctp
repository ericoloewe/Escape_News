<?php echo $this->Html->script('/js/Features/jquery.cycle2.min.js');
      echo $this->Html->script('/js/Features/jquery.cycle2.carousel.min.js');
      echo $this->Html->script('/js/Features/jquery.cycle2.tile.min.js');
      echo $this->Html->css('/css/Pages/Espaco K9/Album/VerAlbum');  ?>

<a href="/Album/NovaFoto/<?php echo $galeria["Album"]["id"]; ?>" class="glyphicon glyphicon-plus novo"></a>
<?php if(!empty($galeria["Imagens"])): ?>
<div class="row">
    <div class="col-md-12">
        <div id="main">
            <div id="slideshow-1">
                <p>
                    <a href="#" class="cycle-prev">&laquo; Anterior</a> | <a href="#" class="cycle-next">Proximo &raquo;</a>
                    <span class="custom-caption"></span>
                </p>                
                <div id="cycle-1" class="cycle-slideshow"
                    data-cycle-slides="> img"
                    data-cycle-timeout="0"
                    data-cycle-prev="#slideshow-1 .cycle-prev"
                    data-cycle-next="#slideshow-1 .cycle-next"
                    data-cycle-caption="#slideshow-1 .custom-caption"
                    data-cycle-caption-template="Slide {{slideNum}} of {{slideCount}}"
                    data-cycle-fx="tileBlind"
                    data-cycle-overlay-template='{{desc}} - {{date}}<br><small>{{title}}</small>'
                    >
                    <div class="cycle-caption"></div>
                    <div class="cycle-overlay custom"></div>
                    <span class="nomeAlbum"><?php echo $galeria["Album"]["titulo"]; ?></span>                    
                    <?php foreach($galeria["Imagens"] as $imagem): ?>                        
                            <img alt="imagem" width="500" height="500" src="<?php echo $imagem["imagem"]?>" data-cycle-date="<?php echo $this->Link->converteData($imagem["data"]); ?>"  data-cycle-title="<?php echo $imagem["descricao"];?>" data-cycle-desc="<?php echo $this->Link->getJogador($imagem["autor"],'nome'); ?>">
                    <?php endforeach; ?>
                </div>
            </div>
            <div id="slideshow-2">
                <div id="cycle-2" class="cycle-slideshow"
                    data-cycle-slides="> img"
                    data-cycle-timeout="0"
                    data-cycle-prev="#slideshow-2 .cycle-prev"
                    data-cycle-next="#slideshow-2 .cycle-next"
                    data-cycle-caption="#slideshow-2 .custom-caption"
                    data-cycle-caption-template="Slide {{slideNum}} of {{slideCount}}"
                    data-cycle-fx="carousel"
                    data-cycle-carousel-visible="5"
                    data-cycle-carousel-fluid=true
                    data-allow-wrap="false"
                    data-cycle-carousel-offset="40%"
                    >
                    <?php foreach($galeria["Imagens"] as $imagem): ?>
                            <img src="<?php echo $imagem["imagem"]?>" width="100" height="100">
                    <?php endforeach; ?>
                </div>
                <p>
                    <a href="#" class="cycle-prev">&laquo; Anterior</a> | <a href="#" class="cycle-next">Proximo &raquo;</a>
                    <span class="custom-caption"></span>
                </p>
            </div>
            <script>
                $(document).ready(function ($) {
                    var slideshows = $('.cycle-slideshow').on('cycle-next cycle-prev', function (e, opts) {
                        // advance the other slideshow
                        slideshows.not(this).cycle('goto', opts.currSlide);
                    });
                    $('#cycle-2 .cycle-slide').click(function () {
                        var index = $('#cycle-2').data('cycle.API').getSlideIndex(this);
                        slideshows.cycle('goto', index);
                    });
                });
            </script>
        </div> <!-- #main -->
    </div>
</div>
<?php endif; ?>