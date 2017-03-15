/**
 * Box Short code button
 */

( function() {
     tinymce.create( 'tinymce.plugins.box', {
        init : function( ed, url ) {
             ed.addButton( 'box', {
                title : 'Insert Content Box',
                image : url + '/images/box.png',
                onclick : function() {
						var width = jQuery( window ).width(), H = jQuery( window ).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'Content Box Options', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=sc-box-form' );
                 }
             });
         },
         createControl : function( n, cm ) {
             return null;
         },
     });
	tinymce.PluginManager.add( 'box', tinymce.plugins.box );
	jQuery( function() {
		var form = jQuery( '<div id="sc-box-form"><table id="sc-box-table" class="form-table">\
							<tr>\
							<th><label for="sc-box-boxstyle">Type of Box</label></th>\
							<td><select name="boxstyle" id="sc-box-boxstyle">\
							<option value="0">Normal Box</option>\
							<option value="1">Information or Warning</option>\
							<option value="2">Success Notification</option>\
							<option value="3">Error or restriction</option>\
							<option value="4">Event Notification</option>\
							</select><br/>\
							<small>Select the type of Content Box</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-box-close_btn">Show a close button?</label></th>\
							<td><select name="close_btn" id="sc-box-close_btn">\
							<option value="false">No</option>\
							<option value="true">Yes</option>\
							</select><br/>\
							<small>Select whether you wish to show a close button on box.</small></td>\
							</tr>\
							</table>\
							<p class="submit">\
							<input type="button" id="sc-box-submit" class="button-primary" value="Insert Content Box" name="submit" />\
							</p>\
							</div>' );
		var table = form.find( 'table' );
		form.appendTo( 'body' ).hide();
		form.find( '#sc-box-submit' ).click( function() {
			var boxstyle = table.find( '#sc-box-boxstyle' ).val();
			var close_btn = table.find( '#sc-box-close_btn' ).val();
			var shortcode = '[box style="' + boxstyle + '"';
			if ( 'true' == close_btn )
				shortcode += ' ' + 'close_btn="' + close_btn + '"';
			shortcode += ']<p>Your box content here. Lorem ipsum dolor sit amet.</p>[/box]';
			tinyMCE.activeEditor.execCommand( 'mceInsertContent', 0, shortcode );
			tb_remove();
		} );
	} );
 } )();