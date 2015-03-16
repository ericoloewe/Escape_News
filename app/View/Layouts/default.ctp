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
  <title>
    K9StreetPoker
  </title>
  <?php
		echo $this->Html->meta(
            'kpoker.ico',
            '/app/webroot/img/kpoker.ico',
            array('type' => 'icon')
        );

		//echo $this->Html->css('cake.generic');
        echo $this->Html->css('default');
        echo $this->Html->css(array('/css/Features/bootstrap-theme.min','/css/Features/bootstrap.min'));
        echo $this->Html->css('/css/Pages/Main');
		echo $this->fetch('meta');
		echo $this->fetch('css');        
	?>    
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
                        <a class="navbar-brand" href="/">K9 STREET POKER</a>
                    </div>
                        <div id="navbar" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="/">Home</a></li>
                                <li class="dropdown">
                                    <a href="/jogadores/ver" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Jogadores<span class="caret"></span></a>
                                    <ul  class="dropdown-menu" role="menu">
                                        <li><a href="/jogadores/novo">Novo</a></li>
                                        <li><a href="/jogadores/editar">Editar</a></li>
                                        <li><a href="/jogadores/ver">Ver</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="/Torneios/view" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Torneios <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="/Torneios/novo">Novo</a></li>
                                        <li class="dropdown-submenu">
                                            <a tabindex="-1" href="/Torneios/editar">Editar</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="/Torneios/EditTablePlayers">Tabela Jogadores</a></li>
                                                <li><a href="/Torneios/editar">Torneios</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a tabindex="-1" href="/Torneios/ver">Ver</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="Home.php?u=/Tournament/TablePlayers">Tabela Jogadores</a></li>
                                                <li><a href="/Torneios/ver">Torneios</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="Home.php?u=/Users/Users" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Espaço K9<span class="caret"></span></a>
                                    <ul  class="dropdown-menu" role="menu">
                                        <li><a href="Home.php?u=/EspacoK9/Forum/Forum">Forum</a></li>
                                        <li><a href="Home.php?u=/EspacoK9/JogoAgora/JogoAgora">Jogo Agora</a></li>
                                    </ul>
                                </li>
                                <li><a href="/Contatos/View/">Contato</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a style="color:white"><?php echo $this->Session->read('Auth.User.nome'); ?></a>
                                </li>
                                <li>
                                    <a href="../../jogadores/logout">Sair</a>
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
    <?php
        echo $this->Html->script('/js/Features/jquery-2.1.3.min.js');    
        echo $this->Html->script('/js/Features/bootstrap.min.js');        
        echo $this->Html->script('/js/k9streetpoker.js');    
        echo $this->fetch('script');
    ?>
</body>
</html>
