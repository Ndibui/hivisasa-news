/*
 * contact-form.js
 * Contact page template JS validation code
 */

jQuery( document ).ready( function($) {
	$( '#contactform' ).validate( {
		//set the rules for the field names
		rules: {
			username: {
				required: true,
				minlength: 2
			},
			email: {
				required: true,
				email: true
			},
			url: {
				url: true
			},
			comment: {
				required: true,
				minlength: 5
			}
		},

		//hide errors forever. We just need element highlighting
		errorPlacement: function( error, element ) {
			error.hide();
		},

		//Submit the Form
		submitHandler: function() {
		//Post the form values via ajax post
			$.post( $( '#contactform' ).attr( 'action' ), $( '#contactform' ) . serialize() + '&ajax=1', function( result ) {
				$( '#contactform' ).fadeOut( 250, function() {
					$( '#mail_success' ).fadeIn( 500 );
				} )
			} );
		}
	} );
} )