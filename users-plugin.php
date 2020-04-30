<?php
/**
 * @package Usersplugin
 */
/*
 Plugin Name: Users plugin
 Plugin URI: http://users-properties.com/plugin
 Description: This is my users plugin for a new properties
 Version: 1.0.0
 Author: Diego Silva Rojas
 Author URI: http://users-properties.com/
 License: GPLv2 or later
 Text Domain: users-properties-plugin
 */

 // if (!defined('ABSPATH')){
//     die;
// }

defined('ABSPATH') or die('Can not access');

// if(!function_exists('add_action')){
//     echo 'Can not access';
//     exit;
// }

class UsersPlugin
{
    // function __construct(string $string)
    function __construct()
    {
        add_action('init', array($this,'custom_post_type'));
        // add_action('init','custom_post_type');
        // echo $string;
    }

    function activate()
    {
        $this->custom_post_type();
        // echo 'The plugin was activated';
        flush_rewrite_rules();
    }

    function deactivate()
    {
        // echo 'The plugin was deactivated';
        flush_rewrite_rules();
    }
    function uninstall()
    {

    }

    function custom_post_type()
    {
        register_post_type( 'book' , ['public' => true, 'label' => 'Books'] );
    }

    
}

if( class_exists('UsersPlugin')){
    // $usersPlugin= new UsersPlugin('Users plugin started');
    $usersPlugin= new UsersPlugin();
}

//activation
register_activation_hook( __FILE__ ,array($usersPlugin, 'activate') );

//deactivation
register_deactivation_hook( __FILE__ ,array($usersPlugin, 'deactivate') );

//unistall
register_uninstall_hook( __FILE__ , array($usersPlugin, 'uninstall') );