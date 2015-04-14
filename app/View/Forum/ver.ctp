<?php echo $this->Html->css('/css/Pages/EspacoK9/Forum/Ver'); ?>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading" id="panelHead">
      <form style="float: left;" action="/Pages/EspacoK9/Forum/Forum.php" method="post">
          <i class="glyphicon glyphicon-plus" style="float: left; margin-top: 2px;" onclick="turnOn('inputAssunto')"></i>
          <div id="inputAssunto">
              <input type="text" name="AssuntoForum">
              <button type="submit" class="btn btn-default">Enviar</button>
          </div>
      </form>K9 STREET POKER Forum</div>
   {SUBJECTS}
</div>