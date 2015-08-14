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
                    <a href="/Forum/EditarTopicos/<?php echo $topico["Noticia"]["id"]; ?>" class="glyphicon glyphicon-pencil"></a>                            
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
            <p class="blog-post-mensagem">
                <?php echo  $topico["Noticia"]["mensagem"]; ?>
            </p>
        </div>            
    <?php endforeach; ?>
<?php endif; ?>
<?php if(isset($indice)): ?>
    <a href="/noticias/getTopicos/<?php echo $indice; ?>">next</a>
<?php else: ?>
    <hr>
<?php endif; ?>