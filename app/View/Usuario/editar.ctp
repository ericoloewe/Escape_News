<?php echo $this->Html->css('/css/Pages/usuarios/Editar'); 
      echo $this->Html->css('/css/Features/searchform_large'); 
?>

<p id="actualpage" hidden><?php echo $this->request->params['action']; ?></p>

<?php if(!isset($Usuario)): ?>
<div class="row">
    <div class="center-block col-xs-12 col-sm-6 col-lg-8">
        <table id="sea">
            <tbody>
                <tr>
                    <td id="span">                     
                        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                    </td>
                    <td>
                        <input class="form-control" id="inameuser" type="search" placeholder="Buscar Usuario" autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <td>                
                    </td>
                    <td>
                        <div id="searchTable">
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php else: ?>
    <div id="deletarUsuario" class="label label-danger">
        <?php echo $this->Form->postLink(
                "",
                array('action' => 'delete', $Usuario['Usuario']['id']),
                array('confirm' => 'Are you sure?','class'=>'glyphicon glyphicon-remove')
            )?>
    </div>
 <?php echo $this->Form->create('Usuario', array('url' => array('controller' => 'usuarios','action' => 'editar'),'class' => 'form-horizontal','role' => 'form','type' => 'file')); ?>
    <div class="form-group">
        <img id="img-new" class="img-thumbnail" src="/app/webroot/img/pics/<?php echo $Usuario['Usuario']['id']; ?>.jpg" style="max-width: 200px; max-height: 200px;" alt="10">
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('pic', 
                array('name'=>'pic','label' => array('class' => 'sr-only'),'type' => 'file','id' => 'InputFile','accept' => '.jpg','onchange' => 'pegarCaminhoArquivo()')
              ); ?>
    </div>
    <div class="form-group">        
        <div class="col-sm-10">
            <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
        </div>
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
            <?php echo $this->Form->end(array('label' => 'Atualizar','class' => 'btn btn-default btn-lg btn-block'));?>
        </div>
    </div>
</form>
<?php endif; ?>