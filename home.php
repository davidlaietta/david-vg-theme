<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package David_VG
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main" data-columns>

		<?php

		$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;

		$args = array(
			'post_type'			=> array(
			    'post',
				'twitter_stream',
				'pocket_stream',
				),
			'posts_per_page'	=> 100,
			'paged'				=> $paged,
		);

		$query = new WP_Query( $args );


		if ( $query->have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			while ( $query->have_posts() ) : $query->the_post();

					get_template_part( 'template-parts/content-stream', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;

		wp_reset_postdata();
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
