<?php
class JogadorTorneio extends AppModel {
    public $name = 'JogadorTorneio';
    public $useTable = 'jogadores_torneios';
    public $belongsTo = array(
        'Jogador', 'Torneio'
    );

    public $validate = array(
        'jogador' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A Name is required'
            )
        ),                
        'torneio' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A email is required'
            )
        )
    );
}
?>
