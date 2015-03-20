<?php
class TorneiosController extends AppController {
    public $name = 'Torneio';
    
    public function ver($id=NULL)
    {
        if($id!=NULL)
        {                   
            $this->set('torneio', $this->Torneio->JogadorTorneio->findAllByTorneio_id($id));
        }
    }

    public function gettorneios($name=NULL,$page=NULL,$type=NULL) {
        if ($this->request->is('ajax')) {
            $this->layout = "ajax";
            $conditions = array("Torneio.{$type} LIKE" => "%{$name}%");
            $this->set('page', $page);
            $this->set('torneios', $this->Torneio->find('all', array('conditions' => $conditions)));
        }
    }

    public function editar(){
        
    }

    public function novo()
    {
        $this->set('jogadores', $this->Torneio->JogadorTorneio->Jogador->find("all"));
        if ($this->request->is('post')) { 
            $user = $this->Torneio->saveAll($this->request->data);
            $this->request->data['JogadorTorneio']['torneio_id'] = $this->Torneio->id;
            if ($this->Torneio->JogadorTorneio->save($this->request->data)) {
                $this->Session->setFlash("<script>alert('Torneio Cadastrado Com Sucesso :)')</script>");
                $this->redirect(array('action' => 'novo'));
                //Debugger::dump($this->request->data);
            } else {
                $this->Session->setFlash("<script>alert('Erro ao Cadastrar Novo Torneio!')</script>");
            }
        }
    }
}
?>