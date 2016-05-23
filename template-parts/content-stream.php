<?php
/**
 * Template part for displaying posts.
 *
 * @package David_VG
 */

// Get the post type to make things rock out
if ( 'twitter_stream' == get_post_type() ) {
	$post_type = 'twitter';
} elseif ( 'pocket_stream' == get_post_type() ) {
	$post_type = 'get-pocket';
} else {
	$post_type = 'post';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid-item' ); ?>>
	<header class="entry-header">
		<?php
			the_post_thumbnail( 'medium' );
			// if ( is_single() ) {
			// 	the_title( '<h1 class="entry-title">', '</h1>' );
			// } else {
			// 	the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			// }

			if( $post_type == 'get-pocket' ) {
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				var_dump( get_post_meta( $post->ID, '_save_id' ) );
			} elseif( $post_type == 'twitter' ) {
				var_dump( get_post_meta( $post->ID, '_tweet_id' ) );
			}

			if ( 'post' === get_post_type() ) :
		?>
		<div class="entry-meta">
			<?php david_vg_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="service-icon fa fa-<?php echo $post_type ?>"></div>
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'david-vg' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'david-vg' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
		david_vg_stream_posted_on();
		david_vg_entry_footer();
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

