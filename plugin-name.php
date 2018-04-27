<?php
/**
* Plugin Name: Plugin Name
* Description: Description.
* Author: Nick Young
* Author URI:  nickyoungweb.com
* Version: 1.0.0
* Text Domain: pslug
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$plugin_path = trailingslashit( dirname( __FILE__ ) );
$plugin_dir  = plugin_dir_url( __FILE__ );

if ( ! defined( 'PSLUG_PLUGIN_VERSION' ) ) {
	define( 'PSLUG_PLUGIN_VERSION', '1.0.0' );
}

if ( ! defined( 'PSLUG_INCLUDES' ) ) {
	define( 'PSLUG_INCLUDES', $plugin_path . 'includes/' );
}

if ( ! defined( 'PSLUG_ASSETS' ) ) {
	define( 'PSLUG_ASSETS', $plugin_dir . 'assets/' );
}

require_once( PSLUG_INCLUDES . 'autoload.php' );

require_once( PSLUG_INCLUDES . 'main.php' );
