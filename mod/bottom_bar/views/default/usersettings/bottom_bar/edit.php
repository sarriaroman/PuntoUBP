<table>
  <tr>
    <td><?php echo elgg_echo('bbar:user:enablechat'); ?></td>
    <td>&nbsp;</td>
    <td>
      <select name="params[chat_enabled]">
        <option value="true" <?php if (!$vars['entity']->chat_enabled || $vars['entity']->allow_messaging == "true") echo "selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
        <option value="false" <?php if ($vars['entity']->chat_enabled == "false") echo "selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
      </select>
    </td>
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr>
    <td><?php echo elgg_echo('bbar:user:enablesounds'); ?></td>
    <td>&nbsp;</td>
    <td>
      <select name="params[sound_enabled]">
        <option value="true" <?php if (!$vars['entity']->sound_enabled || $vars['entity']->sound_enabled == "true") echo "selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
        <option value="false" <?php if ($vars['entity']->sound_enabled == "false") echo "selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
      </select>
    </td>
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr>
    <td><?php echo elgg_echo('bbar:user:enableicons'); ?></td>
    <td>&nbsp;</td>
    <td>
      <select name="params[friends_icons]">
        <option value="true" <?php if (!$vars['entity']->friends_icons || $vars['entity']->friends_icons == "true") echo "selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
        <option value="false" <?php if ($vars['entity']->friends_icons == "false") echo "selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
      </select>
    </td>
  </tr>
</table>

