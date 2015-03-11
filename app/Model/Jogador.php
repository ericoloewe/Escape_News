<?php
    
App::uses('AuthComponent', 'Controller/Component');

class Jogador extends AppModel {
    public $name = 'Jogador';
    public $useTable = 'jogadores';

    public $validate = array(
        'nome' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A Name is required'
            )
        ),                
        'email' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A email is required'
            )
        ),
        'privilegio' => array(
            'valid' => array(
                'rule' => array('inList', array(1, 2)),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )   
    );
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }
}

?>