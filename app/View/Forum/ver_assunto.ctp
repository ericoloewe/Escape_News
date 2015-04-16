<?php echo $this->Html->css('/css/Pages/Espaco K9/Forum/VerAssunto'); 
      $maxPages = (count($forum["ForumTopicos"])/10)+1;
 ?>

<div class="panel panel-default">
  <div class="panel-heading" id="panelHead"> <h4><?php echo $forum["Forum"]["titulo"]?></h4>
  </div>
    <ul class='topicos'>
        <?php for($i=($pagAtual*10);$i<=($pagAtual*10)+10&&!empty($forum["ForumTopicos"][$i]);$i++): ?>
            <?php $topico = $forum["ForumTopicos"][$i]; ?>
            <li>
                <div class="row">
                    <div class="col-md-12">
                        <div class='picture'><img class='img-circle' style='float: left; width: 50px; height: 50px;' src='/app/webroot/img/pics/<?php echo  $topico["autor"]; ?>.jpg'/></div>
                        <div class='post'><a href="/jogadores/ver/<?php echo $topico["autor"]; ?>"><?php echo  $this->Link->getJogador($topico["autor"],'nome'); ?></a>
                        <small>Postado em <?php echo  $topico["data"]; ?></small>
                        <div id="editAndDelete">
                            <?php if($this->Session->read('Auth.User.id') == $topico["autor"]): ?>
                            <a href="/Forum/EditarTopicos/<?php echo $topico["id"]; ?>" class="glyphicon glyphicon-pencil"></a>
                            <?php endif; ?>
                            <?php if($this->Session->read('Auth.User.privilegio') == 1||$this->Session->read('Auth.User.id') == $topico["autor"]): ?>
                            /
                            <?php echo $this->Form->postLink(
                                "",
                                array('action' => 'deleteTopico', $topico["id"],$forum["Forum"]["id"]),
                                array('confirm' => 'Are you sure?','class'=>'glyphicon glyphicon-remove')
                            )?>
                            <?php endif; ?>
                        </div>
                        <p><?php echo  $topico["mensagem"]; ?></p></div>
                    </div>
                </div>
            </li>
        <?php endfor; ?>
    </ul>
    <div class="row">
        <div class="center-block col-xs-12 col-sm-6 col-lg-8">
            <?php
                echo $this->Form->create('Forum', array('url' => array('controller' => 'forum','action' => 'novoTopico'),'class' => 'form-inline'));
              ?>
                <table class="reply">
                    <tbody>
                        <tr>
                            <td id="span">
                                <span class="btn btn-default btn-file"><i class="glyphicon glyphicon-picture"><input id="InputFile" type="file" accept=".jpg" onchange="enviarImagem()"></i></span>
                            </td>
                            <td id="textarea">
                                <div contentEditable="true" style="width: 100%;" class='form-control' id="divText">
                                </div>
                            </td>
                            <td hidden>
                                <?php
                                echo $this->Form->input(
                                    'ForumTopicos.mensagem',
                                    array('label' => array('class' => 'sr-only'),'hidden','rows'=>20)
                                );
                                echo $this->Form->input(
                                    'ForumTopicos.forum_id',
                                    array('label' => array('class' => 'sr-only'),'hidden','value'=>$forum["Forum"]["id"],'type'=>'text')
                                );
                                echo $this->Form->input(
                                    'ForumTopicos.autor',
                                    array('label' => array('class' => 'sr-only'),'hidden','value'=>$this->Session->read('Auth.User.id'))
                                );?>
                            </td>
                            <td id="button">
                                <?php echo $this->Form->end(array('label' => 'Enviar','class' => 'btn btn-default btn-lg btn-block','id'=>'replysubmit')); ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>
    <nav>
      <ul class="pagination">
        <li>
            <?php if($pagAtual<=1) $anterior=1; else $anterior = $pagAtual-1;?>
          <a href="/forum/VerAssunto/<?php echo $forum["Forum"]["id"]."/".$anterior; ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <?php for($i=1;$i<=$maxPages;$i++): ?>
            <li><a href="/forum/VerAssunto/<?php echo $forum["Forum"]["id"]."/".$i; ?>"><?php echo $i; ?></a></li>
        <?php endfor; ?>
        <li>
            <?php if($pagAtual==$maxPages) $prox=$maxPages; else $prox = $pagAtual+1;?>
          <a href="/forum/VerAssunto/<?php echo $forum["Forum"]["id"]."/".$prox; ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
</div>