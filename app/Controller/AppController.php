<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    // Componentes utilizados por toda a aplicação
    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => '/',
            'logoutRedirect' => '/',
            'loginAction' => '/',            
            'authenticate' => array(
                'Form' => array(
                    'userModel' => 'Jogador',
                        'fields' => array(
                        'username' => 'email',
                        'password' => 'password'
                    )
                )
            )
        )
    );

    public function beforeFilter() {        
        // Mensagens de erro
        //$this->Auth->allow(array('controller' => 'contatos','action' => 'view'));        
        $this->Auth->loginError = __("<script>alert('Usuário e/ou senha incorreto(s)')</script>", true);
        $this->Auth->authError = __("<script>alert('Você precisa fazer login para acessar esta página')</script>", true);
    }

    public function beforeRender() {
        $this->set('user', $this->Auth->user());
        // In the views $user['User']['username'] would display the logged in users username
    }

    public function uploadFoto($userID){        
        $pasta = $_SERVER['DOCUMENT_ROOT']."/app/webroot/img/pics/";
        $nome_final = $userID.'.jpg';
        if(move_uploaded_file($_FILES['pic']['tmp_name'], $pasta . $nome_final))
            $ret=TRUE;
        else
            $ret=FALSE;
        return $ret;                    
    }    
}
