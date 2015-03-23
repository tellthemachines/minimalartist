/**
 * js functions
 *
 */


( function( $ ) {

	//responsive embeds
	( function() {

		var windowWidth = $(window).width();
		var windowHeight = $(window).height();

		$( 'iframe, embed' ).each(function() {

			var proportion = $(this).height()/$(this).width()*100 + "%";

			if(windowWidth < 667 || windowWidth < windowHeight) {

				$(this).parent().css({
					'position': 'relative',
					'padding-bottom': proportion,
					'height': '0',
					'overflow': 'hidden'
				})

				$(this).css({
					'position': 'absolute',
					'top': '0',
					'left': '0',
					'width': '100%',
					'height': '100%'
				})

			}

			else {

				$(this).parent().css({
					'position': 'relative',
					'padding-bottom': proportion,
					'height': '0',
					'width': '70%',
					'margin': '0 auto',
					'overflow': 'hidden'
				})

				$(this).css({
					'position': 'absolute',
					'top': '0',
					'left': '0',
					'width': '100%',
					'height': '70%'
				})

				$(this).parent().next().css(
					'margin-top', '-12%'
				)

			}

			});

	} )();


	// Enable menu toggle for small screens.
	( function() {

		var nav = $( '#topmen' ), button;
		if ( ! nav ) {
			return;
		}

		button = nav.find( '.mobile-toggle' );
		if ( ! button ) {
			return;
		}

		$('.mobile-toggle').on('click', function() {
			nav.toggleClass( 'toggled-on' );
		} );
	} )();

	//add focus class to menu items on focus

	$( '.menu-item' ).find( 'a' ).on( 'focus blur', function() {
		$( this ).parents().toggleClass( 'focus' );
	} );

	// menu navigation with arrows

	$('.menu-item a').on('keydown', function(e) {

		// left key
		if(e.which === 37) {
			e.preventDefault();
			$(this).parent().prev().children('a').focus();
		}
		// right key
		else if(e.which === 39) {
			e.preventDefault();
			$(this).parent().next().children('a').focus();
		}
		// down key
		else if(e.which === 40) {
			e.preventDefault();
			if($(this).next().length){
				$(this).next().find('li:first-child a').first().focus();
			}
			else {
				$(this).parent().next().children('a').focus();
			}
		}
		// up key
		else if(e.which === 38) {
			e.preventDefault();
			if($(this).parent().prev().length){
				$(this).parent().prev().children('a').focus();
			}
			else {
				$(this).parents('ul').first().prev('a').focus();
			}
		}

	});


	//fix for skip link

	$( window ).on( 'hashchange.minart', function() {
		var element = document.getElementById( location.hash.substring( 1 ) );

		if ( element ) {
			if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) {
				element.tabIndex = -1;
			}

			element.focus();

			// Repositions the window on jump-to-anchor to account for header height.
			window.scrollBy( 0, -80 );
		}
	} );

	// keyboard navigation for image attachment pages

	$( document ).on( 'keyup', function( e ) {
		var url = false;

		// Left arrow key code.
		if ( e.which === 37 ) {
			url = $( '.previous-image a' ).attr( 'href' );
		}

		// Right arrow key code.
		else if ( e.which === 39 ) {
			url = $( '.next-image a' ).attr( 'href' );
		}

		// Esc key code.
		else if ( e.which === 27 ) {
			url = $( '.parent-post-link a' ).attr( 'href' );
		}

		if ( url && ( !$( 'textarea, input' ).is( ':focus' ) ) ) {
			window.location = url;
		}
	} );

} )( jQuery );
