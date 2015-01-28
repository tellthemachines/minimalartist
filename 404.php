<?php get_header(); ?>



<main id="main" <?php if ( is_active_sidebar( 'rightside' ) ): ?> class="hasside" <?php endif; ?>>

	<div class="notfound">
	
		<p><?php _e( 'Sorry, nothing found.', 'minart' ); ?></p>
		
		
	</div><!-- .page-content -->
	

</main> <!-- end main -->

<?php get_sidebar(); ?>


<?php get_footer(); ?>