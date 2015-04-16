<div class="row">
    <div class="center-block col-xs-12 col-sm-6 col-lg-8" style="float: none;">
        <h1>Editar Forum</h1>
        <?php
        echo $this->Form->create('Forum');
        echo $this->Form->input(
                'titulo',
                array('class'=>'form-control','autofocus' => '')
        );
        echo $this->Form->input('id', array('type' => 'hidden'));
        echo $this->Form->end(array('label'=>'Salvar','class' => 'btn btn-primary btn-block'));
        ?>
    </div>
</div>