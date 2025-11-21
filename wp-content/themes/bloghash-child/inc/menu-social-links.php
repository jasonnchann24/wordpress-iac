<?php
/**
 * Custom functions for Bloghash Child theme
 *
 * @package bloghash_child
 * @author Jason <jasonnchann24@gmail.com>
 * @since 1.0
 */

/**
 * Force menu links in "menu-social-links" to open in new tab.
 *
 * @param string   $item_output The menu item's starting HTML output.
 * @param WP_Post  $item        The current menu item object.
 * @param int      $depth       Depth of the menu item.
 * @param stdClass $args        Menu item's arguments.
 *
 * @return string Modified menu item output with target="_blank".
 */
function bh_child_target_blank_bloghash_social_nav( $item_output, $item, $depth, $args ) {

	if ( isset( $args->container_class ) && strpos( $args->container_class, 'bloghash-social-nav' ) !== false ) {
		$item_output = str_replace( '<a ', '<a target="_blank" ', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'bh_child_target_blank_bloghash_social_nav', 10, 4 );
