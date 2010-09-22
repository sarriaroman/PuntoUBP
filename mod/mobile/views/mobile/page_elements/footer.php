<?php
/**
 * Elgg Mobile
 * A Mobile Client For Elgg
 *
 * @package Elgg
 * @subpackage Core
 * @author Mark Harding
 * @link http://maestrozone.com
 *
 */

?>

<div class="clearfloat"></div>


<div class="clearfloat"></div>

</div><!-- /#page_wrapper -->
</div><!-- /#page_container -->

<div id="layout_footer">

		<div id="mobile_elgg">
        
		<a href="http://www.elgg.org" target="_blank">
		<img src="<?php echo $vars['url']; ?>_graphics/powered_by_elgg_badge_drk_bckgnd.gif" border="0" />
		</a>
        
        </div>
		<?php if (isloggedin()){ ?>
		<div id="mobile_logout">
        <a href="<?php echo $vars['url']; ?>action/logout"><small><?php echo elgg_echo('logout'); ?></small></a>
		</div>
        <?php } ?>
	
</div><!-- /#layout_footer -->
<!-- insert an analytics view to be extended -->
<?php
	echo elgg_view('footer/analytics');
?>
</body>
</html>