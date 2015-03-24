<?php

class Torneio extends AppModel {
    public $name = 'Torneio';
    public $useTable = 'torneios';
    public $hasMany = array(
        'JogadorTorneio'
    );

    public $recursive = 2;
    public $hasAndBelongsToMany = array(
        'Jogador' =>
            array(
                'className' => 'Jogador',
                'joinTable' => 'jogadores_torneios',
                'foreignKey' => 'torneio_id',
                'associationForeignKey' => 'jogador_id'                
            )
    );

    public $validate = array(
        'nome' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A Name is required'
            )
        ),                
        'data' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A email is required'
            )
        ),                
        'cash' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A email is required'
            )
        )
    );
}

?>