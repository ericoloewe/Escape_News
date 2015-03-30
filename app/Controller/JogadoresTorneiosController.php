<?php
class JogadoresTorneiosController extends AppController {
    public $name = 'JogadorTorneio';
    
    public function verTabelaJogadores($id=NULL)
    {
        if($id!=NULL)
        {            
            $this->Torneio->id = $id;
            $this->set('torneio', $this->Torneio->read());
        }
    }
}
?>