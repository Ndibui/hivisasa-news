/**
 * List Short code button
 */

( function() {
     tinymce.create( 'tinymce.plugins.list', {
        init : function( ed, url ) {
             ed.addButton( 'list', {
                title : 'Insert icon list',
                image : url + '/images/list.png',
                onclick : function() {
						var width = jQuery( window ).width(), H = jQuery( window ).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'List Options', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=sc-list-form' );					                 }
             });
         },
         createControl : function( n, cm ) {
             return null;
         },
     });
	tinymce.PluginManager.add( 'list', tinymce.plugins.list );
	jQuery( function() {
		var form = jQuery( '<div id="sc-list-form"><table id="sc-list-table" class="form-table">\
						  <tr>\
						  <th><label for="sc-list-liststyle">List Style Icon</label></th>\
						  <td><select name="align" id="sc-list-liststyle">\
						  <option value="0">Check Dark</option>\
						  <option value="1">Heart</option>\
						  <option value="2">Star Dark</option>\
						  <option value="3">Star Light</option>\
						  <option value="4">User</option>\
						  <option value="5">Circle Arrow</option>\
						  <option value="6">Flag</option>\
						  <option value="7">Tag</option>\
						  <option value="8">Pencil</option>\
						  <option value="9">Circle Plus</option>\
						  <option value="10">Circle Check</option>\
						  <option value="11">Thumbs Up</option>\
						  </select><br />\
						  <small>Select a list style.</small></td>\
						  </tr>\
						  </table>\
						  <p class="submit">\
						  <input type="button" id="sc-list-submit" class="button-primary" value="Insert List" name="submit" />\
						  </p>\
						  </div>');
		var table = form.find( 'table' );
		form.appendTo( 'body' ).hide();
		form.find( '#sc-list-submit' ).click( function() {
			var shortcode = '';
			var liststyle = table.find( '#sc-list-liststyle' ).val();
			shortcode = '<ul class="list list' + liststyle + '"><li>List item one</li><li>List item two</li><li>List item three</li><li>List item four</li></ul>';
			tinyMCE.activeEditor.execCommand( 'mceInsertContent', 0, shortcode );
			tb_remove();
		} );
	} );
 } )();