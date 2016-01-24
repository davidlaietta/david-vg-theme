<?php
/**
 * The home template file.
 *
 *
 * @package David VG
 */

get_header(); ?>

	<div id="primary" class="content-area wrap">
		<main id="main" class="site-main" role="main">

		<?php

		$args = array(
			'post_type' => array(
				'post',
				'twitter_stream',
				'pocket_stream',
				),
			'post_status' 			 => 'publish',
			'posts_per_page'         => 100,
			'posts_per_archive_page' => 100,
			'nopaging'               => false,
			'paged'                  => get_query_var('paged'),
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
