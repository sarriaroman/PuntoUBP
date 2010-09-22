<?php

	/**
	 * Elgg global system message list
	 * Lists all system messages
	 * 
	 * @package Elgg
	 * @subpackage Core
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.org/
	 * 
	 * @uses $vars['object'] The array of message registers
	 */
	 
	 /*
	 	Modificaciones realizadas por UBP Social Lab
	 	Cambio principal:
			- Sistema de mensajes
				* Eliminaci�n de la antigua ventana de mensajes
				* Reemplazo por una mas moderna
	 */

		if (!empty($vars['object']) && is_array($vars['object']) && sizeof($vars['object']) > 0) {
			
			foreach($vars['object'] as $register => $list ) {
				if( $register == "exceptions" ) {
					echo elgg_view("messages/{$register}/list", array('object' => $list));
				} else {
					echo elgg_view("messages/notifications/list", array('object' => $list, 'register' => $register ));
				}
			}
			
		}
		
?>