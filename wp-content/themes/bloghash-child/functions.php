<?php
/**
 * Custom functions for Bloghash Child theme
 *
 * @package bloghash_child
 * @author Jason <jasonnchann24@gmail.com>
 * @since 1.0
 */

define( 'BLOGHASH_CHILD_VERSION', '1.0.0' );

/**
 * Enqueue parent + child theme styles
 */
function bloghash_child_enqueue_scripts() {
	// Parent theme CSS.
	wp_enqueue_style(
		'bloghash-parent-style',
		get_template_directory_uri() . '/style.css',
		array(),
		wp_get_theme( 'bloghash' )->get( 'Version' )
	);

	// Child theme CSS.
	wp_enqueue_style(
		'bloghash-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'bloghash-parent-style' ),
		BLOGHASH_CHILD_VERSION
	);
}
add_action( 'wp_enqueue_scripts', 'bloghash_child_enqueue_scripts' );

require_once get_stylesheet_directory() . '/inc/menu-social-links.php';
