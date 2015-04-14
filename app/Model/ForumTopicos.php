<?php
class ForumTopicos extends AppModel {
    public $name = 'Forum';
    public $useTable = 'forumtopicos';

    public $validate = array(
        'idforum' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'É necessario um id!'
            )
        ),
        'mensagem' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'É necessario uma mensagem!'
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