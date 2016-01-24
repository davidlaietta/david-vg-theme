<?php
/**
 * The home template file.
 *
 *
 * @package David VG
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php

		$args = array(
			'post_type' => array(
				'post',
				'twitter_stream',
				'pocket_stream',
				),
			'post_status' 			 => 'publish',
			'order'               	 => 'DESC',
			'no_found_rows'          => false,
			'cache_results'          => true,
			'update_post_term_cache' => true,
			'update_post_meta_cache' => true,
		);

		$query = new WP_Query( $args );


		if ( $query->have_posts() ) :

			while ( $query->have_posts() ) : $query->the_post();

					get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;

		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
