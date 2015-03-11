<?php echo $this->Html->css('/css/Pages/Jogadores/Novo'); ?>

<?php echo $this->Form->create('Jogador', array('url' => array('controller' => 'jogadores','action' => 'novo'),'class' => 'form-horizontal','role' => 'form')); ?>
<!--<form class="form-horizontal" role="form" action="home.php?u=/Users/New" method="post" enctype="multipart/form-data">-->
    <div class="form-group">
        <img id="img-new" class="img-thumbnail" src="{imagem}" style="max-width: 200px; max-height: 200px;" alt="10">
    </div>
    <div class="form-group">
        <input type="file" onchange="pegarCaminhoArquivo()" name="InputFile" id="InputFile" accept=".jpg,.jpeg,.png">
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Nome*</label>
        <div class="col-sm-10">
            <?php echo $this->Form->input(
                'nome',
                array('label' => array('class' => 'sr-only'),'class'=>'form-control','placeholder' => 'Insira o Nome Completo')
            ); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Email*</label>
        <div class="col-sm-10">
            <?php echo $this->Form->input(
                    'email',
                    array('label' => array('class' => 'sr-only'),'class'=>'form-control','placeholder' => 'nome@dominio.com','type'=>'email')
                ); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">RG</label>
        <div class="col-sm-10">
            <?php echo $this->Form->input(
                    'rg',
                    array('label' => array('class' => 'sr-only'),'class'=>'form-control','placeholder' => 'Insira o seu RG')
                ); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Celular</label>
        <div class="col-sm-10">
            <?php echo $this->Form->input(
                    'phone',
                    array('label' => array('class' => 'sr-only'),'class'=>'form-control','placeholder' => '(DDD)-XXXXXXXX')
                ); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo $this->Form->end(array('label' => 'Registrar','class' => 'btn btn-default btn-lg btn-block'));?>
        </div>
    </div>
</form>