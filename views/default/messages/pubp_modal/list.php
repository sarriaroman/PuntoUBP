<?php

	/**
	 * Elgg list system messages
	 * Lists system messages
	 * 
	 * @package Elgg
	 * @subpackage Core
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.org/
	 * 
	 * @uses $vars['object'] An array of system messages
	 *
	 * <?php echo $vars['url']; ?>views/default/messages/pubp/
	 *
	 */
	 
	 ?>
     
     <!-- Dependencies -->
	<script type="text/javascript" src="<?php echo $vars['url']; ?>views/default/messages/pubp_modal/modal/lib/prototype.js"></script>
	<script type="text/javascript" src="<?php echo $vars['url']; ?>views/default/messages/pubp_modal/modal/lib/scriptaculous.js?load=builder,effects"></script>
	<script type="text/javascript" src="<?php echo $vars['url']; ?>views/default/messages/pubp_modal/modal/modalbox.js"></script>
	<!-- Core files -->
	<link rel="stylesheet" href="<?php echo $vars['url']; ?>views/default/messages/pubp_modal/modal/modalbox.css" type="text/css" media="screen" />

	<?

	if (!empty($vars['object']) && is_array($vars['object'])) {

			foreach($vars['object'] as $message) {
				if( empty($message) && is_null($message) ) break;

				$mensaje = elgg_echo( $message );
				
				$tipo = '';
				if( $vars['register'] == "messages" ) {
					$tipo = 'Correcto';
				} else {					
					$tipo = 'Error';
				}
				print "<script> Modalbox.show('<p>$mensaje</p> <input type=\'button\' value=\'Ok!\' onclick=\'Modalbox.hide()\' />',{title: 'Prueba', width: 300}); </script>";								
			}
	}

?>