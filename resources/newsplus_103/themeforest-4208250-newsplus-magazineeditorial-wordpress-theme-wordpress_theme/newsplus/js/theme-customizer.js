/**
 * theme-customizer.js
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newval ) {
			$( '.site-title a' ).html( newval );
		} );
	} );

	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( newval ) {
			$( '.site-description' ).html( newval );
		} );
	} );

	// navigation Color Schemes
	wp.customize( 'nav_bg', function( value ) {
		value.bind( function( newval ) {
			$( '.primary-nav' ).css( 'background-color', newval );
		} );
	} );

	wp.customize( 'nav_link_color', function( value ) {
		value.bind( function( newval ) {
			$( 'ul.nav-menu > li > a' ).css( 'color', newval );
		} );
	} );

	wp.customize( 'nav_current_link_color', function( value ) {
		value.bind( function( newval ) {
			$( 'ul.nav-menu > li.current-menu-item > a, ul.nav-menu > li.current-menu-ancestor > a, ul.nav-menu > li.current_page_item > a, ul.nav-menu > li.current_page_ancestor > a ' ).css( 'color', newval );
		} );
	} );

	wp.customize( 'nav_current_link_border_color', function( value ) {
		value.bind( function( newval ) {
			$( 'ul.nav-menu > li.current-menu-item > a, ul.nav-menu > li.current-menu-ancestor > a, ul.nav-menu > li.current_page_item > a, ul.nav-menu > li.current_page_ancestor > a ' ).css( 'border-top-color', newval );
		} );
	} );

	wp.customize( 'submenu_bg', function( value ) {
		value.bind( function( newval ) {
			$( '.primary-nav li ul' ).css( 'background-color', newval );
		} );
	} );

	wp.customize( 'submenu_link_color', function( value ) {
		value.bind( function( newval ) {
			$( '.primary-nav li ul li a' ).css( 'color', newval );
		} );
	} );

	// Sidebar Heading
	wp.customize( 'sidebar_heading_color', function( value ) {
		value.bind( function( newval ) {
			$( 'h3.sb-title' ).css( 'color', newval );
		} );
	} );

	// Secondary Area
	wp.customize( 'sec_bg_color', function( value ) {
		value.bind( function( newval ) {
			$( '#secondary' ).css( 'background-color', newval );
		} );
	} );

	wp.customize( 'sec_text_color', function( value ) {
		value.bind( function( newval ) {
			$( '#secondary, #secondary .sep' ).css( 'color', newval );
		} );
	} );

	wp.customize( 'sec_link_color', function( value ) {
		value.bind( function( newval ) {
			$( '#secondary a, #secondary ul a' ).css( 'color', newval );
		} );
	} );

	wp.customize( 'sec_heading_color', function( value ) {
		value.bind( function( newval ) {
			$( 'h3.sc-title' ).css( 'color', newval );
		} );
	} );

	wp.customize( 'sec_widget_border_color', function( value ) {
		value.bind( function( newval ) {
			$( '#secondary .widget ul li' ).css( 'border-bottom-color', newval );
			$( '#secondary .widget ul ul' ).css( 'border-top-color', newval );
		} );
	} );

	// Footer Area
	wp.customize( 'footer_bg_color', function( value ) {
		value.bind( function( newval ) {
			$( '#footer' ).css( 'background-color', newval );
		} );
	} );

	wp.customize( 'footer_text_color', function( value ) {
		value.bind( function( newval ) {
			$( '#footer' ).css( 'color', newval );
		} );
	} );

	wp.customize( 'footer_link_color', function( value ) {
		value.bind( function( newval ) {
			$( '#footer' ).css( 'color', newval );
		} );
	} );

} )( jQuery );