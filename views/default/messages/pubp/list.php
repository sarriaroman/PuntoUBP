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
	 */
	 
	 ?>
     
     <!-- Dependencies -->
	<script src="<?php echo $vars['url']; ?>views/default/messages/pubp/ui.mins.js" type="text/javascript"></script>
	<!-- Core files -->
	<script src="<?php echo $vars['url']; ?>views/default/messages/pubp/jquery.alerts.js" type="text/javascript"></script>
	<link href="<?php echo $vars['url']; ?>views/default/messages/pubp/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />

	<?

	if (!empty($vars['object']) && is_array($vars['object'])) {

			foreach($vars['object'] as $message) {
				if( empty($message) && is_null($message) ) break;

				$mensaje = "'" . elgg_echo( $message ) . "'";
				
				$tipo = '';
				if( $vars['register'] == "messages" ) {
					$tipo = '\'Correcto\'';
				} else {					
					$tipo = '\'Error\'';
				}
				print "<script> jAlert( $mensaje , $tipo ); </script>";								
			}
	}

?>