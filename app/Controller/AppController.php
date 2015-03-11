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
            ),
        )
    );

    public function beforeFilter() {        
        // Mensagens de erro
        $this->Auth->loginError = __('Usuário e/ou senha incorreto(s)', true);
        $this->Auth->authError = __('Você precisa fazer login para acessar esta página', true);
    }

    public function beforeRender() {
        $this->set('user', $this->Auth->user());
        // In the views $user['User']['username'] would display the logged in users username
    }

    protected function uploadFile($userID){
        $response;
        // Tamanho máximo do arquivo (em Bytes)
        $_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
        // Array com as extensões permitidas
        $_UP['extensoes'] = array('jpg', 'png', 'gif','jpeg');
        $_UP['pasta'] = $_SERVER['DOCUMENT_ROOT']."/app/webroot/img/pics/";

        // Array com os tipos de erros de upload do PHP
        $_UP['erros'][0] = 'Não houve erro';
        $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
        $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
        $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
        $_UP['erros'][4] = 'Não foi feito o upload do arquivo';

        // Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
        if ($_FILES['InputFile']['error'] != 0) 
        {
            $response .="Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['InputFile']['error']];
            exit; // Para a execução do script
        }

         // Faz a verificação da extensão do arquivo
        $extensao = strtolower(end(explode('.', $_FILES['InputFile']['name'])));
        if (array_search($extensao, $_UP['extensoes']) === false) {
            $response .= "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
        }
        // Faz a verificação do tamanho do arquivo
        else if ($_UP['tamanho'] < $_FILES['InputFile']['size']) {
            $response .= "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
        }
        // O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
        else {
            // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
            $nome_final = $userID.'.jpg';

            // Depois verifica se é possível mover o arquivo para a pasta escolhida
            if (move_uploaded_file($_FILES['InputFile']['tmp_name'], $_UP['pasta'] . $nome_final)) {
                // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
                $response .= "Upload efetuado com sucesso!";
                $response .= $_UP['pasta'] . $nome_final;
                //$response .= '<br /><a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
            } else {
                // Não foi possível fazer o upload, provavelmente a pasta está incorreta
                $response .= "Não foi possível enviar o arquivo".$_UP['pasta']. $nome_final .", tente novamente";
            }
        }
        return $response;      
    }
}
