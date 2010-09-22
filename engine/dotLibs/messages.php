<?
	function get_messages( $guid, $limit ) {
		$user = get_friends( $guid );
		
		
	}

	function get_comments( $message_id, $limit = 0 ) {
		$rst = null;
		if( $limit == 0 ) {
			$rst = get_data("SELECT * FROM {$CONFIG->dbprefix}comments WHERE IdMessage = $message_id");
		} else {
			$rst = get_data("SELECT * FROM {$CONFIG->dbprefix}comments WHERE IdMessage = $message_id LIMIT 0, $limit");
		}
		
		return $rst;
	}
	
	function get_like_count( $message_id ) {
		$rst = get_data("SELECT * FROM {$CONFIG->dbprefix}like WHERE IdMessage = $message_id");
		$cnt = count( $rst );
		return $cnt;
	}
	
	function get_not_like_count( $message_id ) {
		$rst = get_data("SELECT * FROM {$CONFIG->dbprefix}not_like WHERE IdMessage = $message_id");
		$cnt = count( $rst );
		return $cnt;
	}

	class dotMessages {
		
		protected function initialise_attributes()
		{	
			$this->attributes['id'] = "";
			$this->attributes['guid'] = "";
			$this->attributes['title'] = "";
			$this->attributes['message'] = "";  // se puede verificar si es un link
			$this->attributes['image'] = "";	// para armar tabla con la imagen y mensaje, uso para aplicaciones, fotos, video.
			$this->attributes['IdApp'] = "";
			$this->attributes['created'] = "";
		}
		
		function __construct() {
			$this->initialise_attributes();
		}
		
		public function save() {
			$rst = insert_data("INSERT into {$CONFIG->dbprefix}messages (" . array_keys( $this->attributes ) . ") values (" . array_values( $this->attributes ) . ")");
			
			if( $rst !== false ) {
				return true;
			} else {
				system_message( elgg_echo('APP:ERRORCREATE') );
				return false;
			}
		}
		
	}
	
	class dotWall_to_Wall {
		
		protected function initialise_attributes()
		{	
			$this->attributes['id'] = "";
			$this->attributes['guid'] = "";
			$this->attributes['title'] = "";
			$this->attributes['message'] = "";  // se puede verificar si es un link
			$this->attributes['image'] = "";	// para armar tabla con la imagen y mensaje, uso para aplicaciones, fotos, video.
			$this->attributes['IdApp'] = "";
			$this->attributes['created'] = "";
		}
		
		function __construct() {
			$this->initialise_attributes();
		}
		
		public function save() {
			$rst = insert_data("INSERT into {$CONFIG->dbprefix}messages (" . array_keys( $this->attributes ) . ") values (" . array_values( $this->attributes ) . ")");
			
			if( $rst !== false ) {
				return true;
			} else {
				system_message( elgg_echo('APP:ERRORCREATE') );
				return false;
			}
		}
		
	}
	
	class dotComment {
		
		protected function initialise_attributes()
		{	
			$this->attributes['Id'] = "";
			$this->attributes['IdMessage'] = "";
			$this->attributes['guid'] = "";
			$this->attributes['message'] = "";
			$this->attributes['IdApp'] = "";
			$this->attributes['created'] = "";
		}
		
		function __construct() {
			$this->initialise_attributes();
		}
		
		public function save() {
			$rst = insert_data("INSERT into {$CONFIG->dbprefix}comments (" . array_keys( $this->attributes ) . ") values (" . array_values( $this->attributes ) . ")");
			
			if( $rst !== false ) {
				return true;
			} else {
				system_message( elgg_echo('APP:ERRORCREATE') );
				return false;
			}
		}
		
	}
	
	class dotLike {
		
		protected function initialise_attributes()
		{	
			$this->attributes['id'] = "";
			$this->attributes['IdMessage'] = "";
			$this->attributes['guid'] = "";
			$this->attributes['IdApp'] = "";
		}
		
		function __construct() {
			$this->initialise_attributes();
		}
		
		public function save() {
			$rst = insert_data("INSERT into {$CONFIG->dbprefix}like (" . array_keys( $this->attributes ) . ") values (" . array_values( $this->attributes ) . ")");
			
			if( $rst !== false ) {
				return true;
			} else {
				system_message( elgg_echo('APP:ERRORCREATE') );
				return false;
			}
		}
		
	}
	
	class dotNotLike {
		
		protected function initialise_attributes()
		{	
			$this->attributes['id'] = "";
			$this->attributes['IdMessage'] = "";
			$this->attributes['guid'] = "";
			$this->attributes['IdApp'] = "";
		}
		
		function __construct() {
			$this->initialise_attributes();
		}
		
		public function save() {
			$rst = insert_data("INSERT into {$CONFIG->dbprefix}not_like (" . array_keys( $this->attributes ) . ") values (" . array_values( $this->attributes ) . ")");
			
			if( $rst !== false ) {
				return true;
			} else {
				system_message( elgg_echo('APP:ERRORCREATE') );
				return false;
			}
		}
		
	}
	
?>