<?php
class JogadoresController extends AppController {
    public $name = 'Jogador';

    public function login() {
        $this->layout = 'basic';
        if ($this->request->is('post')) {
            if($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());            
            } else {
                $this->Session->setFlash("<script>alert('Usuario ou senha invalido!')</script>");
            }
        }
    }

    public function getusers($name=NULL,$page=NULL) {
        if ($this->request->is('ajax')) {
            $this->layout = "ajax";
            $conditions = array("Jogador.nome LIKE" => "%{$name}%");
            $this->set('page', $page);
            $this->set('jogadores', $this->Jogador->find('all', array('conditions' => $conditions)));
        }
    }

    public function ver($id=NULL)
    {
        if($id!=NULL)
        {
            $this->Jogador->id = $id;
            $this->set('jogador', $this->Jogador->read());
        }
    }

    public function novo()
    {
        
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    public function beforeRender() {
	    parent::beforeRender();
    }

    public function beforeFilter() {
        parent::beforeFilter();
    }
}
?>