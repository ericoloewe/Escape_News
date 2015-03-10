<?php
    echo $this->Html->css('index');
    echo $this->Session->flash('auth');
    echo $this->Form->create('Jogador', array('url' => array('controller' => 'jogadores','action' => 'login'),'class' => 'form-signin'));
?>
    <h2>K9StreetPoker</h2>
<?php
    echo $this->Form->input(
        'email',
        array('label' => array('class' => 'sr-only'),'class'=>'form-control','autofocus' => '','placeholder' => 'Email')
    );
    echo $this->Form->input(
        'password',
        array('label' => array('class' => 'sr-only'),'class'=>'form-control','placeholder' => 'Password')
    );    
    echo $this->Form->end(array('label' => 'Start','class' => 'btn btn-lg btn-primary btn-block'));
    echo $this->Html->link(
        'Entre em Contato',
        '/contatos/view', array('style' => 'color:#eee; font-weight: bold;')       
    );    
?>