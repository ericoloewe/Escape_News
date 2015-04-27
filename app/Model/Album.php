<?php
class Album extends AppModel {
    public $name = 'Album';
    public $useTable = 'album';

    public $hasMany = array(
        'Imagens' => array('foreignKey' => 'album_id')
    );

    public $validate = array(
        'titulo' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'É necessario um titulo!'
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