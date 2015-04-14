<?php
class ForumController extends AppController {
    public $name = 'Forum';

    public function ver() {
        $this->set('forum', $this->Forum->find("all"));
        //Debugger::dump($this->Forum->find("all"));
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

    public function VerAssunto($id=NULL) 
    {
        $this->Forum->id = $id;
        $this->set('forum', $this->Forum->read());        
	}
}
?>