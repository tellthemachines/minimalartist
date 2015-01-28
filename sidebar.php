<?php if ( is_active_sidebar( 'rightside' ) ) : ?>
	<aside id="thesidebar" class="widget-area side-widget" role="complementary" aria-label="<?php _e( 'Sidebar widgets', 'minart' ); ?>">
		<?php dynamic_sidebar('rightside'); ?>
	</aside><!-- #thesidebar -->
<?php 
	endif;

	?>
	