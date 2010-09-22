<?

			$file_exceptions = array(
										'.','..',
										'.DS_Store',
										'Thumbs.db',
										'.svn',
										'CVS','cvs'
									);
	
		// Get the list of files to include, and alphabetically sort them
	
			$files = get_library_files(dirname(dirname(__FILE__)) . "dotLibs/lib",$file_exceptions);
			asort($files);
			
		// Get config
			global $CONFIG;
	
		// Include them
			foreach($files as $file) {
				if (isset($CONFIG->debug) && $CONFIG->debug) error_log("Loading $file..."); 
				if (!include_once($file))
					throw new InstallationException("Could not load {$file}");
			}

?>