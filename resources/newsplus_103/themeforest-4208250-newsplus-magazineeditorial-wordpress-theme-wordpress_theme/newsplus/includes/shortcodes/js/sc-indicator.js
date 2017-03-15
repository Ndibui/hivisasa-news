/**
 * Indicator Short code button
 */

( function() {
     tinymce.create( 'tinymce.plugins.indicator', {
        init : function( ed, url ) {
             ed.addButton( 'indicator', {
                title : 'Insert a progress indicator',
                image : url + '/images/indicator.png',
                onclick : function() {
						var width = jQuery( window ).width(), H = jQuery( window ).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'Indicator Options', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=sc-indicator-form' );
                 }
             });
         },
         createControl : function( n, cm ) {
             return null;
         },
     });
	tinymce.PluginManager.add( 'indicator', tinymce.plugins.indicator );
	jQuery( function() {
		var form = jQuery( '<div id="sc-indicator-form"><table id="sc-indicator-table" class="form-table">\
							<tr>\
							<th><label for="sc-indicator-label">Indicator Label</label></th>\
							<td><input type="text" id="sc-indicator-label" name="text" value="Label here" /><br />\
							<small>Enter a label for indicator.</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-indicator-bg">Background Color</label></th>\
							<td><input type="text" id="sc-indicator-bg" name="link" value="#ffcc00" /><br />\
							<small>Enter a background color value. Example: #003366</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-indicator-value">Indicator value</label></th>\
							<td><input type="text" id="sc-indicator-value" name="link" value="75" /><br />\
							<small>Enter a value for indicator. Allowed values are 0 to 100.</small></td>\
							</tr>\
							</table>\
							<p class="submit">\
							<input type="button" id="sc-indicator-submit" class="button-primary" value="Insert Indicator" name="submit" />\
							</p>\
							</div>' );
		var table = form.find( 'table' );
		form.appendTo( 'body' ).hide();
		form.find( '#sc-indicator-submit' ).click( function() {
			var options = {
				'label'	: 'Label here',
				'bg'	: '#ffcc00',
				'value'	: '75'
				};
			var shortcode = '<p>[indicator';
			for ( var index in options ) {
				var value = table.find( '#sc-indicator-' + index ).val();
				if ( value !== options[ index ] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			shortcode += ']</p>';
			tinyMCE.activeEditor.execCommand( 'mceInsertContent', 0, shortcode );
			tb_remove();
		} );
	} );
 } )();