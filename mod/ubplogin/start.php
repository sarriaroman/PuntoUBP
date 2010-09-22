<?php
	/**
	 * Elgg customindex plugin
	 * This plugin substitutes the frontpage with a custom one
	 * 
	 * @package Customdash
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Boris Glumpler
	 * @copyright Boris Glumpler 2008
	 * @link /travel-junkie.com
	 */

	function customindex_init() {

		register_plugin_hook('index','system','new_index');
		extend_view('css','customindex/css');

	}

	function new_index() {

		if (!@include_once(dirname(dirname(__FILE__))) . "/ubplogin/index.php") return false;
		return true;

	}

	register_elgg_event_handler('init','system','customindex_init');
?>