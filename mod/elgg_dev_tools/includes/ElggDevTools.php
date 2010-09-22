<?php
/*******************************************************************************
 * Elgg Developer Tools Main Logic
 * 
 * This page holds the Elgg Developer Tools Main Logic class
 * 
 * @package Elgg Developer Tools
 * @author Aaron Saray (102degrees.com)
 * @author Cash Costello
 ******************************************************************************/

/**
 * Elgg Developer Tools Main Logic 
 * 
 * 
 */
class ElggDevTools 
{
    /**
     * Launcher executes functionality on plugin init  
     * 
     * Launcher is responsible for querying the settings and running anything
     * that is demanded to run initially.
     */
    public static function launcher()
    {
        $displayerrors = get_plugin_setting('displayerrors', 'elgg_developer_tools');
        if ($displayerrors) ini_set('display_errors', 1);
        
        /** delete views if its requested **/
        $deleteviews = get_plugin_setting('deleteviews', 'elgg_developer_tools');
        if ($deleteviews) self::_deleteViews();
        
        /** include firePHP if need be **/
        $firephp = get_plugin_setting('enablefirephp', 'elgg_developer_tools');
        if ($firephp) {
            require_once dirname(__FILE__) . '/firephp/FirePHP.class.php';
            require_once dirname(__FILE__) . '/firephp/fb.php';
        }
        else {
            require_once dirname(__FILE__) . '/FirePHPDisabled.php';
        }
    }
    
    public static function isTimingOn()
    {
    	return get_plugin_setting('timing', 'elgg_developer_tools');
    }    
}
?>