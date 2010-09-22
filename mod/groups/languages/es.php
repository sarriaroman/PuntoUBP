<?php
	/**
	 * Elgg groups plugin language pack
	 * 
	 * @package ElggGroups
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	$spanish = array(
	
		/**
		 * Menu items and titles
		 */
			
			'groups' => "Comunidades",
			'groups:owned' => "Comunidades de su propiedad",
			'groups:yours' => "Sus comunidades",
			'groups:user' => "Comunidades de %s",
			'groups:all' => "Todas las comunidades",
			'groups:new' => "Crear una nueva comunidad",
			'groups:edit' => "Edita comunidad",
                        'groups:delete' => 'Elimina comunidad',
			'groups:membershiprequests' => 'Gestionar las peticiones al grupo',


			'groups:icon' => 'Imagen de la comunidad (dejar en blanco si no quiere cambiarlo)',
			'groups:name' => 'Nombre de la comunidad',
			'groups:username' => 'Nombre corto de la comunidad (se mostrará en la url, s&oacute;lo caracteres alfanum&eacute;ricos)',
			'groups:description' => 'Descripci&oacute;n',
			'groups:briefdescription' => 'Breve description',
			'groups:interests' => 'Intereses',
			'groups:website' => 'Website',
			'groups:members' => 'Miembros',
			'groups:membership' => "Miembros",
			'groups:access' => "Permisos de acceso",
			'groups:owner' => "Propietario",
	        'groups:widget:num_display' => 'N&uacute;mero de comunidades a mostrar',
	        'groups:widget:membership' => 'Miembros de la comunidad',
	        'groups:widgets:description' => 'Mostrar las comunidades que es miembro en su perfil',
			'groups:noaccess' => 'Sin acceso a la comunidad',
			'groups:cantedit' => 'No puede editar esta comunidad',
			'groups:saved' => 'Comunidad guardada',
                        'groups:featured' => 'Caracter&iacute;sticas de la comunidad',
                        'groups:makeunfeatured' => 'Descategorizaci&oacute;n',
                        'groups:makefeatured' => 'Hacer categorizable',
                        'groups:featuredon' => 'Ha categorizado este grupo.',
                        'groups:unfeature' => 'Ha eliminado la categor&iacute;a de este grupo',
			'groups:joinrequest' => 'Solicitar ser miembro',
			'groups:join' => 'Unirse a la comunidad',
			'groups:leave' => 'Dejar la comunidad',
			'groups:invite' => 'Invitar amig@s',
			'groups:inviteto' => "Invitar amig@s a '%s'",
			'groups:nofriends' => "No tiene amig@s que no hayan sido invitados al grupo.",
                        'groups:viagroups' => "comunidad de via",

			'groups:group' => "Comunidad",
 
 			'groups:notfound' => "Comunidad no encontrada",
                        'groups:notfound:details' => "La petici&oacute;n de este gruopo no existe o no tiene acceso al mismo",
                        'groups:requests:none' => 'No hay peticiones de inclusi&oacute;n en este momento.',

			'item:object:groupforumtopic' => "T&oacute;picos",

                        'groups:count' => "comunidades creadas",
                        'groups:open' => "comunidad p&uacute;blica",
                        'groups:closed' => "comunidad privada",
                        'groups:member' => "miembros",
                        'groups:searchtag' => "Buscar comunidades por tags",
		/*
		   * Access
	       */
	                'groups:access:private' => 'Privada - usuarias debe ser intivadas',
	                'groups:access:public' => 'P&uacute;blica - puenden adherirse',
	                'groups:closedgroup' => 'Este grupo ha cerrado su adhesi&oacute;N. Para solicitarlo debe pulsar "solicitar ser miembre" en el men&uacute;.',
 
   		/*
		   Group tools
	        */
	               'groups:enablepages' => 'Habilitar p&aacute;ginas de la comunidad',
	               'groups:enableforum' => 'Habilitar hilos de la comunidad',
	               'groups:enablefiles' => 'Habilitar ficheros en la comunidad',
	               'groups:yes' => 'yes',
	               'groups:no' => 'no',
                       'group:created' => 'Creado %s con %d env&iacute;os',
	               'groups:lastupdated' => '&Uacute;ltima actualizaci&oacute;n %s por %s',
	               'groups:pages' => 'P&aacute;ginas de la comunidad',
	               'groups:files' => 'Archivos de la comunidad',


			/*
			  Group forum strings
			*/
		
			'group:replies' => 'Responder',
			'groups:forum' => 'Foro de la comunidad',
			'groups:addtopic' => 'A&ntilde;adir hilo',
			'groups:forumlatest' => '&Uacute;ltimos forums',
			'groups:latestdiscussion' => '&Uacute;ltimas discusiones',
                        'groups:newest' => 'Lo m&aacute;s nuevos',
			'groups:popular' => 'Populares',
			'groupspost:success' => 'Su comentario a sido enviado correctamente',
			'groups:alldiscussion' => '&Uacute;ltima discusi&oacute;n',
			'groups:edittopic' => 'Edita hilo',
			'groups:topicmessage' => 'Mensajes de cada hilo',
			'groups:topicstatus' => 'Estado de los hilos ',
			'groups:reply' => 'Contestar',
			'groups:topic' => 'Hilo',
			'groups:posts' => 'Env&iacute;os',
			'groups:lastperson' => '&Ulacute;ltima persona',
			'groups:when' => 'Cuando',
			'grouptopic:notcreated' => 'No se han creado hilos(t&oacute;picos).',
			'groups:topicopen' => 'Abrir',
			'groups:topicclosed' => 'Cerrado',
			'groups:topicresolved' => 'Resuelto',
			'grouptopic:created' => 'Su hilo fue creado.',
			'groupstopic:deleted' => 'El hilo ha sido eliminado.',
			'groups:topicsticky' => 'Sticky',
			'groups:topicisclosed' => 'El hilo esta cerrado.',
			'groups:topiccloseddesc' => 'Este hilo ha sido cerrado y no acepta m&aacute;s comentarios.',
			'grouptopic:error' => 'Su hilo no puede ser creado. Por favor intente de nuevo o contacte con el administrador.',
			'groups:forumpost:edited' => "Ha editado con &eacute;xito el env&iacute;o al foro.",
			'groups:forumpost:error' => "Hubo un problema con la edici&oacute; del env&iacute;o al foro.",
			'groups:privategroup' => 'Esta comunidad es privada, requiere autorizaci&oacute;n.',
			'groups:notitle' => 'Las comunidades requieren de un t&iacute;tulo',
			'groups:cantjoin' => 'No puede unirse a la comunidad',
			'groups:cantleave' => 'No puede salir de la comunidad',
			'groups:addedtogroup' => 'Usuari@ a&ntilde;adido a la comunidad',
			'groups:joinrequestnotmade' => 'La petici&oacute;n de unirse no puede hacerse',
			'groups:joinrequestmade' => 'Su petici&oacute;n a unirse a la comunidad se ha realizado correctamente',
			'groups:joined' => 'Se a unido a la comunidad!',
			'groups:left' => 'Ha dejado la comunidad',
			'groups:notowner' => 'Lo lamento, no es propietario de esta comunidad.',
			'groups:alreadymember' => 'Aun es miembro de esta comunidad',
			'groups:userinvited' => 'El usuario ha sido invitado.',
			'groups:usernotinvited' => 'El usuario no puede ser invitado.',
                        'groups:useralreadyinvited' => 'La usuaria ha sido invitado',
			 'groups:updated' => "&Uacute;ltimos comentarios",
			'groups:invite:subject' => "%s ha recibido una invitaci&oacute;n a unirse a %s!",
                        'groups:started' => "Comenzado por",
			'groups:joinrequest:remove:check' => 'Est&aacute; seguro que quiere eliminar esta petici&oacute;n?',
			'groups:invite:body' => "Hola %s,

Ha sido invitado a universe a la comunidad '%s,  pulse abajo para confirmar:

%s",

			'groups:welcome:subject' => "Bienvenido a la comunidad %s",
			'groups:welcome:body' => "Hola %s!
		
Es miembro de la comunidad '%s'. Pulse abajo para empezar a enviar mensajes a la comunidad

%s",
	
			'groups:request:subject' => "%s tiene peticiones para unirse a %s",
			'groups:request:body' => "Hola %s,

%s tiene peticiones para univer a la comunidad '%s'. Pulse abajo para ver su perfil:

%s

o pulse abajo para confirmar la petici&oacute;n:

%s",
			/**
				Forum river
			*/
			'groups:river:member' => 'es ahora miembro de ',
                        'groupforum:river:updated' => '%s ha sido actualizado',
			'groupforum:river:update' => 'este t&oaucte;pico de discusi&oacute;n',
			'groupforum:river:created' => '%s ha sido creado',
			'groupforum:river:create' => 'una nueva discusi&oacute;n marcada',
			'groupforum:river:posted' => '%s ha enviado un nuevo comentario',
			'groupforum:river:annotate:create' => 'en esta discusi&oacute;n',
			'groupforum:river:postedtopic' => '%s ha iniciado una nueva discusi&oacute;n marcada',
			'groups:river:member' => '%s es miembro de',
			
			'groups:nowidgets' => 'No tiene definidos componentes para esta comunidad.',
	
	
			'groups:widgets:members:title' => 'Miembros de la comunidad',
			'groups:widgets:members:description' => 'Lista de los miembros de una comunidad.',
			'groups:widgets:members:label:displaynum' => 'Lista de los miembros de una comunidad.',
			'groups:widgets:members:label:pleaseedit' => 'Por favor, configure este componente.',
	
			'groups:widgets:entities:title' => "Objetos de la comunidad",
			'groups:widgets:entities:description' => "Objetos guardados en esta comunidad",
			'groups:widgets:entities:label:displaynum' => 'Listar los objetos de una comunidad.',
			'groups:widgets:entities:label:pleaseedit' => 'Por favor, configure este componente.',
		
			'groups:forumtopic:edited' => 'Hilo de foro editado correctamente.',
                 /**
                   * Action messages
                */
                         'group:deleted' => 'Contenidos de la comunidad eliminados',
                         'group:notdeleted' => 'La comunidad no puede ser eliminada',
                         'grouppost:deleted' => 'Env&iacute;o a la comunidad eliminado correctamente',
                         'grouppost:notdeleted' => 'El env&iacute;o de la comunidad no puede ser eliminado',
                         'groupstopic:deleted' => 'T&oacute;pico eliminado',
                         'groupstopic:notdeleted' => 'T&oacute;pico no eliminado',
                         'grouptopic:blank' => 'Sin t&oacute;picos',
                         'groups:deletewarning' => "Est&aacute; seguro que quiere eliminar esta comunidad? NO habr&iacute; marcha atr&aacute;s!",
                         'groups:joinrequestkilled' => 'La adhesi&oacute;n a la comunida ha sido eliminada.',

	);
	
					
	add_translation("es",$spanish);
?>
