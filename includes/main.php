<?php

namespace PluginName;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PluginName {

	private static $instance = null;

	public function __construct() {

		$this->load();

		// Load plugin settings
		add_action( 'admin_init', array( $this, 'register_settings' ), 5 );

		// Load plugin text domain for localization
		add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ) );

	}

	public function load() {

		require_once( 'functions/admin.php' );

		$this->objects = new Objects();

		if ( is_admin() ) {

			new Admin\Menu();

		} else {
			// TODO: Load public facing files (i.e. public functions.php)
		}
	}

	public function load_plugin_textdomain() {
		load_plugin_textdomain( 'pslug', false, CBC_INCLUDES . 'languages/' );
	}

	/**
	 * Register the plugin settings
	 *
	 * @since 1.0.0
	 */
	public function register_settings() {
		if ( is_admin() && ! defined( 'DOING_AJAX' ) ) {
			$settings = new Admin\Settings();
			$settings->register_settings( $settings->get_settings() );
		}
	}

	/**
	 * Get the class instance
	 *
	 * @since 1.0.0
	 */
	public static function instance() {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}

/**
 * Return the class instance
 *
 * @since 1.0.0
 */
function PluginName() {
	return PluginName::instance();
}

// Initialize the plugin
PluginName();
