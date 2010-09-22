<?php

	$english = array(
	
		/**
		 * Menu items and titles
		 */
	
			'poll' => "Poll",
			'polls' => "Polls",
			'polls:user' => "%s's Poll",
			'poll:user:friends' => "%s's Friends' Poll",
			'poll:your' => "Your Polls",
			'poll:posttitle' => "%s's Poll: %s",
			'poll:friends' => "Friends' Polls",
			'poll:yourfriends' => "Your friends' latest Polls",
			'poll:everyone' => "All site Polls",
			'poll:read' => "Read Poll",
			'poll:addpost' => "Create a Poll",
			'poll:editpost' => "Edit a Poll",
			'poll:text' => "Poll Text",
			'poll:strapline' => "%s",			
			'item:object:poll' => 'Polls',
			'poll:question' => "Poll Question",
			'poll:responses' => "Response Choices (separate with commas)",
			'poll:results' => "[+] Show the Results",
		/**
	     * poll widget
	     **/	
			'poll:widget:label:displaynum' => "How many polls you want to display?",
			
         /**
	     * poll river
	     **/
	        
	        //generic terms to use
	        'poll:river:created' => "%s wrote",
	        'poll:river:updated' => "%s updated",
	        'poll:river:posted' => "%s posted",
	        'poll:river:voted' => "%s voted",
	        //these get inserted into the river links to take the user to the entity
	        'poll:river:create' => "a new poll: ",
	        'poll:river:update' => "the poll: ",
	        'poll:river:annotate' => "a comment on the poll: ",
	        'poll:river:vote' => "on the poll: ",
		/**
		 * Status messages
		 */
	
			'poll:posted' => "Your Poll was successfully posted.",
			'poll:responded' => "Thank you for responding, your vote was recorded.",
			'poll:deleted' => "Your Poll was successfully deleted.",
			'poll:totalvotes' => "Total number of votes: ",
			'poll:voted' => "Your vote has been casted for this poll. Thank you for voting on this poll",
			
	
		/**
		 * Error messages
		 */
	
			'poll:save:failure' => "Your poll could not be saved. Please try again.",
			'poll:blank' => "Sorry; you need to fill in both the question and responses before you can make a Poll.",
			'poll:notfound' => "Sorry; we could not find the specified Poll.",
			'polls:nonefound' => "No Polls were found from %s",
			'poll:notdeleted' => "Sorry; we could not delete this Poll."
	);
					
	add_translation("en",$english);

?>