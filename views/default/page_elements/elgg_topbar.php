<!--<script src="<?php //echo $vars['url'];       ?>views/default/messages/pubp/jquery.js" type="text/javascript"></script>
<script src="<?php //echo $vars['url'];       ?>views/default/messages/pubp/ui.mins.js" type="text/javascript"></script>-->

<script type="text/javascript" src="<?php echo $vars['url']; ?>views/default/page_elements/jquery.watermarkinput.js"></script>
<?php
/**
 * Elgg top toolbar
 * The standard elgg top toolbar
 *
 * @package Elgg
 * @subpackage Core
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Curverider Ltd
 * @copyright Curverider Ltd 2008-2009
 * @link http://elgg.org/
 *
 */
?>

<?php
if (isloggedin ()) {
?>

    <div id="elgg_topbar">

        <div id="elgg_topbar_container_left">
            <div class="toolbarimages">
                <a href="<?php echo $vars['url']; ?>pg/dashboard/"><img src="<?php echo $vars['url']; ?>_graphics/logo.jpg" /></a>

                        <!--<a href="<?php echo $_SESSION['user']->getURL(); ?>"><img class="user_mini_avatar" src="<?php echo $_SESSION['user']->getIcon('topbar'); ?>"></a>-->

            </div>
            <div class="toolbarlinks">
                <a href="<?php echo $vars['url']; ?>pg/dashboard/" class="pagelinks"><?php echo elgg_echo('dashboard'); ?></a>
            </div>
        <?php
        // Vuelto a comentar xD //echo elgg_view("navigation/topbar_tools"); //volver a comentar despues
        ?>


        <div class="toolbarlinks2">		
            <?php
            //allow people to extend this top menu
            echo elgg_view('elgg_topbar/extend', $vars);
            ?>

<!--<a href="<?php echo $vars['url']; ?>pg/settings/" class="usersettings"><?php echo elgg_echo('settings'); ?></a>-->


        </div>


    </div>


    <div id="elgg_topbar_container_right">
        <!--<a href="<?php echo $vars['url']; ?>action/logout" class="pagelinks"><?php echo elgg_echo('logout'); ?></a>-->
        <a onclick="$('#pubpusersettings').toggle();" class="pagelinks" style="cursor: pointer;" id="pubpaccountbutton" > Cuenta </a>
    </div>

    <script type="text/javascript">
        /*$(document).ready(function(){
            $('#pubpaccountbutton').mouseout(function(){
                $('#pubpusersettings').mouseout(function(){
                    $(document).click(function(){
                        if( $('#pubpusersettings').attr("display") != "none" ) {
                            $('#pubpusersettings').hide();

                            return false;
                        }
                    });
                });
            });
            $('#pubpaccountbutton').mouseover(function(){
                $('#pubpaccountbutton').click(function(){
                    $('#pubpusersettings').toggle();

                    return false;
                });
            });
        });*/
    </script>

    <div id="elgg_topbar_container_search">
        <form id="searchform" action="<?php echo $vars['url']; ?>search/" method="get">
            <input type="text" size="21" name="tag" value="B&uacute;squeda" onclick="if (this.value=='B&uacute;squeda') { this.value='' }" class="search_input" />
            <input type="hidden" value="Go" class="search_submit_button" />
        </form>
    </div>

</div><!-- /#elgg_topbar -->

<!-- Caja de Usuario -->

<style>
    #pubpusersettings{
        position: absolute;
        /*float:right;*/
        right: 0px;
        background-color: white;
        border: 1px solid black;
        display: none;
        min-width: 200px;
    }

    #pubpusersettings ul {
        list-style-type: none;
        padding-left: 0px;
        margin: 5px 0 5px;
    }

    #pubpusersettings ul li {
        display: block;
        padding: 3px;
    }

    #pubpusersettings ul li:hover {
        background-color: #971800;
        color: white;
        border-top: 1px solid #F7DAD8;
        border-bottom: 1px solid #F7DAD8;
    }

    #pubpusersettings ul li a {
        padding-left: 4px;
        white-space: nowrap;
        display: block;
        height: auto;
    }

    #pubpusersettings ul li:hover a {
        color: white;
        text-decoration: none;
    }

    #pubpuseraccount {
        margin: 5px;
        padding: 3px;
        position: relative;
        display: block;
        overflow: hidden;
        border-bottom: 1px solid #cccccc;
    }

    #pubpusersettings ul #pubpuseraccount:hover {
        background-color: white;
        color: #AD4531;
        border-top: 0px;
        border-bottom: 1px solid #cccccc;
    }

    #pubpusersettings ul #pubpuseraccount:hover a {
        background-color: white;
        color: #AD4531;
        font-weight: normal;
    }

    #pubpuseraccount #pubpuserpic {
        position: relative;
        margin: 3px;
        float: left;
    }

    #pubpuseraccount #pubpusername {
        position: relative;
        margin: 2px;
        margin-left: 5px;
        margin-right: 5px;
        float: left;
    }
</style>
<div id="pubpusersettings">
    <ul>
        <li id="pubpuseraccount">
            <a href="<?php echo $_SESSION['user']->getURL(); ?>" id="pubpuserpic">
                <img src="<?php echo $_SESSION['user']->getIcon('small'); ?>"  />
            </a>
            <a href="<?php echo $_SESSION['user']->getURL(); ?>" id="pubpusername">
                <?php echo $_SESSION['user']->name; ?>
            </a>
        </li>
        <li>
            <a href="<?php echo $vars['url']; ?>pg/profile/<?php echo $_SESSION['user']->username; ?>">Mi Perfil</a>
        </li>
        <li>
            <a href="<?php echo $vars['url']; ?>pg/friends/<?php echo $_SESSION['user']->username; ?>">Lista de Amigos</a>
        </li>
        <li>
            <a href="<?php echo $vars['url']; ?>pg/settings/user/<?php echo $_SESSION['user']->username; ?>">Configuraci&oacute;n</a>
        </li>
        <?php
                // The administration link is for admin or site admin users only
                if ($vars['user']->admin || $vars['user']->siteadmin) {
        ?>
                    <li>
                        <a href="<?php echo $vars['url']; ?>pg/admin/" title="<?php echo elgg_echo("admin"); ?>">Configuraci&oacute; del Sitio</a>
                    </li>

        <?php
                }
        ?>
                <li>
                    <a href="<?php echo $vars['url']; ?>action/logout"><?php echo elgg_echo('logout'); ?></a>
                </li>
            </ul>

        </div>

        <!-- ---------------- -->

        <div class="clearfloat"></div>

<?php
            }
?>
