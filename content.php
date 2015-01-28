<?php 
if ( is_single() ) :
	the_title( '<h1 class="title post-title">', '</h1>' );
	?>
	<div class="postbody cf"><?php the_content(); ?></div>
	<?php  
	
	wp_link_pages( array(
	'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'minart' ) . '</span>',
	'after'       => '</div>',
	'link_before' => '<span>',
	'link_after'  => '</span>',
	'pagelink'    => '<span class="screenread">' . __( 'Page', 'minart' ) . ' </span>%'
	) );

else : ?>
	<li <?php if ( has_post_thumbnail() ) : post_class('permalink perma-image'); else: post_class('permalink'); endif; ?>><a href="<?php the_permalink()?>" rel="bookmark">
		<?php 
		if ( has_post_thumbnail() ) : 
			the_post_thumbnail(); 
		endif; ?>
		<?php $posttitle = get_the_title(); if( $posttitle != ''): ?> 
			<p<?php if ( has_post_thumbnail() ) : ?> class="perma-title"<?php endif; ?>><?php the_title(); ?></p>
		<?php elseif(! has_post_thumbnail()): ?> 
			<p><?php the_date(); endif; ?></p>
	</a></li>
	
<?php endif;


 


?>
