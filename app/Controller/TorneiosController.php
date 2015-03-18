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
    }
}
?>