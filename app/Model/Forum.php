<?php
class Forum extends AppModel {
    public $name = 'Forum';
    public $useTable = 'forum';

    public $hasMany = array(
        'ForumTopicos' => array('foreignKey' => 'forum_id')
    );

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