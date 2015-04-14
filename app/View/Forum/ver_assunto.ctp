<link type="text/css" rel="stylesheet" href="/Styles/Pages/EspacoK9/Forum/Forum.css">
<!--<link type="text/css" rel="stylesheet" href="/Styles/Pages/Features/hover/hover.css">-->

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading" id="panelHead"> <?php echo $forum["Forum"]["titulo"]?>
      <pre hidden><?php /*echo print_r($forum);*/ ?></pre>
  </div>
    <ul class='topicos'>
        <?php foreach($forum["ForumTopicos"] as $topico): ?>
            <li>
                <div class='picture'><img class='img-circle' style='float: left; width: 50px; height: 50px;' src='/app/webroot/img/pics/<?php echo  $topico["autor"]; ?>.jpg'/></div>
                <div class='post'><a><?php echo  $topico["autor"]; ?></a>
                <small>Postado em <?php echo  $topico["data"]; ?></small>
                <p><?php echo  $topico["mensagem"]; ?></p></div>
                <span id='reply' onclick='turnONANDOFF({$row['ID']})'>Responder <i class='glyphicon glyphicon-share-alt'></i></span>
                <span class='button bubble-top replybox' id='{$row['ID']}'>{$this->getReplyTopic($row['ID'])}</span>
            </li>
        <?php endforeach; ?>
    </ul>
</div>