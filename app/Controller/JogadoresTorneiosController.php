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

    public function editarTabelaJogadores($id=NULL)
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
            $this->set('secoes',$secoes[0]["secao"]+1);
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