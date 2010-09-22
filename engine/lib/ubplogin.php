<?php
	
	function ubplogin( $username, $password ) {
		
		if( $user = get_user_by_username( $username ) ) {
			return $user;
		}
		
		// Defino las configuraciones
	
		# Servidor
		$server = "10.0.0.51:1433";
	
		# Usuario
		$user = "redsocial";
	
		# Clave
		$pass = "123456";
	
		# Base de Datos
		$db = "redsocial";
		
		write_to_log("Inicia la funcion de LogIn\n");
		
		$con = mssql_connect($server, $user, $pass) or die("Error de conexion");

		$bd = mssql_select_db($db, $con) or die("Error de lectura");

		$sql = "EXECUTE login_usuario '{$username}', '{$password}'";

		$result = mssql_query( $sql, $con);
		
		if( !$result ) {
			die("Error en la ejecución");
		}
		
		$r = mssql_fetch_assoc( $result );
		
		if( $r['nro_error'] == 0 ) {
			write_to_log("El usuario ingreso a miUBP\n");
			//crear nuevo usuario
			
			$session = $r['id_sesion'];
			
			write_to_log( $session );
			
			$sql = "EXECUTE get_datos_personales '{$session}'";
			
			$rst = mssql_query( $sql, $con );
			
			if( !$rst ) {
				die("Error al obtener los datos");
			}
			
			$array = mssql_fetch_assoc( $rst );
			
			$name = ucwords( strtolower( utf8_encode( $array['apellido'] . " " . $array['nombre'] ) ) );
			$mail = $array['e_mail_ubp'];
			
			$guid = register_user($username, $password, $name, $mail, true);
					
			$new_user = get_entity($guid);
			
			// Cargar datos especiales
			
			$new_user->sexo = $array['sexo'];
			
			$new_user->save();
			
			return $new_user;
		} else {
			write_to_log("El usuario no ingreso a miUBP");
			
			return false;
		}
	}

?>