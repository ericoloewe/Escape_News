<?php
class Forum extends AppModel {
    public $name = 'Contato';
    public $useTable = 'contato';

    public $validate = array(
        'titulo' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'É necessario um nome!'
            )
        ),
        'autor' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'É necessario um email para contato!'
            )
        )        
    );    
}
?>