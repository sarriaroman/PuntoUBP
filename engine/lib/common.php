<?php
	
	function is_like( $pid, $uid ) {
		global $CONFIG;
		
		$query = "select uid from {$CONFIG->dbprefix}post_likes where pid = $pid and uid = $uid";
		
		if( $data = get_data_row( $query ) ) {
			if( count( $data ) == 1 ) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	function add_like( $pid, $uid, $type ) {
		global $CONFIG;
		
		$query = "insert into {$CONFIG->dbprefix}post_likes (pid,uid,type) values ($pid,$uid,$type)";
	
		$result = insert_data( $query );
	}
	
	function update_like( $pid, $uid, $type ) {
		global $CONFIG;
		
		$query = "update {$CONFIG->dbprefix}post_likes set type = $type where pid = $pid and uid = $uid";
	
		$result = update_data( $query );
	}
	
	function delete_like( $pid, $uid ) {
		global $CONFIG;
		
		$query = "delete from {$CONFIG->dbprefix}post_likes where pid = $pid and uid = $uid";
	
		$result = delete_data( $query );
	}
	
	function get_like_count( $pid, $type ) {
		global $CONFIG;
		
		$query = "select COUNT(uid) as total from {$CONFIG->dbprefix}post_likes where pid = $pid and type = $type";
		
		if( $data = get_data_row( $query ) ) {
			foreach( $data as $row ) {
				return $row['total'];
			}
		} else {
			return 0;
		}
		
	}
?>