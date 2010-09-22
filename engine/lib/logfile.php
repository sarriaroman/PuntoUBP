<?php

/* User definable variables */ 
$logfile =  "clf.log";    /* Filename of log to write to */ 
$timezone =  "+0100";     /* Timezone correction */ 
$lookup_size = true;     /* Set to true to enable filesize lookup */ 
$document_root =  $_SERVER['DOCUMENT_ROOT'] + "/";

/* A note about the lookup_size directive:
* This will make this script lookup the size of the original file on disk,
* which may or may not be the same amount of data sent to the client.
* It does give you a hint though..
* Oh, you have to set $document_root aswell if this should work..
*/ 

function write_to_log($str) {
    if($fd = fopen( "log.0",  "a")) {
    	fputs($fd, $str);
	    fclose($fd);
    }
}

?>