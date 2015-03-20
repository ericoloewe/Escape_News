<?php
class JogadorTorneio extends AppModel {
    public $name = 'JogadorTorneio';
    public $useTable = 'jogadores_torneios';
    public $belongsTo = array(
        'Jogador' => array(
            'className' => 'Jogador',
            'foreignKey' => 'id',
            'conditions' => array()
        ), 'Torneio' => array(
            'className' => 'Torneio',
            'foreignKey' => 'id',
            'conditions' => array()      
        )
    );

    public $validate = array(
        'jogador_id' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A Name is required'
            )
        ),                
        'torneio_id' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A email is required'
            )
        )
    );
}
?>
