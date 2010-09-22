<?php
	/**
	 * User validation plugin.
	 * 
	 * @package pluginUserValidation
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Ralf Fuhrmann, Euskirchen, Germany
	 * @copyright 2008 Ralf Fuhrmann, Euskirchen, Germany
	 * @link http://mysnc.de/
	 */

	$spanish = array(
	
		/**
		 * Default translations
		 */
		
		'uservalidation:admin:confirm:fail' => "La cuenta no puede ser activada !",
		'uservalidation:admin:confirm:success' => "La cuenta ha sido activada !",
		'uservalidation:admin:registerok' => "Su cuenta serรก confirmada por el administrador. Recibir&aacute; un coreo cuando sea activada.",
		'uservalidation:confirm:fail' => "Su cuenta no puede ser activada!, Contacto con el administrador !",
		'uservalidation:confirm:success' => "Su cuenta ha sido activada !",
		'uservalidation:email:registerok' => "Para activar su cuenta, confirme su email y pulse el link que se le mail address by clicking on the link we sent you.", 
	
		/**
		 * eMail translations
		 */

		'uservalidation:adminmail:subject' => "Nuevo registro de usuari@ : %s !",
		'uservalidation:adminmail:body' => "
Hola Administrador,
acaba de registrarse el usuario %s (%s).
Si tiene habilitado la validaci&oacute;n por administrador, por favor garantice su activaciรณn lo antes posible !",
	
		'uservalidation:autodelete:subject' => "Algunos usuarios han sido auto-eliminados !",
		'uservalidation:autodelete:body' => "
Hi Administrador,
los siguientes usuari@s han sido auto-eliminados :
%s",

		'uservalidation:admin:validate:subject' => "%s su cuenta ser&aacute; confirmada!",
		'uservalidation:admin:validate:body' => "
Hola %s,
su cuenta serร confirmada por el administrador. Despuรs de esto recibirร un correo para entrar en 
%s",
	
		'uservalidation:email:validate:subject' => "%s confirme su email por favor!",
		'uservalidation:email:validate:body' => "
Hola %s,
Confirme su email pulsando el link de abajo por favor: 
%s",
	
		'uservalidation:success:subject' => "Cuenta %s activada!",
		'uservalidation:success:body' => "
Hola %s,
Felicidades, su cuenta ha sido activada.
Puede empezar con el usuari@ %s por el enlace de abajo:
%s",


	);
	add_translation('es', $spanish);
	
	
	if (isadminloggedin())
	{
	

		$spanish = array(

			/**
			* Admin-Only translations
			*/

			'uservalidation:activate' => "Activar usuari@",
			'uservalidation:autodelete' => "D&iacute;as por lo que ser&iacute;a eliminado en caso de no activar su cuenta",
			'uservalidation:autodelete:no' => "no auto-eliminaci&oacute;n",
			'uservalidation:delete' => "Eliminar usuari@", 
			'uservalidation:banned' => "Prohibido",
			'uservalidation:method' => "M&eacute;todo de validaci&oacute;n",
			'uservalidation:method:none' => "sin validaci&oacute;n",
			'uservalidation:method:bymail' => "validaci&oacute;n por email",
			'uservalidation:method:byadmin' => "validaci&oacute;n por el administrador",
			'uservalidation:pendingusers' => "Registros pendientes",
			'uservalidation:registered' => "Registerad@s: ",
			'uservalidation:adminmail' => "El administrador recibe un email del registro",
			'uservalidation:adminmail:every' => "cada regristro",
			'uservalidation:adminmail:adminonly' => "s&oacute;lamente si un es requerido para un administrador",
			'uservalidation:waiting' => "Esperando para su activaci&oacute;n",

		);
		add_translation('es', $spanish);
	
	}
	
?>