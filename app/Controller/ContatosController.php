<?php

class ContatosController extends AppController {
    public function view() {
        if(!$this->Session->read('Auth.User'))
            $this->layout = 'basic';
	}

    public function save()
    {
        if ($this->request->is('post')) {
            if ($this->Contato->save($this->request->data)) {
                $this->Session->setFlash("<script>alert('Sua mensagem foi salva com sucesso :)')</script>");
                $this->redirect('/');
            } else {
                $this->Session->setFlash("<script>alert('Sua mensagem não foi salva, tente novamente!')</script>");
            }
        }
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('save','contato'); // Permitindo que os usuários se registrem
    }
}

?>