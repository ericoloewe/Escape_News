<?php
class JogadoresTorneiosController extends AppController {
    public $name = 'JogadorTorneio';
    public $helpers = array('Link');
    
    public function verTabelaJogadores($id=NULL)
    {
        if($id!=NULL)
        {            
            $this->JogadorTorneio->Torneio->id = $id;
            $this->set('torneio', $this->getJogadores($id));
            $secoes = $this->JogadorTorneio->find("first",array(
                'conditions' => array(
                    'JogadorTorneio.torneio_id' => $id                    
                ),
                'fields' => array(                    
                        'MAX(JogadorTorneio.secao) as secao'
                )
            ));
            $this->set('secoes',$secoes);
            //Debugger::dump($this->getJogadores($id));
        }
    }

    private function getJogadores($id)
    {
        $i=0;
        $jogadoresTorneioPronto = $this->getTotalPontuacaoJogadores($id);
        $jogadoresTorneio = $this->JogadorTorneio->find('all', array(
                'conditions' => array(                                      
                    'JogadorTorneio.torneio_id' => $id                        
                )  
            )
        );
        foreach($jogadoresTorneioPronto as $jogadorP)
        {            
            foreach($jogadoresTorneio as $jogador)
            {
                if($jogador["JogadorTorneio"]["jogador_id"] == $jogadorP["JogadorTorneio"]["id"])
                {
                    $secao = $jogador["JogadorTorneio"]["secao"];
                    $jogadoresTorneioPronto[$i]["JogadorTorneio"]["secao"][$secao] = $jogador["JogadorTorneio"]["pontuacao"];
                    $jogadoresTorneioPronto[$i]["Jogador"] = $jogador["Jogador"];
                }
            }
            $i++;
        }
        $jogadoresTorneioPronto["Torneio"] = $jogadoresTorneio[0]["Torneio"];
        return $jogadoresTorneioPronto;
    }

    private function getTotalPontuacaoJogadores($id)
    {
        $jogadoresTorneio = $this->JogadorTorneio->find('all', array(
            'conditions' => array(
                'AND' => array(
                        "JogadorTorneio.secao" => '1',
                        'JogadorTorneio.torneio_id' => $id                        
                )  
            )
        ));
        foreach($jogadoresTorneio as $jogador)
        {
            $jogadoresTorneioPronto[] = $this->JogadorTorneio->find("first",
                array(
                'conditions' => array(
                    'AND' => array(
                        'JogadorTorneio.jogador_id' => $jogador["JogadorTorneio"]["jogador_id"],
                        'JogadorTorneio.torneio_id' => $id                        
                    )                    
                ),
                'fields' => array(
                    'JogadorTorneio.jogador_id as id',
                    'SUM(JogadorTorneio.pontuacao) as total'
                )
            ));
        }
        return $jogadoresTorneioPronto;
    }
}
?>