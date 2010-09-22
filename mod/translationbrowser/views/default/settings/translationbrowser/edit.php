<?php
	$accesslist = $vars['entity']->accesslist;
	
	$iso_639_1 = translationbrowser_get_languages();
	$current_language = translationbrowser_get_base_language()->code;
	
?>

<p>
	<?php 
		echo "<h4>" . elgg_echo('translationbrowser:languagebase') . "</h4>";
		
		echo elgg_view('translationbrowser/select_language',array(
																	'current_language' => $current_language,
																	'internalname' => 'params[languages]',
																	'languages' => $iso_639_1,
																 )); 
	
	?>
	
	
	
</p>

<p>
	<?php echo elgg_echo('translationbrowser:userscanedit'); ?>
	
	<select name="params[userscanedit]">
		<option value="yes" <?php if ($vars['entity']->userscanedit == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
		<option value="no" <?php if ($vars['entity']->userscanedit != 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
	</select>
	
</p>


<p>
	<?php echo elgg_view('translationbrowser/input/longtext', array('internalname' => 'params[accesslist]', 'value' => $accesslist, 'disabled' => ($vars['entity']->userscanedit == "yes") ? false : true)); ?>
</p>

