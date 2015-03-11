<?php echo $this->Html->css('/css/Pages/Jogadores/Novo'); ?>

<form class="form-horizontal" role="form" action="home.php?u=/Users/New" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <img id="img-new" class="img-thumbnail" src="{imagem}" style="max-width: 200px; max-height: 200px;" alt="10"></img>
    </div>
    <div class="form-group">
        <input type="file" onchange="pegarCaminhoArquivo()" name="InputFile" id="InputFile" accept=".jpg,.jpeg,.png">
    </div>
    <div class="form-group">
    <label class="col-sm-2 control-label">Nome*</label>
    <div class="col-sm-10">
        <input type="text" name="name" class="form-control" placeholder="Insira o Nome Completo">
    </div>
    </div>
    <div class="form-group">
    <label class="col-sm-2 control-label">Email*</label>
    <div class="col-sm-10">
        <input type="email" name="Mail" class="form-control" placeholder="nome@dominio.com">
    </div>
    </div>
    <div class="form-group">
    <label class="col-sm-2 control-label">RG</label>
    <div class="col-sm-10">
        <input type="text" name="RG" class="form-control" placeholder="RG">
    </div>
    </div>
    <div class="form-group">
    <label class="col-sm-2 control-label">Celular</label>
    <div class="col-sm-10">
        <input type="text" name="PHONE" class="form-control" placeholder="(DDD)-XXXXXXXX">
    </div>
    </div>
    <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default btn-lg btn-block">Registrar</button>
    </div>
    </div>
</form>