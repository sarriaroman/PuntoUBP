<?php

	$spanish = array(
	
		/**
		 * Menu items and titles
		 */
	
			'poll' => "Encuesta",
			'polls' => "Encuestas",
			'polls:user' => "Encuestas de %s",
			'poll:user:friends' => "Encuestas de los amigos de %s",
			'poll:your' => "Tus encuestas",
			'poll:posttitle' => "Encuesta de %s: %s",
			'poll:friends' => "Encuestas de amigos",
			'poll:yourfriends' => "Las ultimas encuestas de tus amigos",
			'poll:everyone' => "Todas las encuestas",
			'poll:read' => "Ver encuesta",
			'poll:addpost' => "Crear nueva encuesta",
			'poll:editpost' => "Editar encuesta",
			'poll:text' => "Topico",
			'poll:strapline' => "%s",
			'item:object:poll' => 'Encuestas',
			'poll:question' => "Pregunta",
			'poll:responses' => "Opciones (separadas por coma)",
			'poll:results' => "[+] Mostrar resultados",
		/**
	     * poll widget
	     **/	
			'poll:widget:label:displaynum' => "¿Cuantas encuestas quiere mostrar?",
			
         /**
	     * poll river
	     **/
	        
	        //generic terms to use
	        'poll:river:created' => "%s creada",
	        'poll:river:updated' => "%s actualizada",
	        'poll:river:posted' => "%s publicada",
	        'poll:river:voted' => "%s votada",
	        //these get inserted into the river links to take the user to the entity
	        'poll:river:create' => "nueva encuesta: ",
	        'poll:river:update' => "la encuesta: ",
	        'poll:river:annotate' => "un comentario: ",
	        'poll:river:vote' => ": ",
		/**
		 * Status messages
		 */
	
			'poll:posted' => "Su encuesta fue publicada con exito.",
			'poll:responded' => "Gracias por tu voto",
			'poll:deleted' => "La encuesta fue eliminada con exito.",
			'poll:totalvotes' => "Numero de votos: ",
			'poll:voted' => "Su voto ha sido registrado. Gracias!",
			
	
		/**
		 * Error messages
		 */
	
			'poll:save:failure' => "Su voto no pudo ser gardado. Pruebe nuevamente.",
			'poll:blank' => "Debe ingresar las opciones para crear una nueva encuesta.",
			'poll:notfound' => "No se ha encontrado la encuesta solicitada.",
			'polls:nonefound' => "%s no posee encuestas activas",
			'poll:notdeleted' => "Esta encuesta no puede ser eliminada."
	);
					
	add_translation("es",$spanish);

?>