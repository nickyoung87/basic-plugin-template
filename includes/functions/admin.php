<?php

/**
 * misc admin functions
 *
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Grab all of the admin pages from an object
 *
 * @return array
 * @since 1.0.0
 */
function cbc_get_admin_pages() {
	$objects = \PluginName\PluginName()->objects;

	return $objects instanceof \PluginName\Objects ? $objects->get_admin_pages() : array();
}

/**
 * Get a specific admin page object
 *
 * @param $page
 *
 * @return bool
 * @since 1.0.0
 */
function cbc_get_admin_page( $page ) {
	$objects = \PluginName\PluginName()->objects;

	return $objects instanceof \PluginName\Objects ? $objects->get_page( $page ) : null;
}

/**
 * Grab a field object
 *
 * @param        $args
 * @param string $name
 *
 * @return bool
 * @since 1.0.0
 */
function cbc_get_field( $args, $name = '' ) {
	$objects = \PluginName\PluginName()->objects;

	return $objects instanceof \PluginName\Objects ? $objects->get_field( $args, $name ) : null;
}

