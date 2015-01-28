
		<footer id="colophon" class="site-footer">
			<?php if ( is_active_sidebar( 'footerwidg' ) ) : ?>
	<div id="footerwidgets" class="widget-area footer-widget cf" role="complementary" aria-label="<?php _e( 'Footer widgets', 'minart' ); ?>">
		<?php dynamic_sidebar('footerwidg'); ?>
	</div><!-- #footerwidgets -->
<?php 
	endif;

	?>
		</footer><!-- #colophon -->
	</div><!-- #container -->

	<?php wp_footer(); ?>
</body>
</html>