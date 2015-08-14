<?php echo $this->Html->css('/css/Pages/Noticias/Nova'); ?>
<div class="row">
    <div class="center-block col-xs-12 col-sm-6 col-lg-8" style="float: none;">
        <h1>Criar Noticia</h1>        
        <?php
        echo $this->Form->create('Noticia', array('url' => array('controller' => 'Noticias','action' => 'nova'),'class' => 'form-signin'));?>
        <span class="btn btn-default btn-file">
            <i class="glyphicon glyphicon-picture">
                <input id="InputFile" type="file" accept=".jpg" onchange="enviarNoticiaComImagem()">
            </i>
        </span>
        <?php
        echo $this->Form->input(
            'titulo',
            array('label' => array('class' => 'sr-only'),'class'=>'form-control','placeholder'=>'Insira um Titulo')
        );
        echo $this->Form->input(
            'mensagem',
            array('label' => array('class' => 'sr-only'),'class'=>'form-control','placeholder'=>'Insira uma mensagem')
        );        
        echo $this->Form->input('prioridade', array(
            'label' => array('class' => 'sr-only'),
            'options' => array(1=>"Alta", 2=>"Media", 3=>"Baixa"),
            'empty' => 'Se necessario, escolha uma prioridade!', 
            'class'=>'form-control'
        ));
        echo $this->Form->end(array('label'=>'Salvar','class' => 'btn btn-primary btn-block'));
        ?>
    </div>
</div>