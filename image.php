<?php
// Retrieve attachment metadata.
$metadata = wp_get_attachment_metadata();

get_header();
?>

	<main id="main" class="main image-att"  role="main">

	<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();

			$postid = get_posts( array(
            					'post_type' => 'attachment',
					            'posts_per_page' => -1,
					            'post_parent' => $post->ID
							) ); ?>

			<article class="imagebox">
				<div class="attachbox">
			 	<a href="<?php echo wp_get_attachment_url($postid); ?>">
				<?php  echo wp_get_attachment_image($postid, 'large');  ?>  </a>
				</div><!-- .attachment -->

				<?php  if ( has_excerpt()) : ?>
				<div class="entry-caption">
					<?php the_excerpt(); the_content(); ?>
				</div><!-- .entry-caption -->
				<?php endif; ?>
			</article> <!-- .imagebox -->

			<nav id="imagenav" class="navs" role="navigation" aria-label="<?php _e( 'Image gallery navigation', 'minart' ); ?>">
				<span class="previous-image"><?php previous_image_link( false,  __( 'Previous', 'minart' )); ?></span>
				<span class="parent-post-link"><a href="<?php echo get_permalink( $post->post_parent ); ?>" rel="gallery"><?php _e('exit gallery','minart'); ?></a></span>
				<span class="next-image"><?php next_image_link( false,  __( 'Next', 'minart' )); ?></span>
			</nav><!-- #image-navigation -->

		<?php endwhile; // end of the loop. ?>

		</main> <!-- end #main -->

<?php
get_footer();
