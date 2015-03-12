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
        if ($this->request->is('post')) {            
            if ($this->Jogador->save($this->request->data)) {
                if($_FILES['InputFile']['error']!=4&&isset($_FILES['InputFile'])) {
                    $conditions = array("Jogador.email LIKE" => "{$this->request->data['Jogador']['email']}");
                    $jogador = $this->Jogador->find('all', array('conditions' => $conditions,'limit' => 1));
                    $this->uploadFile($jogador[0]["Jogador"]["id"]);
                } else $this->Session->setFlash("<script>alert('Erro ao subir imagem no servidor!')</script>");                
                $this->Session->setFlash("<script>alert('Jogador Cadastrado Com Sucesso :)')</script>");
                $this->redirect(array('action' => 'novo'));
            } else {
                $this->Session->setFlash("<script>alert('Erro ao Cadastrar Novo Usuario!')</script>");
            }                        
        }
    }

    public function uploadFile($file)
    {
        parent::uploadFile($file);
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