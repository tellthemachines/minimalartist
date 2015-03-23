		<?php if ( is_active_sidebar( 'footerwidg' ) ) : ?>
				<footer id="colophon" class="site-footer">
						<div id="footerwidgets" class="widget-area footer-widget cf" role="complementary" aria-label="<?php _e( 'Footer widgets', 'minart' ); ?>">
							<?php dynamic_sidebar('footerwidg'); ?>
						</div><!-- #footerwidgets -->
				</footer><!-- #colophon -->
		<?php endif; ?>
	</div><!-- #container -->

	<?php wp_footer(); ?>
</body>
</html>
