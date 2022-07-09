<?php
/**
 * Plugin Name:       Fix Yoast Organization Schema
 * Plugin URI:        https://github.com/robwent/wp-fix-yoast-organization-schema
 * Description:       Adds additional Organization schema to Yoast output.
 * Version:           1.0.0
 * Author:            Robert Went
 * Author URI:        https://www.robertwent.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly or we are in the admin area, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// DOn't run in the admin area or if Yoast isn't active
if ( is_admin() || ! defined( 'WPSEO_VERSION' ) ) {
	return false;
}

include( dirname( __FILE__ ) . '/classes/Schema_OrganizationDetails.php' );

/**
 * Adds Schema pieces to our output.
 *
 * @param array $pieces Graph pieces to output.
 * @param \WPSEO_Schema_Context $context Object with context variables.
 *
 * @return array $pieces Graph pieces to output.
 */
function wp_fix_yoast_organization_pieces( $pieces, $context ) {
	$pieces[] = new Schema_OrganizationDetails( $context );

	return $pieces;
}

add_filter( 'wpseo_schema_graph_pieces', 'wp_fix_yoast_organization_pieces', 11, 2 );

