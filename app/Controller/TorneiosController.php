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

    public function gettorneios($name=NULL,$page=NULL,$type=NULL,$controller='Torneios') {
        if ($this->request->is('ajax')) {
            $this->layout = "ajax";
            $conditions = array("Torneio.{$type} LIKE" => "%{$name}%");
            $this->set('page', $page);
            $this->set('controller', $controller);
            $this->set('torneios', $this->Torneio->find('all', array('conditions' => $conditions)));
        }
    }

    public function addJogadorTorneio() {
        if ($this->request->is('ajax')) {
            $idjogador = $this->request->data('idjogador');
            $idtorneio = $this->request->data('idtorneio');
            $this->layout = "ajax";
            $secoes = $this->Torneio->JogadorTorneio->find("first",array(
                'conditions' => array(
                    'JogadorTorneio.torneio_id' => $idtorneio                  
                ),
                'fields' => array(                    
                        'MAX(JogadorTorneio.secao) as secao'
                )
            ));
            $secao = $secoes[0]["secao"];            
            for($i=1;$i<=$secao;$i++)
            {
                $this->Torneio->JogadorTorneio->saveAll(array('JogadorTorneio'=>array('jogador_id' => $idjogador,'torneio_id' => $idtorneio,'secao'=>$i)));
            }
        }
    }

    public function delJogadorTorneio() {
        if ($this->request->is('ajax')) {
            $idjogador = $this->request->data('idjogador');
            $idtorneio = $this->request->data('idtorneio');
            $this->layout = "ajax";            
            $ids = $this->Torneio->JogadorTorneio->find('all', array(
                'conditions' => array(
                    'AND' => array(
                        'JogadorTorneio.jogador_id' => $idjogador,
                        'JogadorTorneio.torneio_id' => $idtorneio
                    )
                )
            ));
            foreach($ids as $id)
            {
                $this->Torneio->JogadorTorneio->delete($id["JogadorTorneio"]["id"]);
            }            
        }
    }

    public function delete($id) {
        if(AuthComponent::user('privilegio') == 1){
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
    }

    public function editar($id=NULL)
    {
        if($id!=NULL&&(AuthComponent::user('privilegio') == 1))
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
        if(AuthComponent::user('privilegio') == 1)
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
}
?>