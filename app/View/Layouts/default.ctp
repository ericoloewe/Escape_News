<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
    Escape News
    </title>
  <?php
		echo $this->Html->meta(
            'escape.ico',
            '/app/webroot/img/escape.ico',
            array('type' => 'icon')
        );

		//echo $this->Html->css('cake.generic');
        echo $this->Html->css('default');
        echo $this->Html->css(array('/css/Features/bootstrap-theme.min','/css/Features/bootstrap.min'));
        echo $this->Html->css('/css/Pages/Main');
		echo $this->fetch('meta');
		echo $this->fetch('css');        
	?>
    <?php
        echo $this->Html->script('/js/Features/jquery-2.1.3.min.js');    
        echo $this->Html->script('/js/Features/bootstrap.min.js');     
        echo $this->Html->script('/js/escapenews.js');    
        echo $this->fetch('script');
    ?>
    <link href='http://fonts.googleapis.com/css?family=Sanchez' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class="navbar-wrapper">
        <div class="container">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/">Escape News</a>
                    </div>
                        <div id="navbar" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="/Noticias/Ver">Home</a></li>
                                <li class="dropdown">
                                    <a href="/Usuarios/Ver" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Usuarios<span class="caret"></span></a>
                                    <ul  class="dropdown-menu" role="menu">
                                        <?php if($this->Session->read('Auth.User.privilegio') == 1): ?>
                                        <li><a href="/Usuarios/Novo">Novo</a></li>
                                        <li><a href="/Usuarios/Editar">Editar</a></li>
                                        <?php endif; ?>
                                        <li><a href="/Usuarios/Ver">Ver</a></li>
                                    </ul>
                                </li>
                                <li><a href="/Contatos/View/">Contato</a></li>
                                <li><a href="/Pages/Sobre/">Sobre</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <img src="/app/webroot/img/pics/<?php echo $this->Session->read('Auth.User.id'); ?>.jpg" style="max-width: 19px; max-height: 19px; margin: -5px 10px 0 0;"/>
                                        <?php echo $this->Session->read('Auth.User.nome'); ?>
                                        <span class="caret"></span>
                                    </a>
                                    <ul  class="dropdown-menu" role="menu">
                                        <li class="dropdown-submenu">
                                            <a tabindex="-1" href="/Usuarios/Preferencias"><i class="glyphicon glyphicon-cog"></i>  Preferências</a>
                                            <ul class="dropdown-menu">                                                
                                                <li>
                                                    <a href="/Usuarios/EditarSenha">Editar Senha</a>
                                                </li>
                                                <li>
                                                    <a href="/Usuarios/EditarFoto">Editar Foto</a>
                                                </li>          
                                            </ul>
                                        </li>
                                    </ul>                                    
                                </li>
                                <li>
                                    <a href="../../Usuarios/logout">Sair</a>
                                </li>
                            </ul>
                        </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="container">
    <div class="content">
          <?php echo $this->Session->flash();
                echo $this->fetch('content'); ?>
    </div>
    </div>
    <footer>
        <p>© 2015 Escape News - Todos os direitos reservados<a style="float: right; text-decoration: none; color: #808080;">Érico de Souza Loewe</a></p>
    </footer>
</body>
</html>