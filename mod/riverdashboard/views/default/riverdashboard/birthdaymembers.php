<?php
/**
 * Elgg thewire view page
 * 
 * @package ElggTheWire
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Curverider <info@elgg.com>
 * @copyright Curverider Ltd 2008-2009
 * @link http://elgg.com/
 * 
 */
$contents = array();
$contents['all'] = 'all';
if (!empty($vars['config']->registered_entities)) {
    foreach ($vars['config']->registered_entities as $type => $ar) {
        foreach ($vars['config']->registered_entities[$type] as $object) {
            if (!empty($object)) {
                $keyname = 'item:' . $type . ':' . $object;
            } else
                $keyname = 'item:' . $type;
            $contents[$keyname] = "{$type},{$object}";
        }
    }
}

$allselect = '';
$friendsselect = '';
$mineselect = '';
switch ($vars['orient']) {
    case '': $allselect = 'class="selected"';
        break;
    case 'friends': $friendsselect = 'class="selected"';
        break;
    case 'mine': $mineselect = 'class="selected"';
        break;
}
?>

<div class="sidebarBox">
    <!--<h3>Secci&oacute;n</h3>-->
    <div class="membersWrapper">
        <?php
        foreach ($contents as $label => $content) {
            if (("{$vars['type']},{$vars['subtype']}" == $content) ||
                    (empty($vars['subtype']) && $content == 'all')) {
                $selected = 'selected="selected"';
            } else
                $selected = '';
            $img_path = $vars['url'] . "_graphics/icons/dashboard/";
            $img = "";
            switch ($content) {
                case "all": $img = "layout_content.png";
                    break;
                case "user,": $img = "user.png";
                    break;
                case "group,": $img = "group.png";
                    break;
                case "object,image": $img = "image.png";
                    break;

                case "object,album": $img = "images.png";
                    break;
            }
            echo "<a style=\"
						cursor:pointer;
						text-decoration:none;
						font-family:Verdana, Arial, Helvetica, sans-serif;
				        font-size:10px;
				        display:inline-block;
				        vertical-align:middle;
						line-height:14px;
						\" onclick=\"javascript:$('#river_container').load('" . $vars['url'] . "mod/riverdashboard/?callback=true&display=all&content=" . $content . "');\" ><img src=\"" . $img_path . $img . "\" style=\"margin: 0 5px 2px 0;display: inline;float: left;\" />" . elgg_echo($label) . "</a><br />";
        }

//			href=\"#\"
        ?>

        <div class="clearfloat"></div>
    </div>
</div>