<?php

class Contato extends AppModel {
    public $name = 'Contato';
    public $useTable = 'contato';

    public $validate = array(
        'nome' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'É necessario um nome!'
            )
        ),
        'email' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'É necessario um email para contato!'
            )
        ),
        'mensagem' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'É necessario uma mensagem!'
            )
        )   
    );    
}

?>