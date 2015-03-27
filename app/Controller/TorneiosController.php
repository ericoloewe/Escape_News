<?php
class TorneiosController extends AppController {
    public $name = 'Torneio';
    
    public function ver($id=NULL)
    {
        if($id!=NULL)
        {
            $torneios = $this->Torneio->find('all', array(
                'conditions' => array(
                    'Torneio.id' => $id
                )
            ));
            $this->set('torneio', $torneios);            
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

    public function addJogadorTorneio() {
        if ($this->request->is('ajax')) {
            $idjogador = $this->request->data('idjogador');
            $idtorneio = $this->request->data('idtorneio');
            $this->layout = "ajax";
            $this->Torneio->JogadorTorneio->save(array('JogadorTorneio'=>array('jogador_id' => $idjogador,'torneio_id' => $idtorneio)));              
        }
    }

    public function delJogadorTorneio() {
        if ($this->request->is('ajax')) {
            $idjogador = $this->request->data('idjogador');
            $idtorneio = $this->request->data('idtorneio');
            $this->layout = "ajax";            
            $id = $this->Torneio->JogadorTorneio->find('first', array(
                'conditions' => array(
                    'AND' => array(
                        'JogadorTorneio.jogador_id' => $idjogador,
                        'JogadorTorneio.torneio_id' => $idtorneio
                    )
                )
            ));
            $this->Torneio->JogadorTorneio->delete($id["JogadorTorneio"]["id"]);         
        }
    }

    public function delete($id) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Torneio->JogadorTorneio->deleteAll(array("JogadorTorneio.torneio_id"=>$id),false)) {
            if ($this->Torneio->delete($id)) {          
                $this->Session->setFlash("<script>alert('O Torneio com id: {$id} foi deletado com sucesso!')</script>");
                $this->redirect('/');
            }
        }
    }

    public function editar($id=NULL)
    {
        if($id!=NULL)
        {            
            $this->Torneio->id = $id;
            $this->set('torneio', $this->Torneio->read());
            $this->set('jogadoresForadoTorneio', $this->jogadoresForadoTorneio($id));
            if ($this->request->is('get')) {
                  $this->request->data = $this->Torneio->read();
            } else {                
                $this->request->data['JogadorTorneio']['torneio_id'] = $id;
                if ($this->Torneio->save($this->request->data)) {
                    $this->Session->setFlash("<script>alert('Torneio Atualizado Com Sucesso :)')</script>");
                    $this->redirect(array('action' => 'ver',$id));
                } else {
                    $this->Session->setFlash("<script>alert('Erro ao Atualizar Novo Torneio!')</script>");
                }
                //Debugger::dump($this->request->data);
            }
        }
    }

    private function jogadoresForadoTorneio($id)
    {
        $jogadoresForadoTorneio = NULL;
        $jogadores = $this->Torneio->Jogador->find('all');
        $this->Torneio->id = $id;
        $jogadoresTorneio = $this->Torneio->read();
        foreach($jogadores as $jogador)
        {
            $jogadorFora = TRUE;     
            foreach($jogadoresTorneio['Jogador'] as $jogadorTorneio)
            {
                if($jogador['Jogador']['id'] == $jogadorTorneio["id"])
                    $jogadorFora = FALSE;
            }
            if($jogadorFora)
                $jogadoresForadoTorneio[] = $jogador['Jogador'];
        }        
        return $jogadoresForadoTorneio;
    }

    public function novo()
    {
        $this->set('jogadores', $this->Torneio->Jogador->find("all"));
        if ($this->request->is('post')) { 
            $user = $this->Torneio->saveAll($this->request->data);
            $this->request->data['JogadorTorneio']['torneio_id'] = $this->Torneio->id;
            if ($this->Torneio->JogadorTorneio->save($this->request->data)) {
                $this->Session->setFlash("<script>alert('Torneio Cadastrado Com Sucesso :)')</script>");
                $this->redirect(array('action' => 'ver',$this->Torneio->id));
                //Debugger::dump($this->request->data);
            } else {
                $this->Session->setFlash("<script>alert('Erro ao Cadastrar Novo Torneio!')</script>");
            }
        }
    }
}
?>