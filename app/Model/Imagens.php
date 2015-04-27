<?php
class Imagens extends AppModel {
    public $name = 'Imagens';
    public $useTable = 'imagens';

    public $validate = array(
        'imagem' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'É necessario uma imagem!'
            )
        ),
        'autor' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'É necessario um autor!'
            )
        )        
    );    
}
?>