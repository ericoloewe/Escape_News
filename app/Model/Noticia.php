<?php
class Noticia extends AppModel {
    public $name = 'Noticia';
    public $useTable = 'noticias';
    
    public $belongsTo = array(
        'Usuario' => array(
            'className' => 'Usuario',
            'foreignKey' => 'autor'
        )
    );

    public $validate = array(
        'titulo' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'É necessario um titulo'
            ),
            'between' => array(
                'rule'    => array('lengthBetween', 5, 60),
                'message' => 'Between 5 to 15 characters'
            )
        ),
        'Mensagem' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'É necessario um assunto'
            )
        ),
        'autor' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'É necessario um autor'
            )
        )
    );
}
?>