<?php

get_header(); ?>

<main id="main" class="main cf postpage<?php if ( is_active_sidebar( 'rightside' ) ): ?> hasside<?php endif; ?>">

	<?php  while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php get_template_part( 'content', get_post_format() ); ?>
		</article>
		
		<div class="post-tags" aria-label="<?php _e( 'Post tags', 'minart' ); ?>">
			<?php the_tags( '', '', ''); ?>
		</div>
	
		<nav id="nav-single" class="navs" role="navigation" aria-label="<?php _e( 'Posts navigation', 'minart' ); ?>">
			<span class="nav-previous"><?php previous_post_link( '%link', __('previous', 'minart') ); ?></span>
			<span class="nav-next"><?php next_post_link( '%link', __('next', 'minart') ); ?></span>
		</nav><!-- #nav-single -->

		<?php 
		
		// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ):
				comments_template();
			endif;

	 endwhile; ?>

</main> <!-- end main -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>