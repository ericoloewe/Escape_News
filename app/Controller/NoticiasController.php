<?php
class NoticiasController extends AppController {
    public function Ver() {
        $noticias = $this->Noticia->find("all");
        if(isset($noticias))
        {
            for($i=count($noticias)-1;$i>=count($noticias)-5;$i--)
            {
                if(isset($noticias[$i]))
                    $noticia[] = $noticias[$i];
            }
            if(isset($noticia))
                $this->set("noticias",$noticia);
        }
	}

    public function getTopicos($indice) {
        $this->layout = "ajax";
        $noticias = $this->Noticia->find("all");
        $i=(count($noticias)-1)-5*$indice;
        for(;$i>=count($noticias)-5-(5*$indice);$i--)
        {
            if(isset($noticias[$i]))
                $noticia[] = $noticias[$i];
        }
        if(isset($noticia))
        {
            $this->set("noticias",$noticia);
            $this->set("indice",$indice+1);
        }
    }

    public function delete($id) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Noticia->delete($id)) {          
            $this->Session->setFlash("<script>alert('A noticia foi deletada com sucesso!')</script>");
            $this->redirect('/Noticias/Ver');
        }
    }

    public function nova() {
        if(AuthComponent::user('privilegio') == 1)
        {
            if ($this->request->is('post')) {
                $this->request->data["Noticia"]["autor"] = AuthComponent::user('id');
                if(!empty($this->request->data["Noticia"]["titulo"][0]))
                    $this->request->data["Noticia"]["titulo"][0] = strtoupper($this->request->data["Noticia"]["titulo"][0]);
                if ($this->Noticia->save($this->request->data)) {                    
                    $this->Session->setFlash("<script>alert('Noticia Postada Com Sucesso :)')</script>");
                    $this->redirect(array('action' => 'ver'));
                } else {
                    $this->Session->setFlash("<script>alert('Erro ao Cadastrar Nova Noticia!')</script>");
                }
            }
        }
	}

    public function editar($id=NULL) 
    {
        if($id!=NULL && (AuthComponent::user('privilegio') == 1))
        {
            if ($this->request->is('get')) {
                $this->Noticia->id = $id;
                $this->request->data = $this->Noticia->read();
            } else {                
                $this->request->data["Noticia"]["autor"] = AuthComponent::user('id');
                if(!empty($this->request->data["Noticia"]["titulo"][0]))
                    $this->request->data["Noticia"]["titulo"][0] = strtoupper($this->request->data["Noticia"]["titulo"][0]);
                if ($this->Noticia->save($this->request->data)) {                    
                    $this->Session->setFlash("<script>alert('Noticia Atualizada Com Sucesso :)')</script>");
                    $this->redirect(array('action' => 'ver'));
                } else {
                    $this->Session->setFlash("<script>alert('Erro ao Atualizar Noticia!')</script>");
                }
                //Debugger::dump($this->request->data);
            }
        }
	}
}
?>