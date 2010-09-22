<?php
/*******************************************************************************
 * Main Admin page with tabs
 * 
 * 
 * 
 * @package Elgg Developer Tools
 * @author Cash Costello
 ******************************************************************************/

	global $CONFIG;
	
	$tab = $vars['tab'];
	
	$settingsselect = ''; 
	$builderselect = '';
	switch($tab) {
		case 'builder':
			$builderselect = 'class="selected"';
			break;
		case 'settings':
		default:
			$settingsselect = 'class="selected"';
			break;
	}
	
?>
<div class="contentWrapper">
	<div id="elgg_horizontal_tabbed_nav">
		<ul>
			<li <?php echo $settingsselect; ?>><a href="<?php echo $CONFIG->wwwroot . 'pg/elgg_dev_tools/settings/'; ?>"><?php echo elgg_echo('elgg_dev_tools:settings'); ?></a></li>
			<li <?php echo $builderselect; ?>><a href="<?php echo $CONFIG->wwwroot . 'pg/elgg_dev_tools/builder/'; ?>"><?php echo elgg_echo('elgg_dev_tools:builder'); ?></a></li>
		</ul>
	</div>
	<br />
<?php
	switch($tab) {
		case 'settings':
			echo elgg_view("elgg_dev_tools/settings");
			break;
		case 'builder':
			echo elgg_view("elgg_dev_tools/builder");
			break;
	}
?>
</div>