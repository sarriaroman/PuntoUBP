<?php

	/**
	 * Elgg translation browser.
	 * 
	 * @package translationbrowser
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Mariusz Bulkowski
	 * @author v2 Pedro Prez
	 * @copyright 2009
	 * @link http://www.pedroprez.com.ar/
	 */
	$modules = $vars['modules'];
	
	$body = elgg_view('translationbrowser/select_language',$vars);
  
  	$body .= "<div class='select-module'>" . elgg_echo("translationbrowser:selectmodule") . "</div>";
  
  	$body .= "<div id='cont-countries'>";
  
 
 
	foreach($modules as $key => $opt){
	
		$str_rate = translationbrowser_module_rate($key); 
	  	$body .= elgg_view("input/translationbrowser_button", array('value' => elgg_echo("translate"), 'type' => 'button', 'class' => 'submit_button'));
	  	$body .= "<label>";
	  	$body .= "<input type='radio' value='" . base64_encode($key) . "' name='modules' />
	  				<span id=". md5($key)  .">{$opt}</span>
				  </label>";
	}
	  
	$body .= "</div>";
	$body = "<div class='contentWrapper'>{$body}</div>";  
  	
	echo  elgg_view('input/form', array(
											'internalid' => 'browsertranslate',
											'internalname' => 'browsertranslate',
											'action' => "{$vars['url']}action/translationbrowser/get_text", 
											'body' => $body)
										);
  
?>


<script type="text/javascript">

	jQuery('input.submit_button').click(function()
	{
		jQuery('#browsertranslate').submit();
	})
	
	
	jQuery('#cont-countries label').click(function(){
		//remove all class with name selected
		jQuery('#cont-countries label').removeClass('selected');
		//remove all buttons
		jQuery('#cont-countries input.submit_button').hide();
		jQuery(this).addClass('selected');
		jQuery(this).prev('input.submit_button').show();
		jQuery(this).find('input:radio').click();
	});


	jQuery(document).ready(function(){
		updateLanguages();
	});

	jQuery('.select_languages').change(function(){
		updateLanguages();
	})

	function updateLanguages(){
		sLangCode = jQuery('.select_languages option:selected').val().split('#');
		sLangCode = sLangCode[0];

		$.ajax({type: "GET",
       		url: "<?php echo $vars['url'];?>pg/translationbrowser/?callback=true&language="+ sLangCode, 
	        dataType: "xml", 
      		success: function(xml){
     			$(xml).find('module').each(function(){
	       				var id = $(this).attr('id');
       				var title = $(this).find('title').text();
       				$('#'+id+'X').remove();
       				$('<div id='+id+'X></div>').html(title).appendTo('#'+id);
     			});
     		}
    	});
	}
	
</script>