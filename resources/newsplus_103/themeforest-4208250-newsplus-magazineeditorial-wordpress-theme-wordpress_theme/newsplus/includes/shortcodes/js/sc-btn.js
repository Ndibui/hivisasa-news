/**
 * Button Short code button
 */

( function() {
     tinymce.create( 'tinymce.plugins.btn', {
        init : function( ed, url ) {
             ed.addButton( 'btn', {
                title : 'Insert a Button',
                image : url + '/images/btn.png',
                onclick : function() {
						var width = jQuery( window ).width(), H = jQuery( window ).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'Button Options', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=sc-btn-form' );
                 }
             });
         },
         createControl : function( n, cm ) {
             return null;
         },
     });
	tinymce.PluginManager.add( 'btn', tinymce.plugins.btn );
	jQuery( function() {
		var form = jQuery( '<div id="sc-btn-form"><table id="sc-btn-table" class="form-table">\
							<tr>\
							<th><label for="sc-btn-text">Button Text</label></th>\
							<td><input type="text" id="sc-btn-text" name="text" value="Click Me" /><br />\
							<small>Enter a button text.</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-btn-link">Button links to</label></th>\
							<td><input type="text" id="sc-btn-link" name="link" value="http://yoursite.com" /><br />\
							<small>Enter full URL of the target link.</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-btn-target">Button Link Target</label></th>\
							<td><select name="target" id="sc-btn-target">\
							<option value="">_self</option>\
							<option value="_blank">_blank</option>\
							</select><br/>\
							<small>Select a link target. _blank is for new window.</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-btn-color">Button Style</label></th>\
							<td><select name="color" id="sc-btn-color">\
							<option value="default">Default Button</option>\
							<option value="aqua">Aqua</option>\
							<option value="red">Red</option>\
							<option value="grey">Grey</option>\
							<option value="pink">Pink</option>\
							<option value="brown">Brown</option>\
							<option value="skyBlue">Sky Blue</option>\
							<option value="royalBlue">Royal Blue</option>\
							<option value="orange">Orange</option>\
							<option value="forestGreen">Forest Green</option>\
							<option value="yellowGreen">Yellow Green</option>\
							</select><br/>\
							<small>Select a button style.</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-btn-size">Button Size</label></th>\
							<td><select name="size" id="sc-btn-size">\
							<option value="">Default (small)</option>\
							<option value="size-m">Medium</option>\
							<option value="size-l">Large</option>\
							</select><br/>\
							<small>Select a size for button.</small></td>\
							</tr>\
							</table>\
							<p class="submit">\
							<input type="button" id="sc-btn-submit" class="button-primary" value="Insert Button" name="submit" />\
							</p>\
							</div>' );
		var table = form.find( 'table' );
		form.appendTo( 'body' ).hide();
		form.find( '#sc-btn-submit' ).click( function() {
			var options = {
				'link'		: '',
				'color'		: 'default',
				'size'		: '',
				'target'	: '_self'
				};
			var shortcode = '[btn';
			for ( var index in options ) {
				var value = table.find( '#sc-btn-' + index ).val();
				if ( value !== options[ index ] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			var btn_text = table.find( '#sc-btn-text' ).val();
			shortcode += ']' + btn_text + '[/btn]';
			tinyMCE.activeEditor.execCommand( 'mceInsertContent', 0, shortcode );
			tb_remove();
		} );
	} );
 } )();