<?php echo $this->Html->css('/css/Pages/usuarios/Novo'); ?>
<div class="container">
<?php echo $this->Form->create('Usuario', array('url' => array('controller' => 'usuarios','action' => 'novo'),'class' => 'form-horizontal','role' => 'form','type' => 'file')); ?>
    <div class="form-group">
        <img id="img-new" class="img-thumbnail" src="{imagem}" style="max-width: 200px; max-height: 200px;" alt="10">
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('pic', 
              array('name'=>'pic','label' => array('class' => 'sr-only'),'type' => 'file','id' => 'InputFile','accept' => '.jpg','onchange' => 'pegarCaminhoArquivo()')
              ); ?>
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
        <label class="col-sm-2 control-label">Senha</label>
        <div class="col-sm-10">
            <?php echo $this->Form->input(
                'password',
                array('label' => array('class' => 'sr-only'),'class'=>'form-control','placeholder' => 'Nova Senha','type'=>'password','required')
            );     ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Confirme</label>
        <div class="col-sm-10">
            <?php echo $this->Form->input(
                'retype_password',
                array('label' => array('class' => 'sr-only'),'class'=>'form-control','placeholder' => 'Confirmar Nova Senha','type'=>'password','required')
            ); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Celular</label>
        <div class="col-sm-10">
            <?php echo $this->Form->input(
                    'phone',
                    array('label' => array('class' => 'sr-only'),'class'=>'form-control','placeholder' => '(DDD)-XXXXXXXX','maxlength'=>'14',"onkeypress"=>"mascaraPhone(this)")
                ); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo $this->Form->end(array('label' => 'Registrar','class' => 'btn btn-default btn-lg btn-block'));?>
        </div>
    </div>
</form>
</div>