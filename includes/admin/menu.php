<?php

namespace PluginName\Admin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Menu
 *
 * Handles the admin menu item(s)
 *
 * @since   1.0.0
 */
class Menu {

	/**
	 * Menu constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

		add_action( 'admin_menu', array( $this, 'admin_menus' ) );
	}

	/**
	 * Add the menu items
	 *
	 * @since 1.0.0
	 */
	public function admin_menus() {

		$svg_icon = '';

		add_menu_page( __( 'Checkfront Booking Calendar Settings', 'pslug' ), __( 'Checkfront Booking Calendar', 'pslug' ), 'manage_options', 'pslug_settings', function () {
			$page = new Settings( 'settings' );
			$page->html();
		}, $svg_icon );
	}
}
