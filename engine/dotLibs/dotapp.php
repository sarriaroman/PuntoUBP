<?php
	class dotApp {
		
		protected function initialise_attributes()
		{	
			$this->attributes['appid'] = "";
			$this->attributes['name'] = "";
			$this->attributes['version'] = "";
			$this->attributes['description'] = "";
			$this->attributes['dev_guid'] = "";
			$this->attributes['key'] = "";
			$this->attributes['url'] = "";
			$this->attributes['app_url'] = "";
		}
				
		function __construct( $url = null ) 
		{			
			$this->initialise_attributes();
			
			//$array = new array();
			
			try {
				//$xml = simplexml_load_file( $url );
				
				//dom_to_array( $xml , $array );
				$url = sanitise_string( $url );
				
				$xml = xml_2_object( $url );
			
				if ($xml)
				{
					//$elements = array();
				
					foreach ($xml->children as $element)
					{
						$key = $element->attributes['key'];
						$value = $element->attributes['value'];
					
						$this->attributes[$key] = $value;
					}
				
					$this->attributes['url'] = $url;
					//return $elements;
				}
				
				// Programar llenado de atributos desde el xml
			} catch( Exception $e ) {
				//$this->create( $url );
				system_message( $e );
				//header("Location: http://" . $GLOBAL->wwwroot );
			}
		}
		
		/*function __construct( $url, $dev_guid ) 
		{			
			$this->initialise_attributes();
			
			try {
				$xml = xml_2_object( $url );
			
				if ($xml)
				{		
					foreach ($xml->children as $element)
					{
						$key = $element->attributes['key'];
						$value = $element->attributes['value'];
					
						$this->attributes[$key] = $value;
					}
					
					$this->attributes['url'] = $url;
				}
			} catch( Exception $e ) {
				$this->create( $url, $dev_guid );
			}
		}
		
		function __construct( $appid  = null ) 
		{			
			$this->initialise_attributes();
			
			try {
				$xml = xml_2_object( $url );
			
				if ($xml)
				{		
					foreach ($xml->children as $element)
					{
						$key = $element->attributes['key'];
						$value = $element->attributes['value'];
					
						$this->attributes[$key] = $value;
					}
					
					$this->attributes['url'] = $url;
				}
			} catch( Exception $e ) {
				$this->create( $url, $dev_guid );
			}
		}
*/		
		public function create( $url, $dev_guid ) {
			$rst = insert_data("INSERT into {$CONFIG->dbprefix}applications (url, dev_guid) values ( '$url', $dev_guid )");
			
			if( $rst !== false ) return get_app_by_url( $url , true );
			else {
				system_message( elgg_echo('APP:ERRORCREATE') );
				return false;
			}
		}
		
		public function get_app_by_url( $url , $create=false ) {
			if( $create ) {
				$appid = get_data_row("SELECT appid from {$CONFIG->dbprefix}applications where url = {$url}");
				
				if( $appid ) {
					$key = md5( $appid['appid'] );
					
					$result = update_data("UPDATE {$CONFIG->dbprefix}applications set api_key='$key' where appid = {$appid['appid']}");
					
					$obj = new dotApp( $url );
					if( $result ) return $obj->app_url;
					else return false;
				} else {
					return false;
				}
			} else {
				if( $appid = get_data_row("SELECT appid from {$CONFIG->dbprefix}applications where url = {$url}") ) {
					$obj = new dotApp( $appid['appid'] );
					return $obj->app_url;
				} else {
					return false;
				}
			}
		}
		
		public function get_app_by_id( $appid ) {
			$rst = get_data_row("SELECT url from {$CONFIG->dbprefix}applications where appid = {$appid}");
			
			$obj =  new dotApp( $rst['url'] );
			return $obj->app_url;
		}
		
		/*public function get_app_by_id( $appid ) {
			return (get_data_row("SELECT url from {$CONFIG->dbprefix}applications where appid = {$appid}")['url']);
		}*/
		
		public function delete( $appid ) {
			if( $del = delete_data("DELETE from {$CONFIG->dbprefix}applications where appid={$appid}") ) {
				system_message( elgg_echo( 'APP:DELETEOK' ) );
			} else {
				system_message( elgg_echo( 'APP:DELETEERROR' ) );
			}
		}
		
		public function getApplication( $appid ) {
			$url = get_data_row("SELECT url FROM {$CONFIG->dbprefix}applications WHERE appid = $appid");
			
			return $url['url'];
		}
		
		// Solo para cambiar la url de una aplicacion
		public function update( $appid, $url ) {
			if( $rst = update_data("UPDATE {$CONFIG->dbprefix}applications set url='$url' where appid = {$appid}") ) {
				system_message( elgg_echo( 'APP:UPDATEOK' ) );
			} else {
				system_message( elgg_echo( 'APP:UPDATEERROR' ) );
			}		
		}
		
	}
?>