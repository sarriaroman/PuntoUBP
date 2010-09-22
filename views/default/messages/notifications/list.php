<?php
/**
 * Elgg list system messages
 * Lists system messages
 * 
 * @package Elgg
 * @subpackage Core
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Curverider Ltd
 * @copyright Curverider Ltd 2008-2009
 * @link http://elgg.org/
 * 
 * @uses $vars['object'] An array of system messages
 */
?>

<!-- Dependencies -->
<!-- jQuery UI -->
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/smoothness/jquery-ui.css" media="all" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.js"></script>
<!-- Theme Switcher Widget -->
<link type="text/css" rel="stylesheet" href="http://jqueryui.com/themes/base/ui.all.css" />
<script type="text/javascript" src="http://jqueryui.com/themeroller/themeswitchertool/"></script> 
<script src="<?php echo $vars['url']; ?>views/default/messages/notifications/script/jquery.pnotify.min.js" type="text/javascript"></script>
<link href="<?php echo $vars['url']; ?>views/default/messages/notifications/script/jquery.pnotify.default.css" rel="stylesheet" type="text/css" media="screen" />

<style type="text/css">
    /* Custom styled notice CSS */
    .ui-pnotify.custom {
        font-family: "Palatino Linotype","Book Antiqua",Palatino,serif;
        font-weight: bold;
        text-shadow: 1px 1px 0.5px black;
    }
    .ui-pnotify.custom .ui-pnotify-container {
        background-color: #60D6A7;
        background-image: none;
        border: 3px ridge #21825B;
    }
    .ui-pnotify.custom .ui-pnotify-title {
        font-size: 15pt;
        color: #007143;
    }
    .ui-pnotify.custom .ui-pnotify-text {
        font-size: 11pt;
        color: #A66000;
    }
    .ui-pnotify.custom .ui-pnotify-closer {
        position: absolute;
        bottom: 4px;
        right: 4px;
    }
    .ui-pnotify.custom .ui-pnotify-icon {
        float: right;
    }
    .ui-pnotify.custom .picon {
        margin: 3px;
        width: 33px;
        height: 33px;
    }

    /* Alternate stack initial positioning. */
    .ui-pnotify.stack-topleft {
        top: 15px;
        left: 15px;
        right: auto;
    }
    .ui-pnotify.stack-bottomleft {
        bottom: 15px;
        left: 15px;
        top: auto;
        right: auto;
    }
    /* This one is done through code, to show how it is done. Look down
			   at the stack_bottomright variable in the JavaScript below. */
    .ui-pnotify.stack-bottomright {
        /* These are just CSS default values to reset the pnotify CSS. */
        right: auto;
        top: auto;
    }
    .ui-pnotify.stack-custom {
        top: 20%;
        left: 20%;
        right: auto;
    }
    .ui-pnotify.stack-custom2 {
        top: auto;
        left: auto;
        bottom: 20%;
        right: 20%;
    }
    /* ]]> */
</style>
<script>

    function show_notification(text,err) {
        var stack_bottomleft = {"dir1": "right", "dir2": "up"};
        
        var opts = {
            pnotify_title: "Notificacion",
            pnotify_text: text,
            pnotify_addclass: "stack-bottomleft",
            pnotify_stack: stack_bottomleft,
            pnotify_history: false
        };
        if (err == "true") {
            opts.pnotify_title = "Error";
            opts.pnotify_text = text;
            opts.pnotify_type = "error";
        }
        $.pnotify(opts);
    };
</script>
<?
if (!empty($vars['object']) && is_array($vars['object'])) {

    foreach ($vars['object'] as $message) {
        if (empty($message) && is_null($message))
            break;

        $mensaje = "'" . elgg_echo($message) . "'";

        $tipo = "false";
        if ($vars['register'] == "messages") {
            $tipo = "false";
        } else {
            $tipo = "true";
        }
        print "<script> show_notification({$mensaje}, '{$tipo}' ); </script>";
    }
}
?>