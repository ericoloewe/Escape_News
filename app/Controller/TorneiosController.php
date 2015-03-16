<?php
class TorneiosController extends AppController {
    public $name = 'Torneio';
    var $scaffold;
    public function ver($id=NULL)
    {
        if($id!=NULL)
        {
            $this->Torneio->id = $id;
            $this->set('torneio', $this->Jogador->read());
        }
    }

    public function editar(){
        
    }

    public function novo(){
        
    }
}
?>