<?php
class JogadoresTorneiosController extends AppController {
    public $name = 'JogadorTorneio';
    public $helpers = array('Link');
    
    public function verTabelaJogadores($id=NULL)
    {
        if($id!=NULL)
        {            
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

    public function getId()
    {        
        if ($this->request->is('ajax')) 
        {
            $this->layout = "ajax";
            $secao= $this->request->data('secao');
            $idjogador= $this->request->data('idjogador');
            $idtorneio= $this->request->data('idtorneio');            
            $id = $this->JogadorTorneio->findByJogadorIdAndTorneioIdAndSecao($idjogador,$idtorneio,$secao);
            $this->set('id',$id["JogadorTorneio"]["id"]);
        }
    }

    public function addSecaoTorneio()
    {
        if ($this->request->is('ajax')) 
        {
            $id  = $this->request->data('id');
            $this->layout = "ajax";
            $torneio = $this->JogadorTorneio->find("all",array(
                'conditions' => array(
                    'AND' => array(
                        'JogadorTorneio.secao' => 1,
                        'JogadorTorneio.torneio_id' => $id                        
                    )                    
                )
            ));         
            $secoes = $this->JogadorTorneio->find("first",array(
                'conditions' => array(
                    'JogadorTorneio.torneio_id' => $id                    
                ),
                'fields' => array(                    
                        'MAX(JogadorTorneio.secao) as secao'
                )
            ));
            $secao = $secoes[0]["secao"]+1;
            $i = 0;
            foreach($torneio as $jogador)
            {
                $jogador_torneio["JogadorTorneio"][$i]["secao"] = $secao;
                $jogador_torneio["JogadorTorneio"][$i]["torneio_id"] = $id;
                $jogador_torneio["JogadorTorneio"][$i]["jogador_id"] = $jogador["Jogador"]["id"];
                $i++;
            }
            $this->JogadorTorneio->saveAll($jogador_torneio["JogadorTorneio"]);
        }
    }

    public function editarTabelaJogadores($id=NULL)
    {
        if($id!=NULL&&(AuthComponent::user('privilegio') == 1))
        {            
            $this->set('torneio', $this->getJogadores($id));
            $secoes = $this->JogadorTorneio->find("first",array(
                'conditions' => array(
                    'JogadorTorneio.torneio_id' => $id                    
                ),
                'fields' => array(                    
                        'MAX(JogadorTorneio.secao) as secao'
                )
            ));
            $this->set('secoes',$secoes[0]["secao"]+1);
            //Debugger::dump($this->getJogadores($id));
        }
    }

    public function editarPontuacaoSecao()
    {
        if ($this->request->is('ajax')) 
        {
            $this->layout = "ajax";
            $id = $this->request->data('id');
            $pontuacao = $this->request->data('pontuacao');
            $this->JogadorTorneio->id = $id;
            $this->JogadorTorneio->save(array('JogadorTorneio'=>array('pontuacao' => $pontuacao)));
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
                    $jogadoresTorneioPronto[$i]["JogadorTorneio"]["ids"][$secao] = $jogador["JogadorTorneio"]["id"];
                    $jogadoresTorneioPronto[$i]["Jogador"] = $jogador["Jogador"];
                }
            }
            $i++;
        }
        $jogadoresTorneioPronto = $this->quickSort($jogadoresTorneioPronto);
        $jogadoresTorneioPronto["Torneio"] = $jogadoresTorneio[0]["Torneio"];
        return $jogadoresTorneioPronto;
    }

    private function quickSort($array)
    {        
        // find array size
	    $length = count($array);
	
	    // base case test, if array of length 0 then just return array to caller
	    if($length <= 1){
		    return $array;
	    }
	    else{
	
		    // select an item to act as our pivot point, since list is unsorted first position is easiest
		    $pivot = $array[0];
		
		    // declare our two arrays to act as partitions
		    $left = $right = array();
		
		    // loop and compare each item in the array to the pivot value, place item in appropriate partition
		    for($i = 1; $i < $length; $i++)
		    {
			    if($array[$i][0]["total"] > $pivot[0]["total"]){
				    $left[] = $array[$i];
			    }
			    else{
				    $right[] = $array[$i];
			    }
		    }
		
		    // use recursion to now sort the left and right lists
		    return array_merge($this->quickSort($left), array($pivot), $this->quickSort($right));
	    }
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