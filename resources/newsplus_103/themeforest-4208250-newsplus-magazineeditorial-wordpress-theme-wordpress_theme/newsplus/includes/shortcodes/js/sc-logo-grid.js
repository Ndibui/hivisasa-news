/**
 * Logo Grid Short code button
 */

( function() {
     tinymce.create( 'tinymce.plugins.logo_grid', {
        init : function( ed, url ) {
             ed.addButton( 'logo_grid', {
                title : 'Insert a grid list of logo images',
                image : url + '/images/logo_grid.png',
                onclick : function() {
						var width = jQuery( window ).width(), H = jQuery( window ).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'Logo Grid Options', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=sc-logo-grid-form' );					                 }
             });
         },
         createControl : function( n, cm ) {
             return null;
         },
     });
	tinymce.PluginManager.add( 'logo_grid', tinymce.plugins.logo_grid );
	jQuery( function() {
		var form = jQuery( '<div id="sc-logo-grid-form"><table id="sc-logo-grid-table" class="form-table">\
							<tr>\
							<th><label for="sc-logo-grid-num">Number of Grid Items</label></th>\
							<td><input type="text" id="sc-logo-grid-num" name="num" value="4" /><br />\
							<small>Enter the number of grid items to insert. After insertion, you can edit individual images as per your requirement.</small></td>\
							</tr>\
							</table>\
							<p class="submit">\
							<input type="button" id="sc-logo-grid-submit" class="button-primary" value="Insert List" name="submit" />\
							</p>\
							</div>' );
		var table = form.find( 'table' );
		form.appendTo( 'body' ).hide();
		form.find( '#sc-logo-grid-submit' ).click( function() {
			var shortcode = '';
			var inner = '';
			var grid_num = table.find( '#sc-logo-grid-num' ).val();
			for( var i = 1; i <= grid_num; i++ ) {
				inner += '<li><a title="Company name" href="#"><img src="http://yoursite.com/wp-content/themes/newsplus/images/client.jpg" alt="" title=""/></a></li>';
			}
			shortcode = '<ul class="logo-grid">' + inner + '</ul>';
			tinyMCE.activeEditor.execCommand( 'mceInsertContent', 0, shortcode );
			tb_remove();
		} );
	} );
 } )();