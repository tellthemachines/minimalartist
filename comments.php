<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments">

	<?php if ( have_comments() ) : ?>

	<h2 class="commentitle">
		<?php
			printf( _n( 'One comment', '%1$s comments', get_comments_number(), 'minart' ),
				number_format_i18n( get_comments_number() ), get_the_title() );
		?>
	</h2>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comnav-upper" class="navs comnav" role="navigation" aria-label="<?php _e( 'Comments navigation', 'minart' ); ?>">
		<div class="nav-previous"><?php previous_comments_link( __( 'Older', 'minart' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer', 'minart' ) ); ?></div>
	</nav><!-- #comnav-upper -->
	<?php endif; // Check for comment navigation. ?>

	<ol class="comment-list">
		<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
				'avatar_size'=> 34,
			) );
		?>
	</ol><!-- .comment-list -->

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comnav-lower" class="navs comnav" role="navigation" aria-label="<?php _e( 'Posts navigation', 'minart' ); ?>">
		<div class="nav-previous"><?php previous_comments_link( __( 'Older', 'minart' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer', 'minart' ) ); ?></div>
	</nav><!-- #comnav-lower -->
	<?php endif; // Check for comment navigation. ?>

	<?php if ( ! comments_open() ) : ?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'minart' ); ?></p>
	<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php comment_form(); ?>

</div><!-- #comments -->