<?php 

require_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/engine/start.php');

echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<playlist version="1" xmlns="http://xspf.org/ns/0/">';
echo '    <title>ELGG Radio</title>';
echo '    <info>' . $CONFIG->wwwroot . '</info>';
echo '    <trackList>';
echo '        <track><location>' . get_plugin_setting('radio_url', 'bottom_bar') . '</location></track>';
echo '    </trackList>';
echo '</playlist>';
?>

