<?php
App::uses('File', 'Utility');    

class UsuariosController extends AppController {
    public $name = 'Usuario';

    public function login() 
    {
        $this->layout = 'basic';
        if ($this->request->is('post')) {
            if($this->Auth->login()) {
                if($this->ehSenhaPadrao())
                {
                    $_SESSION['Auth']['User']["password"] = TRUE;
                    $this->redirect("/");
                } else {
                    $this->redirect($this->Auth->redirect());
                }                
            } else {
                $this->Session->setFlash("<script>alert('Usuario ou senha invalido!')</script>");
            }
        }
    }

    private function ehSenhaPadrao()
    {        $this->Usuario->id = AuthComponent::user('id');        $Usuario = $this->Usuario->read();        if($Usuario["Usuario"]["password"]=="4e90a6d11472466c5ae6093846234d7487b9b2ca")            return TRUE;        else            return FALSE;    }

    public function editarFoto()
    {
        
    } 

    public function preferencias()
    {
        
    }

    public function editarSenha() 
    {
        $this->layout = 'basic';
        if ($this->request->is('post'))
        {
            $this->Usuario->id = AuthComponent::user('id');
            $Usuario = $this->Usuario->read();
            if($this->Auth->password($this->request->data["Usuario"]["old_password"]) == $Usuario["Usuario"]["password"])
            {
                if($this->request->data["Usuario"]["password"]==$this->request->data["Usuario"]["retype_password"])
                {
                    if(strlen($this->request->data["Usuario"]["password"])>=6)
                    {
                        $this->request->data["Usuario"]["id"] = AuthComponent::user('id');
                        if ($this->Usuario->save($this->request->data)) 
                        {
                            $this->Session->setFlash("<script>alert('A senha foi atualizada')</script>");
                            unset($_SESSION['Auth']['User']["password"]);
                            $this->redirect('/');
                        } else $this->Session->setFlash("<script>alert('Erro ao atualizar Usuario')</script>");
                    } else {
                        $this->Session->setFlash("<script>alert('Senha muito curta!\\nDigite uma senha com 6 ou mais caracteres.')</script>");
                    }
                } else {
                    $this->Session->setFlash("<script>alert('Senhas não combinam')</script>");
                } 
            } else {
                $this->Session->setFlash("<script>alert('Senha atual incorreta')</script>");
            }
        }
    }

    public function getusers($name=NULL,$page=NULL) 
    {
        if ($this->request->is('ajax')) {
            $this->layout = "ajax";
            $conditions = array("Usuario.nome LIKE" => "%{$name}%");
            $this->set('page', $page);
            $this->set('usuarios', $this->Usuario->find('all', array('conditions' => $conditions)));
        }
    }

    public function editar($id=NULL)
    {
        if($id!=NULL&&(AuthComponent::user('privilegio') == 1))
        {
            $this->Usuario->id = $id;
            $this->set('Usuario', $this->Usuario->read('id'));        
            if ($this->request->is('get')) {
                $this->request->data = $this->Usuario->read();                
            } else {
                if ($this->Usuario->save($this->request->data)) {
                    if($_FILES['pic']['error']!=4&&isset($_FILES['pic'])) {                       
                        if(!$this->uploadFoto($id))
                            $this->Session->setFlash("<script>alert('Erro ao subir imagem no servidor!')</script>");
                    }
                    $this->Session->setFlash("<script>alert('O Usuario foi atualizado')</script>");
                    $this->redirect(array('action' => 'ver',$id));
                }
            }            
        }
    }

    public function delete($id) {
        if(AuthComponent::user('privilegio') == 1)
        {
            if (!$this->request->is('post')) {
                throw new MethodNotAllowedException();
            }
            if ($this->Usuario->delete($id)) {
                if ($this->Usuario->UsuarioTorneio->deleteAll(array("UsuarioTorneio.Usuario_id"=>$id),false)){
                    $file = new File(WWW_ROOT."img".DS."pics".DS.$id.".jpg");
                    if($file->exists()) $file->delete();
                    $file->close();
                    $this->Session->setFlash("<script>alert('O Usuario com id: {$id} foi deletado com sucesso!')</script>");
                    $this->redirect('/');
                }
            }
        }
    }

    public function ver($id=NULL)
    {
        if($id!=NULL)
        {
            $this->Usuario->id = $id;
            $this->set('Usuario', $this->Usuario->read());
        }
    }

    public function novo()
    {
        $this->layout = 'basic';
        if ($this->request->is('post')) {
            if($this->request->data["Usuario"]["password"]==$this->request->data["Usuario"]["retype_password"])
            {
                if(strlen($this->request->data["Usuario"]["password"])>=6)
                {
                    if ($this->Usuario->save($this->request->data)) {
                        if($_FILES['pic']['error']!=4&&isset($_FILES['pic'])) {
                            $conditions = array("Usuario.email LIKE" => "{$this->request->data['Usuario']['email']}");
                            $Usuario = $this->Usuario->find('all', array('conditions' => $conditions,'limit' => 1));
                            if(!$this->uploadFoto($Usuario[0]["Usuario"]["id"]))
                                $this->Session->setFlash("<script>alert('Erro ao subir imagem no servidor!')</script>");
                        }
                        $this->Session->setFlash("<script>alert('Usuario Cadastrado Com Sucesso :)')</script>");
                        $this->redirect('/');
                    } else {
                        $this->Session->setFlash("<script>alert('Erro ao Cadastrar Novo Usuario!')</script>");
                    }    
                } else {
                    $this->Session->setFlash("<script>alert('Senha muito curta!\\nDigite uma senha com 6 ou mais caracteres.')</script>");
                }
            } else {
                $this->Session->setFlash("<script>alert('Senhas não combinam')</script>");
            }                                 
        }
    }

    public function uploadFoto($id)
    {
        parent::uploadFoto($id);
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    public function beforeRender() {
	    parent::beforeRender();
    }

    public function beforeFilter() {        
        parent::beforeFilter();
        $this->Auth->allow('novo','usuario'); // Permitindo que os usuários se registrem
    }
}
?>