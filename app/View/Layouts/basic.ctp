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
		echo $this->fetch('meta');
		echo $this->fetch('css');
	?>
    <?php
        echo $this->Html->script('/js/Features/jquery-2.1.3.min.js');    
        echo $this->Html->script('/js/Features/bootstrap.min.js');   
        echo $this->Html->script('/js/Features/bootstrap-datepicker.js');
        echo $this->Html->script('/js/Features/bootstrap-datepicker.pt-BR.js');       
        echo $this->Html->script('/js/k9streetpoker.js');    
        echo $this->fetch('script');
    ?>
    <link href='http://fonts.googleapis.com/css?family=Sanchez' rel='stylesheet' type='text/css'>
</head>
<body>
  <div id="container">
    <div id="content">
        <?php echo $this->Session->flash();
              echo $this->fetch('content'); ?>
    </div>
  </div>  
</body>
</html>
