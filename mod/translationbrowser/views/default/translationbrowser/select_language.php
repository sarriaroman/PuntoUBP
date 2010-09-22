<?php

	$time = time();	
	$id_select = 'select_' . $time;
	$language_selected = 'language_selected' . $time;

	$languages = $vars['languages'];
	
	$twoflags = $vars['twoflags'];
	if(!$twoflags)
		$twoflags = false;
	
	$internalname = $vars['internalname'];
	if(!$internalname)
		$internalname = "languages";
	
	$current_language = $vars['current_language'];
	if(!$current_language)
		$current_language = translationbrowser_get_current_language();
		
	$body .= elgg_echo("translationbrowser:selectlanguage");
	$body .= elgg_view("input/translationbrowser_pulldown", array(
																	'class'	=> 'select_languages', 
																	"internalid" => $id_select, 
																	'internalname' => $internalname,
																	'options_values' => $languages, 
																	'value' => $current_language
															));
	 														
	$body .= "<div class='language-selected' id='{$language_selected}'><span class='current_language'></span><span class='percent'></span></div>";
	echo $body;
	
	
?>

<script type="text/javascript">

	jQuery(document).ready(function(){
		putFlag(jQuery('#<?php echo $id_select; ?>'));
	})

	jQuery('#<?php echo $id_select; ?>').change(function(){
			putFlag(this);
	});
	
	function putFlag(oObject){
			sLangCode = jQuery(oObject).find('option:selected').val().split('#');
			sLangCode = sLangCode[0];
			if(sLangCode!=0){
				<?php
					if($twoflags){
				?>
						put2Flag(sLangCode, oObject);
				<?php
					}else{
				?>
						put1Flag(sLangCode, oObject);
				<?php
					}
				?>
			}
			else
				$('#<?php echo $language_selected; ?> .current_language').html("");
	}

	
	function put1Flag(sLangCode, oObject){
		$('#<?php echo $language_selected; ?> .current_language').html("<?= elgg_echo("translationbrowser:yourselectedlanguage")?>: <img src='<?= $vars['url'] ?>/mod/translationbrowser/flags/" + sLangCode + ".gif' /><span class=\"language_text\">" + jQuery(oObject).find('option:selected').text() + "</span>");('#<?php echo $language_selected; ?> .current_language').html("<?= elgg_echo("translationbrowser:yourselectedlanguage")?>: <img src='<?= $vars['url'] ?>/mod/translationbrowser/flags/" + sLangCode + ".gif' /><span class=\"language_text\">" + jQuery(oObject).find('option:selected').text() + "</span>");
	}
	
	function put2Flag(sLangCode, oObject){

		sLangCodeBase = "<?php echo translationbrowser_get_base_language()->code; ?>";
		sLangCodeName = "<?php echo translationbrowser_get_base_language(false)->name; ?>";
		
		sFlagFrom = "<img src='<?= $vars['url'] ?>/mod/translationbrowser/flags/" + sLangCodeBase + ".gif' />";
		sFlagTo = "<img src='<?= $vars['url'] ?>/mod/translationbrowser/flags/" + sLangCode + ".gif' />";

		sTextFrom = "<?php echo elgg_echo('form') ?>";
		sTextFrom = "<span class=\"language_text\">" + sLangCodeName + "</span>";
		sTextTo = "<span class=\"language_text\">" + $(oObject).find('option:selected').text() + "</span>";
		
		$('#<?php echo $language_selected; ?> .current_language').html("<?php echo elgg_echo("translationbrowser:youwilltranslate"); ?>" + sFlagFrom + sTextFrom + " <?php echo elgg_echo('translationbrowser:to') ?> " + sFlagTo + sTextTo);
		
	}
	
	
</script>



	