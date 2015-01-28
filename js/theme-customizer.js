(function( $ ) {
   "use strict";
 
   
    wp.customize( 'minart_text_color', function( value ) {
        value.bind( function( to ) {
            $( 'body' ).css( 'color', to );
        } );
    });
    
    wp.customize( 'minart_link_color', function( value ) {
        value.bind( function( to ) {
            $( 'a' ).css( 'color', to );           
        } );

    });
    
    wp.customize( 'minart_back_color', function( value ) {
        value.bind( function( to ) {
        	$( 'body' ).css( 'background', to );
        	$( '.perma-title' ).css( 'background', to );
        	$( '.menu-item' ).css( 'background', to );
        } );
    }); 
    
    wp.customize( 'minart_post_nav', function( value ) {
        value.bind( function( to ) {
            true === to ? $( '#nav-single' ).hide() : $( '#nav-single' ).show();
        } );
    } );
    
    wp.customize( 'minart_page_title', function( value ) {
        value.bind( function( to ) {
            true === to ? $( '.page-title' ).hide() : $( '.page-title' ).show();
        } );
    } );
    
    wp.customize( 'minart_under_link', function( value ) {
        value.bind( function( to ) {
        	true === to ? $( 'a' ).css('text-decoration', 'none'); : $( 'a' ).css('text-decoration', 'underline');
        } );
    } );
    
    wp.customize( 'minart_font_size', function( value ) {
        value.bind( function( to ) {
        	$( 'body' ).css( 'font-size', to );
        } );
    } );

})( jQuery );