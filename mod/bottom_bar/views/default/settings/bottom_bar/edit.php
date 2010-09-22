<b><?php echo elgg_echo('bbar:admin:basicopts'); ?>:</b>
<br><br>
<table>
  <tr>
    <td><?php echo elgg_echo('bbar:admin:refreshrate'); ?></td>
    <td>&nbsp;</td>
    <td>
      <select name="params[refresh_rate]">
        <option value="1" <?php if ($vars['entity']->refresh_rate == 1) echo "selected=\"yes\" "; ?>>1 <?php echo elgg_echo('bbar:admin:second'); ?></option>
        <option value="5" <?php if ($vars['entity']->refresh_rate == 5) echo "selected=\"yes\" "; ?>>5 <?php echo elgg_echo('bbar:admin:seconds'); ?></option>
        <option value="10" <?php if ($vars['entity']->refresh_rate == 10) echo "selected=\"yes\" "; ?>>10 <?php echo elgg_echo('bbar:admin:seconds'); ?></option>
        <option value="15" <?php if ($vars['entity']->refresh_rate == 15) echo "selected=\"yes\" "; ?>>15 <?php echo elgg_echo('bbar:admin:seconds'); ?></option>
        <option value="30" <?php if (!$vars['entity']->refresh_rate || $vars['entity']->refresh_rate == 30) echo "selected=\"yes\" "; ?>>30 <?php echo elgg_echo('bbar:admin:seconds'); ?></option>
        <option value="45" <?php if ($vars['entity']->refresh_rate == 45) echo "selected=\"yes\" "; ?>>45 <?php echo elgg_echo('bbar:admin:seconds'); ?></option>
        <option value="60" <?php if ($vars['entity']->refresh_rate == 60) echo "selected=\"yes\" "; ?>>1 <?php echo elgg_echo('bbar:admin:minute'); ?></option>
        <option value="90" <?php if ($vars['entity']->refresh_rate == 90) echo "selected=\"yes\" "; ?>>1.5 <?php echo elgg_echo('bbar:admin:minutes'); ?></option>
        <option value="120" <?php if ($vars['entity']->refresh_rate == 120) echo "selected=\"yes\" "; ?>>2 <?php echo elgg_echo('bbar:admin:minutes'); ?></option>
      </select>
    </td>
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr>
    <td><?php echo elgg_echo('bbar:admin:idlethreshold'); ?></td>
    <td>&nbsp;</td>
    <td>
      <select name="params[idle_threshold]">
        <option value="1" <?php if ($vars['entity']->idle_threshold == 1) echo "selected=\"yes\" "; ?>>1 <?php echo elgg_echo('bbar:admin:minute'); ?></option>
        <option value="2" <?php if ($vars['entity']->idle_threshold == 2) echo "selected=\"yes\" "; ?>>2 <?php echo elgg_echo('bbar:admin:minutes'); ?></option>
        <option value="3" <?php if ($vars['entity']->idle_threshold == 3) echo "selected=\"yes\" "; ?>>3 <?php echo elgg_echo('bbar:admin:minutes'); ?></option>
        <option value="4" <?php if ($vars['entity']->idle_threshold == 4) echo "selected=\"yes\" "; ?>>4 <?php echo elgg_echo('bbar:admin:minutes'); ?></option>
        <option value="5" <?php if (!$vars['entity']->idle_threshold || $vars['entity']->idle_threshold == 5) echo "selected=\"yes\" "; ?>>5 <?php echo elgg_echo('bbar:admin:minutes'); ?></option>
      </select>
    </td>
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr>
    <td><?php echo elgg_echo('bbar:admin:offlinethreshold'); ?></td>
    <td>&nbsp;</td>
    <td>
      <select name="params[offline_threshold]">
        <option value="5" <?php if ($vars['entity']->offline_threshold == 5) echo "selected=\"yes\" "; ?>>5 <?php echo elgg_echo('bbar:admin:minutes'); ?></option>
        <option value="6" <?php if ($vars['entity']->offline_threshold == 6) echo "selected=\"yes\" "; ?>>6 <?php echo elgg_echo('bbar:admin:minutes'); ?></option>
        <option value="7" <?php if ($vars['entity']->offline_threshold == 7) echo "selected=\"yes\" "; ?>>7 <?php echo elgg_echo('bbar:admin:minutes'); ?></option>
        <option value="8" <?php if ($vars['entity']->offline_threshold == 8) echo "selected=\"yes\" "; ?>>8 <?php echo elgg_echo('bbar:admin:minutes'); ?></option>
        <option value="9" <?php if ($vars['entity']->offline_threshold == 9) echo "selected=\"yes\" "; ?>>9 <?php echo elgg_echo('bbar:admin:minutes'); ?></option>
        <option value="10" <?php if (!$vars['entity']->offline_threshold || $vars['entity']->offline_threshold == 10) echo "selected=\"yes\" "; ?>>10 <?php echo elgg_echo('bbar:admin:minutes'); ?></option>
      </select>
    </td>
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr>
    <td><?php echo elgg_echo('bbar:admin:allowchat'); ?></td>
    <td>&nbsp;</td>
    <td>
      <select name="params[allow_messaging]">
        <option value="true" <?php if (!$vars['entity']->allow_messaging || $vars['entity']->allow_messaging == "true") echo "selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
        <option value="false" <?php if ($vars['entity']->allow_messaging == "false") echo "selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
      </select>
    </td>
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr>
    <td><?php echo elgg_echo('bbar:admin:forceloginpage'); ?></td>
    <td>&nbsp;</td>
    <td>
      <select name="params[force_login]">
        <option value="true" <?php if (!$vars['entity']->force_login || $vars['entity']->force_login == "true") echo "selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
        <option value="false" <?php if ($vars['entity']->force_login == "false") echo "selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
      </select>
    </td>
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr>
    <td><?php echo elgg_echo('bbar:admin:allowmenu'); ?></td>
    <td>&nbsp;</td>
    <td>
      <select name="params[allow_menu]">
        <option value="none" <?php if ($vars['entity']->allow_menu == "none") echo "selected=\"yes\" "; ?>><?php echo elgg_echo('disable'); ?></option>
        <option value="menu" <?php if (!$vars['entity']->allow_menu || $vars['entity']->allow_menu == "menu") echo "selected=\"yes\" "; ?>><?php echo elgg_echo('tools'); ?></option>
        <option value="wire" <?php if ($vars['entity']->allow_menu == "wire") echo "selected=\"yes\" "; ?>><?php echo elgg_echo('thewire'); ?></option>
      </select>
    </td>
  </tr>
</table>
<br>
<table>
  <tr>
    <td><?php echo elgg_echo('bbar:admin:allowradio'); ?></td>
    <td>&nbsp;</td>
    <td>
      <select name="params[allow_radio]">
        <option value="true" <?php if ($vars['entity']->allow_radio == "true") echo "selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
        <option value="false" <?php if (!$vars['entity']->allow_radio || $vars['entity']->allow_radio == "false") echo "selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
      </select>
    </td>
  </tr>
</table>

</p>&nbsp;</p>
<p>
  <?php echo elgg_echo('bbar:admin:radiourl'); ?>
  <br><br>
  <?php echo elgg_view('input/text',array('internalname'=>'params[radio_url]','value'=>get_plugin_setting('radio_url', 'bottom_bar'))); ?>
</p>

</p>&nbsp;</p>
<p>
  <?php echo elgg_echo('bbar:admin:logolocation'); ?>
  <br><br>
  <?php echo elgg_view('input/text',array('internalname'=>'params[logo_name]','value'=>get_plugin_setting('logo_name', 'bottom_bar'))); ?>
</p>

<hr>
<b><?php echo elgg_echo('bbar:admin:dbopts'); ?></b>
<br><br>
<?php if (function_exists("sqlite_open")) { ?>

<p>
<?php echo elgg_echo('bbar:admin:dboptsdesc'); ?>
</p>
<br><br>
<table>
  <tr>
    <td><?php echo elgg_echo('bbar:admin:dboptstype'); ?>&nbsp;</td>
    <td>
      <select name="params[database_type]">
	<option value="SQLite" <?php if (!$vars['entity']->database_type || $vars['entity']->database_type == "SQLite") echo "selected=\"yes\" "; ?>>SQLite</option>
	<option value="ELGG" <?php if ($vars['entity']->database_type == "ELGG") echo "selected=\"yes\" "; ?>>ELGG Objects</option>
	<option value="MySQL" <?php if ($vars['entity']->database_type == "MySQL") echo "selected=\"yes\" "; ?>>MySQL Direct</option>
      </select>
    </td>
  </tr>
  <tr><td>&nbsp;</td></tr>
<!--
  <tr><td colspan=2><?php echo elgg_echo('bbar:admin:dbmysqlopts'); ?></td></tr>
  <tr><td>&nbsp;</td></tr>
  <tr>
    <td><?php echo elgg_echo('bbar:admin:dboptsuseelgg'); ?></td>
    <td>
      <select name="params[database_use_elgg]">
	<option value="true" <?php if (!$vars['entity']->database_use_elgg || $vars['entity']->database_use_elgg == "true") echo "selected=\"yes\" "; ?>>Yes</option>
	<option value="false" <?php if ($vars['entity']->database_use_elgg == "false") echo "selected=\"yes\" "; ?>>No</option>
      </select>
    </td>
  </tr>
  <tr><td>&nbsp;</td></tr>
-->
  <tr><td colspan=2><?php echo elgg_echo('bbar:admin:dbmysqlsettings'); ?></td></tr>
  <tr><td>&nbsp;</td></tr>
  <tr><td><?php echo elgg_echo('bbar:admin:dbmysqlhost'); ?></td><td> <?php echo elgg_view('input/text',array('internalname'=>'params[database_host]','value'=>get_plugin_setting('database_host', 'bottom_bar'))); ?></td></tr>
  <tr><td>&nbsp;</td></tr>
  <tr><td><?php echo elgg_echo('bbar:admin:dbmysqluser'); ?></td><td> <?php echo elgg_view('input/text',array('internalname'=>'params[database_username]','value'=>get_plugin_setting('database_username', 'bottom_bar'))); ?></td></tr>
  <tr><td>&nbsp;</td></tr>
  <tr><td><?php echo elgg_echo('bbar:admin:dbmysqlpass'); ?></td><td> <?php echo elgg_view('input/password',array('internalname'=>'params[database_password]','value'=>get_plugin_setting('database_password', 'bottom_bar'))); ?></td></tr>
  <tr><td>&nbsp;</td></tr>
  <tr><td><?php echo elgg_echo('bbar:admin:dbmysqldbase'); ?></td><td> <?php echo elgg_view('input/text',array('internalname'=>'params[database_dbname]','value'=>get_plugin_setting('database_dbname', 'bottom_bar'))); ?></td></tr>
  <tr><td>&nbsp;</td></tr>
  <tr><td><?php echo elgg_echo('bbar:admin:dbmysqlprefix'); ?></td><td> <?php echo elgg_view('input/text',array('internalname'=>'params[database_prefix]','value'=>get_plugin_setting('database_prefix', 'bottom_bar'))); ?></td></tr>
</table>

<?php } else { 
  echo "<p>" . elgg_echo('bbar:admin:nosqlite') . "</p>";
  $vars['entity']->database_type = "MySQL";
}
?>
