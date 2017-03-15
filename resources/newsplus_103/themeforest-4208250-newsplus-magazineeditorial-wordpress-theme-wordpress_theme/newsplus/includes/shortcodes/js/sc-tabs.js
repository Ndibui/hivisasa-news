/**
 * Tabs Short code button
 */

( function() {
     tinymce.create('tinymce.plugins.tabs', {
        init : function( ed, url ) {
             ed.addButton( 'tabs', {
                title : 'Insert a tabbed content',
                image : url + '/images/tabs.png',
                onclick : function() {
						var width = jQuery( window ).width(), H = jQuery( window ).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'Tabbed Content Options', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=sc-tabs-form' );
                 }
             });
         },
         createControl : function( n, cm ) {
             return null;
         },
     } );
	tinymce.PluginManager.add( 'tabs', tinymce.plugins.tabs );
	jQuery( function() {
		var form = jQuery( '<div id="sc-tabs-form"><table id="sc-tabs-table" class="form-table">\
							<tr>\
							<th><label for="sc-tabs-num">Number of Tabs</label></th>\
							<td><input type="text" id="sc-tabs-num" name="num" value="3" /><br />\
							<small>Enter the number of tabs to insert.</small></td>\
							</tr>\
							</table>\
							<p class="submit">\
							<input type="button" id="sc-tabs-submit" class="button-primary" value="Insert Tabs" name="submit" />\
							</p>\
							</div>' );
		var table = form.find( 'table' );
		form.appendTo( 'body' ).hide();
		form.find( '#sc-tabs-submit' ).click( function() {
			var shortcode = '';
			var inner = '';
			var num_of_tabs = table.find( '#sc-tabs-num' ).val();
			var tab_type = table.find( '#sc-tabs-type' ).val();
				for ( var i = 1; i <= num_of_tabs; i++ ) {
					inner += '<p>[tab title="Tab' + i + '"]<p>Tab' + i + ' content here. You can edit this part and insert any HTML or plain text. You can also edit the titles of tab.</p>[/tab]</p>';
				}
				shortcode = '[tabs]' + inner + '[/tabs]';
			tinyMCE.activeEditor.execCommand( 'mceInsertContent', 0, shortcode );
			tb_remove();
		} );
	} );
 } )();