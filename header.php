<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />
		<?php if ( is_home () ) : ?><meta name="description" content="<?php bloginfo('description'); ?>"><?php endif; ?>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
	

<?php
	
	wp_head();
?>
	</head>
	<body <?php body_class(); ?>>
		<div class="container">
		<a class="screenread skip" href="#main"><?php _e( 'Skip to content', 'minart' ); ?></a>
			<header class="cf">
				<div class="titles" role="banner">
					
					<?php
					if ( is_front_page() || is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif; ?>
					
					<p class="sub-title"><?php bloginfo('description'); ?></p>
					
				</div>
				
				<?php if ( has_nav_menu('header-menu') ):?>
				<nav id="topmen" class="header-men" role="navigation" aria-label="<?php _e( 'Main menu', 'minart' ); ?>"> 
					<button class="mobile-toggle" type="button"><?php _e( 'toggle menu', 'minart' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class' => 'headmen', 'container' => false, 'fallback_cb'=> false ) ); ?>
				</nav>
				<?php endif;?>
			</header>