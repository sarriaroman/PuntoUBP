<?php
	/**
	 * Elgg pages plugin language pack
	 * 
	 * @package ElggPages
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	$spanish = array(
	
		/**
		 * Menu items and titles
		 */
			
			'pages' => "P&aacute;ginas",
			'pages:yours' => "Sus p&aacute;ginas",
			'pages:user' => "P&aacute;ginas de Inicio",
			'pages:group' => "p&aacute;gina de %s",
			'pages:all' => "Todas las p&aacute;ginas",
			'pages:new' => "Nueva p&aacute;gina",
			'pages:groupprofile' => "P&aacute;gina del grupo",
			'pages:edit' => "Editar esta p&aacute;gina",
			'pages:delete' => "Eliminar esta p&aacute;gina",
			'pages:history' => "Historial de p&aacute;ginas",
			'pages:view' => "Vista de p&aacute;ginas",
			'pages:welcome' => "Editar un mensaje de bienvenida",
			'pages:welcomeerror' => "Hubo un problema al guardar el mensaje de bienvenida",
			'pages:welcomeposted' => "Su mensaje de bienvenida ha sido enviado",
			'pages:navigation' => "Navegaci&oacute;n de p&aacute;ginas",
	
			'item:object:page_top' => 'Raiz de p&aacute;ginas',
			'item:object:page' => 'P&aacute;ginas',
			'item:object:pages_welcome' => 'Bloques de bienvenida de las p&aacute;ginas',
	
	
		/**
		 * Form fields
		 */
	
			'pages:title' => 'T&iacute;tulo de pagina',
			'pages:description' => 'Entrada de su p&aacute;gina',
			'pages:tags' => 'Etiquetas',	
			'pages:access_id' => 'Accesso',
			'pages:write_access_id' => 'Acceso de escritura',
		
		/**
		 * Status and error messages
		 */
			'pages:noaccess' => 'Sin acceso a esta p&aacute;gina',
			'pages:cantedit' => 'No puede editar esta p&aacute;gina',
			'pages:saved' => 'P&aacute;gina guardada',
			'pages:notsaved' => 'La p&aacute;gina no puede ser guardada',
			'pages:notitle' => 'Debe especificar un t&iacute;tulo para su p&aacute;gina.',
			'pages:delete:success' => 'Su p&aacute;gina fue eliminada correctamente.',
			'pages:delete:failure' => 'La p&aacute;gina no puede eliminarse.',
	
		/**
		 * Page
		 */
			'pages:strapline' => '&Uactue;ltimas actualizaciones de %s para %s',
	
		/**
		 * History
		 */
			'pages:revision' => 'Revision creada por %s para %s',
			
		/**
		 * Wdiget
		 **/
		 
		    'pages:num' => 'N&uacute;mero de p&aacute;ginas a mostrar',
	
		/**
		 * Submenu items
		 */
			'pages:label:view' => "Vista de la p&aacute;gina",
			'pages:label:edit' => "Editar la p&aacute;gina",
			'pages:label:history' => "Historial de la p&acute;gina",
	
		/**
		 * Sidebar items
		 */
			'pages:sidebar:this' => "Esta p&aacute;gina",
			'pages:sidebar:children' => "Sub-p&aacute;ginas",
			'pages:sidebar:parent' => "Principal",
	
			'pages:newchild' => "Crear una sub-p&aacute;gina",
			'pages:backtoparent' => "Volver a '%s'",
	);
	
	
	add_translation("es",$spanish);
?>
