<?php

 get_header(); ?>

<main id="main" role="main" class="main cf<?php if ( is_active_sidebar( 'rightside' ) ): ?> hasside<?php endif; ?>" >

	<?php
		// Start the Loop.
		while (have_posts()) : the_post(); ?>

		<?php if ( is_front_page()) : ?>

			<h2 class="title page-title"><?php the_title(); ?></h2>

		<?php else: ?>

			<h1 class="title page-title"><?php the_title(); ?></h1>

		<?php endif; ?>

		<div class="pagebody cf"><?php the_content(); ?></div>

	<?php

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ):
		comments_template();
		endif;

	endwhile;  ?>

</main><!-- #main -->

<?php get_sidebar(); ?>

<?php get_footer();
