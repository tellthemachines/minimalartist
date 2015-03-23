<?php get_header(); ?>



<main id="main" role="main" class="main cat-index<?php if ( is_active_sidebar( 'rightside' ) ): ?> hasside<?php endif; ?>">

	<?php if (have_posts()) : ?>

	<header class="title">

	<h1 class="cat-title"><?php $cattitle = single_cat_title( '', false ); $catparents =  get_category_parents(get_cat_ID($cattitle), false, ' > '); echo rtrim($catparents, ' > '); ?></h1>

	<?php
	// Show an optional term description.
	$term_description = term_description();
	if ( ! empty( $term_description ) ) :
		printf( '<div class="catdescript">%s</div>', $term_description );
	endif;
	?>

	</header>

	<ul class="cf" role="list" aria-label="<?php _e( 'List of posts', 'minart' ); ?>">
	<?php
	while (have_posts()) : the_post();

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
