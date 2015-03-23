<?php

//extra customization options

function minart_register_theme_customizer( $wp_customize ) {

	// remove default background color control so we can add custom one (necessary to change background on menu-items and permalinks as well as body)

	$wp_customize->remove_control( 'background_color' );


	// add layout and type options section

	$wp_customize->add_section(
			'minart_layout_type',
			array(
					'title'     => 'Layout and Type Options',
					'priority'  => 200
			)
	);


	// setting within colors section for choosing text colour

	$wp_customize->add_setting(
			'minart_text_color',
			array(
					'sanitize_callback' => 'sanitize_hex_color',
					'default'     => '#000000'
			)
	);

	$wp_customize->add_control(
			new WP_Customize_Color_Control(
					$wp_customize,
					'text_color',
					array(
							'label'      => __( 'Text Color', 'minart' ),
							'section'    => 'colors',
							'settings'   => 'minart_text_color'
					)
			)
	);


	// setting within colors section for choosing link colour

	$wp_customize->add_setting(
			'minart_link_color',
			array(
					'sanitize_callback' => 'sanitize_hex_color',
					'default'     => '#000000'
			)
	);

	$wp_customize->add_control(
			new WP_Customize_Color_Control(
					$wp_customize,
					'link_color',
					array(
							'label'      => __( 'Link Color', 'minart' ),
							'section'    => 'colors',
							'settings'   => 'minart_link_color'
					)
			)
	);

	// setting within colors section for choosing background colour

	$wp_customize->add_setting(
			'minart_back_color',
			array(
					'sanitize_callback' => 'sanitize_hex_color',
					'default'     => '#ffffff'
			)
	);

	$wp_customize->add_control(
			new WP_Customize_Color_Control(
					$wp_customize,
					'back_color',
					array(
							'label'      => __( 'Background Color', 'minart' ),
							'section'    => 'colors',
							'settings'   => 'minart_back_color'
					)
			)
	);

	// setting within navigation section for disabling post navigation

	$wp_customize->add_setting(

			'minart_post_nav',
			array(
					'sanitize_callback' => 'minart_sanitize_checkbox'
			)

	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
	    	'minart_post_nav',
		    array(
		        'section'   => 'nav',
		        'label'     => __('Disable post navigation', 'minart'),
		        'type'      => 'checkbox'
			)
		)
	);

	// setting within layout/type section for disabling titles on pages

	$wp_customize->add_setting(
			'minart_page_title',
			array(
					'sanitize_callback' => 'minart_sanitize_checkbox'
			)
	);

	$wp_customize->add_control(
			'minart_page_title',
			array(
					'section'   => 'minart_layout_type',
					'label'     => __('Disable page titles', 'minart'),
					'type'      => 'checkbox'
			)
	);

	// setting within layout/type section for disabling comments

	$wp_customize->add_setting(
			'minart_no_comments',
			array(
					'sanitize_callback' => 'minart_sanitize_checkbox'
			)
	);

	$wp_customize->add_control(
			'minart_no_comments',
			array(
					'section'   => 'minart_layout_type',
					'label'     => __('Disable comments on posts and pages', 'minart'),
					'type'      => 'checkbox'
			)
	);

	// setting within layout/type section for rendering posts as list

	$wp_customize->add_setting(
			'minart_posts_list',
			array(
					'sanitize_callback' => 'minart_sanitize_checkbox'
			)
	);

	$wp_customize->add_control(
			'minart_posts_list',
			array(
					'section'   => 'minart_layout_type',
					'label'     => __('Render posts as list', 'minart'),
					'type'      => 'checkbox'
			)
	);

	// setting within layout/type section for removing link underlines

	$wp_customize->add_setting(
			'minart_under_link',
			array(
					'sanitize_callback' => 'minart_sanitize_checkbox'
			)
	);

	$wp_customize->add_control(
			'minart_under_link',
			array(
					'section'   => 'minart_layout_type',
					'label'     => __('Remove Link Underlines', 'minart'),
					'type'      => 'checkbox'
			)
	);

	// setting within layout/type section for changing font style

	$wp_customize->add_setting(
			'minart_font_family',
			array(
					'sanitize_callback' => 'minart_sanitize_checkbox'
			)
	);

	$wp_customize->add_control(
			'minart_font_family',
			array(
					'section'   => 'minart_layout_type',
					'label'     => __('Change font family to sans serif', 'minart'),
					'type'      => 'checkbox'
			)
	);

	// setting within layout/type section for changing font size

	$wp_customize->add_setting(
			'minart_font_size',
			array(
					'sanitize_callback' => 'minart_sanitize_font_size',
					'default'     => 'medium'
			)
	);

	$wp_customize->add_control(
			'minart_font_size',
			array(
					'section'   => 'minart_layout_type',
					'label'     => __('Change Font Size', 'minart'),
					'type'      => 'radio',
					'choices' => array(
							'14' => 'small',
							'16' => 'medium',
							'18' => 'large'
					)
			)
	);


} // end minart_register_theme_customizer

add_action( 'customize_register', 'minart_register_theme_customizer' );


// generate css for customizer

function minart_customizer_css() {
	?>
    <style type="text/css">
    	body { color: <?php echo esc_attr(get_theme_mod( 'minart_text_color' )); ?>; }
        a { color: <?php echo esc_attr(get_theme_mod( 'minart_link_color' )); ?>; }
  		body, .perma-title, .menu-item { background: <?php echo esc_attr(get_theme_mod( 'minart_back_color' )); ?>; }

        <?php if( true === get_theme_mod( 'minart_post_nav' ) ) : ?>
    		#nav-single { display: none; }
    	<?php else: ?>
    		#nav-single { display: block; }
		<?php endif; ?>

		<?php if( true === get_theme_mod( 'minart_page_title' ) ) : ?>
    		.page-title { position: absolute; height: 1px; width: 1px; overflow: hidden; clip: rect(1px 1px 1px 1px); clip: rect(1px, 1px, 1px, 1px); }
    	<?php else: ?>
    		.page-title { position: static; height: auto; width: auto; overflow: visible; clip: auto; }
		<?php endif; ?>

		<?php if( true === get_theme_mod( 'minart_no_comments' ) ) : ?>
    		.comments { display: none; }
    	<?php else: ?>
    		.comments { display: block; }
		<?php endif; ?>

		<?php if( true === get_theme_mod( 'minart_posts_list' ) ) : ?>
     		.permalink { float: none; margin-bottom: 20px !important; }
     	<?php else: ?>
     		@media screen and (min-width: 41em){ .permalink { <?php if (is_rtl()): ?> float: right;<?php else:?> float: left;<?php endif;?> margin-bottom: 60px; } }
		<?php endif; ?>

		<?php if( true === get_theme_mod( 'minart_under_link' ) ) : ?>
    		a { text-decoration: none; }
    	<?php else: ?>
    		a { text-decoration: underline; }
		<?php endif; ?>

		<?php if( true === get_theme_mod( 'minart_font_family' ) ) : ?>
    		body, .perma-title { font-family: Helvetica, Arial, sans-serif; }
    	<?php else: ?>
    		body { font-family: Georgia, serif; }
		<?php endif; ?>

		<?php if( '14' === get_theme_mod( 'minart_font_size' ) ) : ?>
    		body { font-size: 87.5%; }
    	<?php elseif ( '16' === get_theme_mod( 'minart_font_size' ) ): ?>
    		body { font-size: 100%; }
    		<?php elseif ( '18' === get_theme_mod( 'minart_font_size' ) ): ?>
    		body { font-size: 112.5%; }
		<?php endif; ?>

    </style>
    <?php
}
add_action( 'wp_head', 'minart_customizer_css' );

// sanitization

function minart_sanitize_checkbox( $input ) {
	if ( $input == true) {
		$output = true;
	}
	else {
		$output = false;
	}

	return $output;
}

function minart_sanitize_font_size( $input ) {
	$valid = array(
			'14' => '14',
			'16' => '16',
			'18' => '18',
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}
