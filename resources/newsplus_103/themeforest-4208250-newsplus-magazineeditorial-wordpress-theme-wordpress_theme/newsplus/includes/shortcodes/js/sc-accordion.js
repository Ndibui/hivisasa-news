/**
 * Accordion Short code button
 */

( function() {
     tinymce.create( 'tinymce.plugins.accordion', {
        init : function( ed, url ) {
             ed.addButton( 'accordion', {
                title : 'Insert an accordion',
                image : url + '/images/accordion.png',
                onclick : function() {
						var width = jQuery( window ).width(), H = jQuery( window ).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'Accordion Options', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=sc-accordion-form' );
                 }
             });
         },
         createControl : function( n, cm ) {
             return null;
         },
     });
	tinymce.PluginManager.add( 'accordion', tinymce.plugins.accordion );
	jQuery( function() {
		var form = jQuery( '<div id="sc-accordion-form"><table id="sc-accordion-table" class="form-table">\
							<tr>\
							<th><label for="sc-accordion-num">Number of Accordion items</label></th>\
							<td><input type="text" id="sc-accordion-num" name="num" value="3" /><br />\
							<small>Enter the number of accordion items to insert.</small></td>\
							</tr>\
							</table>\
							<p class="submit">\
							<input type="button" id="sc-accordion-submit" class="button-primary" value="Insert Accordions" name="submit" />\
							</p>\
							</div>' );
		var table = form.find( 'table' );
		form.appendTo( 'body' ).hide();
		form.find( '#sc-accordion-submit' ).click( function() {
			var shortcode = '[accordion]';
			var num_of_items = table.find( '#sc-accordion-num' ).val();
			for ( var i = 1; i <= num_of_items; i++ ) {
				shortcode += '<p>[acc_item title="Accordion item' + i + '"]<p>Accordion' + i + ' content here. You can edit this part and insert any HTML or plain text. You can also edit the titles of accordion.</p>[/acc_item]</p>';
				}
			shortcode += '[/accordion]';
			tinyMCE.activeEditor.execCommand( 'mceInsertContent', 0, shortcode );
			tb_remove();
		} );
	} );
 } )();