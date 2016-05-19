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
// add_action( 'after_setup_theme', 'david_vg_jetpack_setup' );
function david_vg_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'type'			 => 'scroll',
		'container' 	 => 'main',
		'footer'    	 => 'infinite-footer'
	) );
}

/**
 * Custom render function for Infinite Scroll.
 */
function david_vg_infinite_scroll_render() {

		$args = array(
			'post_type'		=> array(
				'twitter_stream',
				'pocket_stream',
				),
			'post_status'	=> 'publish',
		);

		$query = new WP_Query( $args );


		if ( $query->have_posts() ) :

			while ( $query->have_posts() ) : $query->the_post();

					get_template_part( 'template-parts/content-stream', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;

}

function jetpack_infinite_scroll_query_args( $args ) {
	$args['post_status'] = 'publish';
	$args['post_type'] = 'pocket_stream';
	$args['posts_per_page'] = 10;

	return $args;
}
// add_filter( 'infinite_scroll_query_args', 'jetpack_infinite_scroll_query_args' );


// add_action( 'pre_get_posts', 'david_vg_infinite_scroll_render' );