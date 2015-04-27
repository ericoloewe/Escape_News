<?php echo $this->Html->script('/js/Features/jquery.cycle2.min.js');
      echo $this->Html->css('/css/Pages/Espaco K9/Album/Ver');  ?>
<?php if($this->Session->read('Auth.User.privilegio') == 1): ?>
    <?php
    echo $this->Form->create('Album', array('url' => array('controller' => 'album','action' => 'novo'),'class' => 'form-signin','style'=>'float: right;'));
    ?>
    <i class="glyphicon glyphicon-plus" style="float: left; margin-top: 2px;" onclick="turnOn('inputAssunto'); changePosition('inputAssunto');"></i>
    <div id="inputAssunto">
        <input type="text" name="data[Album][titulo]" placeholder="Insira um Titulo">
        <button type="submit" class="btn btn-default">Criar</button>
    </div>
    </form>
<br>
<?php endif; ?>
<div class="row">
<?php foreach($galerias as $galeria): ?>
    <div class="col-lg-4">
        <a href="/Album/VerAlbum/<?php echo $galeria["Album"]["id"]; ?>">
            <span class="nomeAlbum"><?php echo $galeria["Album"]["titulo"]; ?></span>
            <div class="cycle-slideshow" data-cycle-fx=scrollHorz data-cycle-timeout=5000 data-cycle-overlay-template='{{desc}} - {{date}}<br><small>{{title}}</small>'>
                <!-- empty element for overlay -->                
                <?php if(empty($galeria["Imagens"])): ?>
                    <style>
                        .col-lg-4{                            
                            height: 264px;
                        }
                    </style>
                <?php else: ?>
                    <div class="cycle-caption"></div>
                    <div class="cycle-overlay custom"></div>
                    <?php foreach($galeria["Imagens"] as $imagem): ?>
                        <img src="<?php echo $imagem["imagem"]?>" data-cycle-date="<?php echo $this->Link->converteData($imagem["data"]); ?>"  data-cycle-title="<?php echo $imagem["descricao"];?>" data-cycle-desc="<?php echo $this->Link->getJogador($imagem["autor"],'nome'); ?>">
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </a>
    </div>
<?php endforeach; ?>
</div>