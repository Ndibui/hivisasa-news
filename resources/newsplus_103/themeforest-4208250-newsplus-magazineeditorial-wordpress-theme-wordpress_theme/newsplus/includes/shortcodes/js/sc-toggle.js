/**
 * Toggle Short code button
 */

( function() {
     tinymce.create( 'tinymce.plugins.toggle', {
        init : function( ed, url ) {
             ed.addButton( 'toggle', {
                title : 'Insert a Toggle',
                image : url + '/images/toggle.png',
                onclick : function() {
						var width = jQuery( window ).width(), H = jQuery( window ).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'Toggle Options', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=sc-toggle-form' );
                 }
             });
         },
         createControl : function( n, cm ) {
             return null;
         },
     });
	tinymce.PluginManager.add( 'toggle', tinymce.plugins.toggle );
	jQuery( function() {
		var form = jQuery( '<div id="sc-toggle-form"><table id="sc-toggle-table" class="form-table">\
							<tr>\
							<th><label for="sc-toggle-title">Title of Toggle</label></th>\
							<td><input type="text" id="sc-toggle-title" name="title" value="My Toggle" /><br />\
							<small>Enter a title for your toggle.</small></td>\
							</tr>\
							</table>\
							<p class="submit">\
							<input type="button" id="sc-toggle-submit" class="button-primary" value="Insert Toggle" name="submit" />\
							</p>\
							</div>' );
		var table = form.find( 'table' );
		form.appendTo( 'body' ).hide();
		form.find( '#sc-toggle-submit' ).click( function() {
			var shortcode = '';
			var tog_title = table.find( '#sc-toggle-title' ).val();
			shortcode = '[toggle title="' + tog_title + '"]<p>Insert your content here. You can also use column short codes or HTML content.</p>[/toggle]';
			tinyMCE.activeEditor.execCommand( 'mceInsertContent', 0, shortcode );
			tb_remove();
		} );
	} );
 } )();