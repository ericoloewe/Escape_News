<?php echo $this->Html->css('/css/Pages/Noticias/Ver'); ?>
<?php echo $this->Html->script('/js/Features/jquery.jscroll.min.js'); ?>
<?php echo $this->Html->script('/js/Scroll.js'); ?>

<?php if($this->Session->read('Auth.User.privilegio') == 1): ?>
    <a href="/Noticias/Nova" class="glyphicon glyphicon-plus" style="float: right; margin-top: 2px;"></a>
<?php endif; ?>
<div class="blog-header">
    <h1 class="blog-title">Escape News</h1>
    <p class="lead blog-description">O portal oficial de noticias da Escape</p>
</div>
<div class="row">
    <div class="scroll col-sm-8 blog-main" data-ui="jscroll-default">
        <?php if(isset($noticias)): ?>
            <?php foreach($noticias as $topico): ?>          
                <div class="blog-post">
                    <h2 class="blog-post-title">
                        <?php echo $topico["Noticia"]["titulo"]; ?>  
                        <?php echo $this->Link->getPrioridade($topico["Noticia"]["prioridade"]); ?>
                    </h2>
                    
                    <div class="blog-post-meta">                    
                        Postado em <?php echo  $this->Link->converteData($topico["Noticia"]["data"]); ?> 
                        por 
                        <a href="/Usuarios/ver/<?php echo $topico["Usuario"]["id"]; ?>" id="post-autor" onmouseover="turnOn('t<?php echo $topico["Noticia"]["id"]; ?>u<?php echo $topico["Usuario"]['id']; ?>')" onmouseout="turnOff('t<?php echo $topico["Noticia"]["id"]; ?>u<?php echo $topico["Usuario"]['id']; ?>')"><?php echo  $topico["Usuario"]["nome"]; ?></a>                                      
                        <div class="usuario">
                            <div id="t<?php echo $topico["Noticia"]["id"]; ?>u<?php echo $topico["Usuario"]['id']; ?>" class='button bubble-top'>
                                <img class='img-rounded' style='float: left; width: 50px; height: 50px;' src='/app/webroot/img/pics/<?php echo $topico["Usuario"]['id']; ?>.jpg'/>
                                <p>Nome:</p><p><?php echo $topico["Usuario"]['nome']; ?></p>
                                <p>Telefone: <?php echo $topico["Usuario"]['phone']; ?></p>
                                <br>
                            </div>
                        </div>
                            
                        <?php if($this->Session->read('Auth.User.id') == $topico["Noticia"]["autor"]): ?>
                            <a href="/Noticias/Editar/<?php echo $topico["Noticia"]["id"]; ?>" class="glyphicon glyphicon-pencil"></a>                            
                            /
                        <?php endif; ?>
                        <?php if($this->Session->read('Auth.User.privilegio') == 1||$this->Session->read('Auth.User.id') == $topico["Noticia"]["autor"]): ?>
                            <?php echo $this->Form->postLink(
                                "",
                                array('action' => 'delete', $topico["Noticia"]["id"]),
                                array('confirm' => 'Are you sure?','class'=>'glyphicon glyphicon-remove')
                            )?>
                        <?php endif; ?>
                    </div>                
                    <p id="blog-post-mensagem">
                        <?php echo  $topico["Noticia"]["mensagem"]; ?>
                    </p>
                </div>
            <?php endforeach; ?>
            <a href="/noticias/getTopicos/1">next</a>
        <?php endif; ?>        
    </div>
    <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
        <div class="sidebar-module sidebar-module-inset">
            <h4>Sobre</h4>
            <p>Escape News é um portal para pessoas que trabalham na Escape ficarem por dentro do que acontece no dia a dia do mesmo.</p>
        </div>
        <div class="sidebar-module">
            <h4>Arquivos</h4>
            <ol class="list-unstyled">
                <li>
                    <a href="#">Julho 2015</a>
                </li>
            </ol>
        </div>
        <div class="sidebar-module">
            <h4>Veja Tambem</h4>
            <ol class="list-unstyled">
                <li><a href="https://www.facebook.com/escapecria?fref=ts">Facebook</a></li>
                <li><a href="https://www.linkedin.com/company/1876400?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A1876400%2Cidx%3A1-1-1%2CtarId%3A1439568876729%2Ctas%3Aagencia%20esca">LinkedIn</a></li>
            </ol>
        </div>
    </div>
</div>