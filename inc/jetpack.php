<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package David VG
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function david_vg_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'david_vg_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function david_vg_jetpack_setup
add_action( 'after_setup_theme', 'david_vg_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function david_vg_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function david_vg_infinite_scroll_render
