<?php
class ForumController extends AppController {
    public $name = 'Forum';
    public $helpers = array('Link');

    public function ver() {
        $this->set('forum', $this->Forum->find("all"));
        $teste =$this->Forum->find("all");
        //Debugger::dump($teste);
    }

    public function novo($id=NULL) {
        if(AuthComponent::user('privilegio') == 1)
        {
            if ($this->request->is('post')) {
                $this->request->data["Forum"]["autor"] = AuthComponent::user('id');
                if ($this->Forum->save($this->request->data)) {                    
                    $this->Session->setFlash("<script>alert('Forum Criado Com Sucesso :)')</script>");
                    $this->redirect(array('action' => 'ver'));
                } else {
                    $this->Session->setFlash("<script>alert('Erro ao Cadastrar Novo Forum!')</script>");
                }
            }
        }
    }

    public function novoTopico() 
    {
        if ($this->Forum->ForumTopicos->save($this->request->data)) {
            $this->atualizarUltimoPost($this->request->data["ForumTopicos"]["forum_id"]);
            $this->Session->setFlash("<script>alert('Mensagem Enviada com sucesso :)')</script>");
            $this->somaUmaReply($this->request->data["ForumTopicos"]["forum_id"]);
            $this->redirect(array('action' => 'VerAssunto',$this->request->data["ForumTopicos"]["forum_id"],1));
        } else {
            $this->Session->setFlash("<script>alert('Erro ao Enviar Mensagem!')</script>");
        } 
    }

    private function atualizarUltimoPost($id)
    {
        $this->Forum->id = $id;
        $forum = $this->Forum->read();
        $forum["Forum"]["ultimoPost"] = date("Y-m-d H:i:s");
        $this->Forum->save($forum["Forum"]);
    }

    public function verAssunto($id=NULL,$page=1) 
    {
        $this->somaUmView($id);
        $this->Forum->id = $id;
        $forum = $this->Forum->read();
        $maxPages = (count($forum["ForumTopicos"])/10);
        if(!is_int($maxPages))
            $maxPages++;
        if($page==$maxPages) 
            $prox=$maxPages; 
        else 
            $prox = $page+1;
        if($page<=1) 
            $ant=1; 
        else 
            $ant = $page-1;
        if(!empty($forum["ForumTopicos"]))
            $forum = $this->getTopicosDaPag($forum,$page);
        $this->set('forum', $forum);        
        $this->set('pagAtual', $page);
        $this->set('prox', $prox);
        $this->set('anterior', $ant);
        $this->set('maxPages', $maxPages);
	}

    private function getTopicosDaPag($forum,$page)
    {
        $page--;
        for($i=($page*10);$i<=($page*10)+10&&!empty($forum["ForumTopicos"][$i]);$i++)
        {
            $forumTopicos[] = $forum["ForumTopicos"][$i];
        }
        $forum["ForumTopicos"] = $forumTopicos;
        return $forum;
    }

    private function somaUmView($id)
    {
        $this->Forum->id = $id;
        $forum = $this->Forum->read();
        $forum["Forum"]["visualizacoes"] = $forum["Forum"]["visualizacoes"]+1;
        $this->Forum->save($forum["Forum"]);
    }

    private function somaUmaReply($id)
    {
        $this->Forum->id = $id;
        $forum = $this->Forum->read();
        $forum["Forum"]["respostas"] = $forum["Forum"]["respostas"]+1;
        $this->Forum->save($forum["Forum"]);
    }

    private function subtraiUmaReply($id)
    {
        $this->Forum->id = $id;
        $forum = $this->Forum->read();
        $forum["Forum"]["respostas"] = $forum["Forum"]["respostas"]-1;
        $this->Forum->save($forum["Forum"]);
    }    

    public function delete($id) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Forum->ForumTopicos->deleteAll(array("ForumTopicos.forum_id"=>$id),false)) {
            if ($this->Forum->delete($id)) {          
                $this->Session->setFlash("<script>alert('O Forum com id: {$id} foi deletado com sucesso!')</script>");
                $this->redirect('/Forum/Ver');
            }
        }
    }

    public function deleteTopico($id,$idforum) {
        if (!$this->request->is('post')) 
        {
            throw new MethodNotAllowedException();
        }
        if ($this->Forum->ForumTopicos->delete($id)) 
        {     
            $this->subtraiUmaReply($idforum);
            $this->Session->setFlash("<script>alert('O Topico com id: {$id} foi deletado com sucesso!')</script>");
            $this->redirect('/Forum/VerAssunto/'.$idforum);
        }
    }

    public function editar($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $forum = $this->Forum->findById($id);
        if (!$forum) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Forum->id = $id;
            if ($this->Forum->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been updated.'));
                return $this->redirect('/Forum/Ver');
            }
            $this->Session->setFlash(__('Unable to update your post.'));
        }

        if (!$this->request->data) {
            $this->request->data = $forum;
        }
    }

    public function editarTopicos($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $forum = $this->Forum->ForumTopicos->findById($id);
        if (!$forum) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Forum->ForumTopicos->id = $id;
            if ($this->Forum->ForumTopicos->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been updated.'));
                return $this->redirect('/Forum/Ver');
            }
            $this->Session->setFlash(__('Unable to update your post.'));
        }

        if (!$this->request->data) {
            $this->request->data = $forum;
        }
    }
}
?>