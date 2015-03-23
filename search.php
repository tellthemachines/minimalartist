<?php get_header(); ?>



<main id="main" role="main" class="main<?php if ( is_active_sidebar( 'rightside' ) ): ?> hasside<?php endif; ?>">

	<h1 class="title search-title"><?php printf( __( 'Search results for: %s', 'minart' ), get_search_query() ); ?></h1>

	<?php if (have_posts()) : ?>

	<ul class="cf" role="list" aria-label="<?php _e( 'List of posts', 'minart' ); ?>">

	<?php while (have_posts()) : the_post();

		get_template_part( 'content', get_post_format() );

	 endwhile;
	 ?>

	 </ul>

	 <nav id="nav-main" class="navs" role="navigation" aria-label="<?php _e( 'Posts navigation', 'minart' ); ?>">
	 	<p><?php posts_nav_link( '  ', __('Newer', 'minart'), __( 'Older', 'minart') ); ?></p>
	 </nav>
	<?php
	 else: ?>
	<p><?php _e('Sorry, no posts found.', 'minart'); ?></p>
	<?php endif; ?>



</main> <!-- end main -->

<?php get_sidebar(); ?>


<?php get_footer(); ?>
