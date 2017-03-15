/**
 * hr Short code button
 */

( function() {
     tinymce.create( 'tinymce.plugins.horz_rule', {
        init : function( ed, url ) {
             ed.addButton( 'horz_rule', {
                title : 'Insert a Horizontal rule',
                image : url + '/images/hr.png',
                onclick : function() {
						var width = jQuery( window ).width(), H = jQuery( window ).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'HR Options', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=sc-hr-form' );
                 }
             });
         },
         createControl : function( n, cm ) {
             return null;
         },
     });
	tinymce.PluginManager.add( 'horz_rule', tinymce.plugins.horz_rule );
	jQuery( function() {
		var form = jQuery( '<div id="sc-hr-form"><table id="sc-hr-table" class="form-table">\
							<tr>\
							<th><label for="sc-hr-style">Horizontal Rule Style</label></th>\
							<td><select name="style" id="sc-hr-style">\
							<option value="single">Single line</option>\
							<option value="double">Double line</option>\
							<option value="3d">3D Bar</option>\
							<option value="bar">Thick Bar</option>\
							<option value="dashed">Single dashed line</option>\
							</select><br />\
							<small>Select a style for horizontal rule.</small></td>\
							</tr>\
							</table>\
							<p class="submit">\
							<input type="button" id="sc-hr-submit" class="button-primary" value="Insert HR" name="submit" />\
							</p>\
							</div>' );
		var table = form.find( 'table' );
		form.appendTo( 'body' ).hide();
		form.find( '#sc-hr-submit' ).click( function() {
			var value = table.find( '#sc-hr-style' ).val();
			var shortcode = '[hr style="' + value + '"]';
			tinyMCE.activeEditor.execCommand( 'mceInsertContent', 0, shortcode );
			tb_remove();
		} );
	} );
 } )();