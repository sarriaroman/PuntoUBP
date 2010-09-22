<?php

	/*
		Funciones de manejo de los eventos y scripts de las aplicaciones
		 - Utilizacion y gestion de los metodos dotAPP
	*/
	
	global $CONFIG;
	
	///////////////////////////////////////////////////////////////////
	//// Voy a proceder a la inclusion de un par de librerias AJAX ////
    //////// Librerias que facilitan el manejo de ajax mediante ///////
	/////////////////// funciones simplificadas ///////////////////////
	///////////////////////////////////////////////////////////////////
		//system_message( $CONFIG->wwwroot ) ;
		
		echo $CONFIG->wwwroot . "ajax/xajax_core/xajax.inc.php";
		
//		include( $CONFIG->wwwroot . "ajax/xajax_core/xajax.inc.php" );
	///////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////
	
//	$ajax = new xajax();
//	$ajaxResponse = new xajaxResponse();
	
	/*public function ajax_message( $msg ) {
		global $ajaxResponse;
	    $ajaxResponse->script('system_message( $msg );');
    	return $ajaxResponse;
	}*/
	
	//$ajax->processRequest();
?>