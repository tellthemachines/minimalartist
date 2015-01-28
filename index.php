<?php get_header(); ?>



<main id="main" class="main post-index<?php if ( is_active_sidebar( 'rightside' ) ): ?> hasside <?php endif; ?>">

	<?php 
	 
	 if (have_posts()) : ?>
	<ul class="cf" role="list" aria-label="<?php _e( 'List of posts', 'minart' ); ?>">
	<?php 
	while (have_posts()) : the_post(); 
		
		get_template_part( 'content', get_post_format() );
		
	 endwhile; 
	 ?>
	</ul>
	 <nav id="nav-main" class="navs" role="navigation" aria-label="<?php _e( 'Posts navigation', 'minart' ); ?>">
	 	<span class="nav-prev"><?php next_posts_link( __( 'Older', 'minart')); ?></span>
	 	<span class="nav-next"><?php previous_posts_link(__('Newer', 'minart')); ?> </span>
	 </nav>
	<?php 
	 else: ?>
	<p><?php _e('Sorry, no posts found.', 'minart'); ?></p>
	<?php endif; ?>
	


</main> <!-- end main -->

<?php get_sidebar(); ?>


<?php get_footer(); ?>
