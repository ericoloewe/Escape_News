<?php echo $this->Html->css('/css/Pages/Espaco K9/Album/NovaFoto');  ?>

<div class="row">
    <div class="center-block col-xs-12 col-sm-6 col-lg-8" style="float: none;">
        <h1>Nova Foto</h1>
        <?php echo $this->Form->create('Imagens',array('url' => array('controller' => 'album','action' => 'NovaFoto'),'class' => 'form-signin')); ?>
        <?php echo $this->Form->input(
                'album_id',
                array('hidden' => "",'label' => array('class' => 'sr-only'),'value'=>$id,'type'=>'text')
            );  ?>
        <div class="imagem">
            <img id="img-new" class="img-thumbnail" alt="Nova imagem" src="/">
            <span class="btn btn-default btn-file" onchange="colocarNovaFoto()">
                <i class="glyphicon glyphicon-camera">
                    <input id="InputFile" type="file" accept=".jpg">
                </i>
            </span>
            <?php echo $this->Form->input(
                'imagem',
                array('hidden' => "",'label' => array('class' => 'sr-only'))
            );  ?>
        </div>
        <?php echo $this->Form->input(
            'descricao',
            array('label' => array('class' => 'sr-only'),'class'=>'form-control','placeholder'=>'Descrição')
        ); ?>       
        
        <div class="input-group date" id="calendar">                
            <input id="inputDataFoto" class="form-control" placeholder="DD/MM/AAAA" onkeypress="mascaraData(this)" maxlength="10" type="text"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>           
        </div>
        <?php echo $this->Form->input(
                'data',
                array('hidden'=>'','label' => array('class' => 'sr-only'),'type' => 'text','maxlength'=>'10')
            );
            echo $this->Form->end(array('label'=>'Salvar','class' => 'btn btn-primary btn-block')); ?>
    </div>
</div>