<?php

namespace PluginName\Admin\Pages;

use PluginName\Abstracts\Page;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class General
 *
 * Handles the functionality of the General Settings page
 *
 * @since   1.0.0
 */
class General extends Page {

	/**
	 * General constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

		$this->id           = 'general';
		$this->option_group = 'settings';
		$this->label        = esc_html__( 'General', 'pslug' );

		$this->sections = $this->add_sections();
		$this->fields   = $this->add_fields();

	}

	/**
	 * Adds the page sections
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public function add_sections() {

		return apply_filters( 'pslug_admin_settings_general_sections', array(
			'general' => array(
				'title' => '',
			),
		) );

	}

	/**
	 * Adds the fields to the sections
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function add_fields() {

		$fields       = array();
		$this->values = get_option( 'pslug_' . $this->option_group . '_' . $this->id );

		if ( isset( $this->sections ) && is_array( $this->sections ) ) {
			foreach ( $this->sections as $section => $a ) {

				$section = sanitize_key( $section );

				$options = get_option( 'pslug_settings_general' );

				if ( 'general' == $section ) {
					// TODO: Add settings
				}
			}
		}

		return apply_filters( 'pslug_add_' . $this->option_group . '_' . $this->id . '_fields', $fields );
	}

	public function get_post_types() {

		$post_types = get_post_types( array( 'public' => true ) );

		$return = array();

		foreach ( $post_types as $post_type ) {
			$return[ $post_type ] = $post_type;
		}

		return $return;
	}
}
