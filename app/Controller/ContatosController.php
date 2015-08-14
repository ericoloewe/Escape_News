<?php
App::uses('CakeEmail', 'Network/Email');
class ContatosController extends AppController {
    public function view() {
        if(!$this->Session->read('Auth.User'))
            $this->layout = 'basic';
	}

    public function save()
    {        
        $assunto = $this->request->data["Contato"]['assunto'];
        $mail = $this->request->data["Contato"]['email'];
        $nome = $this->request->data["Contato"]['nome'];
        $mensagem = $this->request->data["Contato"]['mensagem'];
        if ($this->request->is('post')) {
            if ($this->Contato->save($this->request->data)) {
                $Email = new CakeEmail();
                $Email->config('default');
                $Email->from(array('0118340@feevale.br' => 'Diretor do Escape News'))
                    ->to("0118340@feevale.br")
                    ->cc($mail)
                    ->subject("Contato com Escape News de ".$nome.". Assunto: ".$assunto)
                    ->send($mensagem);
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