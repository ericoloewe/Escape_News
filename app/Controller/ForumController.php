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
            $this->Session->setFlash("<script>alert('Topico Cadastrado Com Sucesso :)')</script>");
            $this->somaUmaReply($this->request->data["ForumTopicos"]["forum_id"]);
            $this->redirect(array('action' => 'VerAssunto',$this->request->data["ForumTopicos"]["forum_id"]));
        } else {
            $this->Session->setFlash("<script>alert('Erro ao Cadastrar Novo Topico!')</script>");
        } 
    }

    public function verAssunto($id=NULL) 
    {
        $this->somaUmView($id);
        $this->Forum->id = $id;
        $this->set('forum', $this->Forum->read());        
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

    public function delete($id) {
        if(AuthComponent::user('privilegio') == 1){
            if (!$this->request->is('post')) {
                throw new MethodNotAllowedException();
            }
            if ($this->Forum->ForumTopicos->deleteAll(array("ForumTopicos.forum_id"=>$id),false)) {
                if ($this->Forum->delete($id)) {          
                    $this->Session->setFlash("<script>alert('O Forum com id: {$id} foi deletado com sucesso!')</script>");
                    $this->redirect('/');
                }
            }
        }
    }

    public function deleteTopico($id) {
        if(AuthComponent::user('privilegio') == 1){
            if (!$this->request->is('post')) 
            {
                throw new MethodNotAllowedException();
            }
            if ($this->Forum->ForumTopicos->delete($id)) 
            {     
                $this->Session->setFlash("<script>alert('O Topico com id: {$id} foi deletado com sucesso!')</script>");
                $this->redirect('/');
            }
        }
    }
}
?>