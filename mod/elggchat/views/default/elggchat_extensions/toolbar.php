<div>

    <?php
    if (isloggedin ()) {
        $user = get_loggedin_user();

        $count = get_entities_from_relationship('friendrequest', $user->guid, true, "", "", 0, "", 0, 0, true);

        if (!empty($count)) {
            echo "<a href='" . $CONFIG->wwwroot . "pg/friend_request' class='btns' title='" . elgg_echo('friend_request:new') . "'><img src='" . $vars['url'] . "mod/elggchat/_graphics/_icons/user_add.png' title='Solicitudes de amistad' /><div id='bubble_number_friendrequest'>" . $count . "</div></a>";
        }
    }
    ?>

    <a onclick="$('#latest_river').slideToggle('slow');" class="btns"><img src="<?php echo $vars['url']; ?>mod/elggchat/_graphics/_icons/notifications.png" title="Notificaciones" /><div id="bubble_number_notifications">5</div></a>

    <?php
    //get unread messages
    $num_messages = count_unread_messages();
    if ($num_messages) {
        if ($num_messages > 9) {
            $num .= "9+";
        } else {
            $num = $num_messages;
        }
    } else {
        $num = 0;
    }

    $img_path = $vars['url'] . "_graphics/icons/dashboard/";

    if ($num == 0) {
    ?>

        <a href="<?php echo $vars['url']; ?>pg/messages/<?php echo $_SESSION['user']->username; ?>" class="btns" ><img src="<?php echo $img_path; ?>email_read.png" /></a>

    <?php
    } else {
    ?>

        <a href="<?php echo $vars['url']; ?>pg/messages/<?php echo $_SESSION['user']->username; ?>" class="btns" ><img src="<?php echo $img_path; ?>email_unread.png" /><div id="bubble_number_messages"><?php echo $num; ?></div></a>

    <?php
    }
    ?>

    <a href="<?php echo $vars['url']; ?>pg/photos/owned/<?php echo $_SESSION['user']->username; ?>" class="btns"><img src="<?php echo $vars['url']; ?>mod/elggchat/_graphics/_icons/photos.png" title="Fotos" /></a>

    <a href="<?php echo $vars['url']; ?>pg/groups/world/<?php echo $_SESSION['user']->username; ?>" class="btns"><img src="<?php echo $vars['url']; ?>mod/elggchat/_graphics/_icons/groups.png" title="Grupos" /></a>

    <!--<a href="<?php echo $vars['url']; ?>pg/profile/<?php echo $_SESSION['user']->username; ?>" class="btns"><img src="<?php echo $vars['url']; ?>mod/elggchat/_graphics/_icons/profile.png" title="Perfil" /></a>


    <a href="<?php echo $vars['url']; ?>pg/settings/user/<?php echo $_SESSION['user']->username; ?>" class="btns"><img src="<?php echo $vars['url']; ?>mod/elggchat/_graphics/_icons/config.png" title="Configuraci&oacute;n" /></a>-->


</div>