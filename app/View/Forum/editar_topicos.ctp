<div class="row">
    <div class="center-block col-xs-12 col-sm-6 col-lg-8" style="float: none;">
        <h1>Editar Topico</h1>
        <?php
        echo $this->Form->create('ForumTopicos');
        echo $this->Form->input('id', array('type' => 'hidden'));
        echo $this->Form->input(
            'mensagem',
            array('label' => array('class' => 'sr-only'),'class'=>'form-control')
        );        
        echo $this->Form->end(array('label'=>'Salvar','class' => 'btn btn-primary btn-block'));
        ?>
    </div>
</div>