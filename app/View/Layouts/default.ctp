<?php
/**
 *
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
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

//$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php //echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php //echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
                        <p style="text-align:right;margin: O auto;">
                        <?php 
                        echo "<div>";
                        if($this->Session->check('Usuario'))
                        
                        {
                        echo "<ul id=\"button\">";
                        echo "<li>";
                        echo $this->Html->link('Ingreso OT ', '/ordenes/add');
                        echo "</li>";
                        echo "<li>";
                        echo $this->Html->link('Ingreso Usuario ', '/usuarios/index');
                        echo "</li>";
                        echo "<li>";
                        echo $this->Html->link('Ingreso Cliente ', '/clientes/index');
                        echo "</li>";
                        echo "<li>";
                        echo $this->Html->link('Ingreso Areas ', '/areas/index');
                        echo "</li>";
                        echo "<li>";
                        echo $this->Html->link('Listado OT', '/ordenes/index');
                        echo "</li>";

                            echo "<li>";
                            echo $this->Html->link('Salir', '/usuarios/logout', array('class' => 'submit'));
                            echo "</li>";
                            //echo $this->Session->flash('flash', array(
  //  'params' => array('name' => $user['Usuario']['nombre'])
//));

                            
                       
                        }
                        //Debugger::dump($this->Session->check('Auth.User'));
                        echo "</div>";
                        echo "</div>";
                        ?>    
                            
                        
                        </p>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php /*echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false) 
				);*/
			?>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
