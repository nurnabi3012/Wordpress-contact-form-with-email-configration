<?php 
/*
* Plugin Name:          WPN Contact Form
* Plugin URI:
* Description:          this plugin for Login page design
* Version:              1.0.0
* Requires at Least:    5.2 
* Requires PHP:         7.2
* Author:               Mohammad Noor
* Author URI:           https://www.facebook.com/nurnabiislam2003
* Lincense:             GPL v2 or later
* Text Domain:          wpnc
*/

if(! defined( 'ABSPATH' ) ) exit ;

// Plugin path define
define( 'MY_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

//file inclide
require_once MY_PLUGIN_PATH . 'includes/admin.php';
require_once MY_PLUGIN_PATH . 'includes/template/front_shortcode.php';
require_once MY_PLUGIN_PATH . 'includes/template/db_create.php';
?>
