<?php

class AlbumController extends AppController {
    public $name = 'Album';
    public $helpers = array('Link');

    public function verAlbum($id=NULL) 
    {
        if($id!=NULL)
        {
            $this->Album->id = $id;
            $this->set("galeria",$this->Album->read());
        }
	}
    public function ver() 
    {
        $this->set("galerias",$this->Album->find("all"));
	}

    public function NovaFoto($id=NULL) 
    {
        $this->set("id",$id);
        if ($this->request->is('post')) {
            $this->request->data["Imagens"]["autor"] = AuthComponent::user('id');
            if ($this->Album->Imagens->save($this->request->data)) {
                $this->Session->setFlash("<script>alert('Imagem Enviada com sucesso :)')</script>");
                $this->redirect('/Album/VerAlbum/'.$this->request->data["Imagens"]["album_id"]);
            } else {
                $this->Session->setFlash("<script>alert('Erro ao Enviar Mensagem!')</script>");
            } 
        }
	}

    public function novo() {
        if(AuthComponent::user('privilegio') == 1)
        {
            if ($this->request->is('post')) {
                $this->request->data["Album"]["autor"] = AuthComponent::user('id');
                if ($this->Album->save($this->request->data)) {                    
                    $this->Session->setFlash("<script>alert('Album Criado Com Sucesso :)')</script>");
                    $this->redirect(array('action' => 'ver'));
                } else {
                    $this->Session->setFlash("<script>alert('Erro ao Cadastrar Novo Album!')</script>");
                }
            }
        }
    }
}

?>