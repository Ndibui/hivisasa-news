/*
 * admin.js
 * Used for tabbed interface in Theme Options Panel
 */

jQuery( document ).ready( function($) {
	$( '.tabbed' ).hide();
	$( 'ul.tabs li:first' ).addClass( 'active' );
	$( '.tabbed:first' ).show();
	$( 'ul.tabs li' ).click( function() {
		$( 'ul.tabs li' ).removeClass( 'active' );
		$( this ).addClass( 'active' );
		$( '.tabbed' ).hide();
		var currentTab = $( this ).find( 'a' ).attr( 'href' );
		$( currentTab ).show();
		return false;
	} );
} )