
<div class="container">
    <?php
    echo $this->Html->css('index');
    echo $this->Form->create('Usuario', array('url' => array('controller' => 'usuarios','action' => 'editarSenha'),'class' => 'form-signin'));
    ?>
    <h2 class="form-signin-heading">Troca Senha</h2>
    <?php
    echo $this->Form->input(
        'email',
        array('label' => array('class' => 'sr-only'),'class'=>'form-control','autofocus' => '','placeholder' => 'Email','style'=>'margin-bottom:10px;','required')
    );
    echo $this->Form->input(
        'old_password',
        array('label' => array('class' => 'sr-only'),'class'=>'form-control','placeholder' => 'Senha Atual','type'=>'password','required')
    );
    echo $this->Form->input(
        'password',
        array('label' => array('class' => 'sr-only'),'class'=>'form-control','placeholder' => 'Nova Senha','type'=>'password','required')
    );
    echo $this->Form->input(
        'retype_password',
        array('label' => array('class' => 'sr-only'),'class'=>'form-control','placeholder' => 'Confirmar Nova Senha','type'=>'password','required')
    );
    echo $this->Form->end(array('label' => 'Atualizar','class' => 'btn btn-lg btn-primary btn-block'));
    ?>
</div>