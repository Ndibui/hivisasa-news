/**
 * Slider Short code button
 */

( function() {
     tinymce.create( 'tinymce.plugins.slider', {
        init : function( ed, url ) {
             ed.addButton( 'slider', {
                title : 'Insert Content Slider',
                image : url + '/images/slider.png',
                onclick : function() {
						var width = jQuery( window ).width(), H = jQuery( window ).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 120;
						tb_show( 'Slider Options', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=sc-slider-form' );
                 }
             });
         },
         createControl : function( n, cm ) {
             return null;
         },
     });
	tinymce.PluginManager.add( 'slider', tinymce.plugins.slider );
	jQuery( function() {
		var form = jQuery( '<div id="sc-slider-form"><table id="sc-slider-table" class="form-table">\
							<tr>\
							<th><label for="sc-slider-num">Number of slides to show</label></th>\
							<td><input type="text" id="sc-slider-num" name="num" value="3" /><br />\
							<small>Enter number of slides to show. Example: 4</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-slider-video">Include sample Vimeo slide?</label></th>\
							<td><select name="video" id="sc-slider-video">\
							<option value="yes">Yes</option>\
							<option value="no">No</option>\
							</select><br />\
							<small>Choose to insert a sample Vimeo video slide. You can duplicate the slide code to insert more videos. Replace video ID with the actual video ID on Vimeo.</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-slider-effect">Effect</label></th>\
							<td><select name="effect" id="sc-slider-effect">\
							<option value="fade">Fade</option>\
							<option value="slide">Slide</option>\
							</select><br />\
							<small>Select animation effect for slides.</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-slider-speed">Animation speed</label></th>\
							<td><input type="text" id="sc-slider-speed" name="speed" value="600" /><br />\
							<small>Enter an animation speed in milliseconds.</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-slider-timeout">Slides timeout</label></th>\
							<td><input type="text" id="sc-slider-timeout" name="timeout" value="4000" /><br />\
							<small>Enter a time in milliseconds, for how long a slide should stay.</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-slider-animationloop">Animation Loop</label></th>\
							<td><select name="animationloop" id="sc-slider-animationloop">\
							<option value="false">False</option>\
							<option value="true">True</option>\
							</select><br />\
							<small>Choose whether to show continous animation or not.</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-slider-smoothheight">Smooth Height</label></th>\
							<td><select name="smoothheight" id="sc-slider-smoothheight">\
							<option value="true">True</option>\
							<option value="false">False</option>\
							</select><br />\
							<small>Choose whether to show smooth height or fixed height.</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-slider-controlnav">Slider bullets</label></th>\
							<td><select name="controlnav" id="sc-slider-controlnav">\
							<option value="true">True</option>\
							<option value="false">False</option>\
							</select><br />\
							<small>Choose to show or hide slider navigation bullets.</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-slider-directionnav">Next/Previous</label></th>\
							<td><select name="directionnav" id="sc-slider-directionnav">\
							<option value="true">True</option>\
							<option value="false">False</option>\
							</select><br />\
							<small>Choose to show or hide next/previous buttons.</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-slider-easing">Animation Easing</label></th>\
							<td><select name="easing" id="sc-slider-easing">\
							<option value="swing">swing</option>\
							<option value="easeInQuad">easeInQuad</option>\
							<option value="easeOutQuad">easeOutQuad</option>\
							<option value="easeInOutQuad">easeInOutQuad</option>\
							<option value="easeInExpo">easeInExpo</option>\
							<option value="easeOutExpo">easeOutExpo</option>\
							<option value="easeInOutExpo">easeInOutExpo</option>\
							</select><br />\
							<small>Choose easing method for animation.</small></td>\
							</tr>\
							</table>\
							<p class="submit">\
							<input type="button" id="sc-slider-submit" class="button-primary" value="Insert Slider" name="submit" />\
							</p>\
							</div>' );
		var table = form.find( 'table' );
		form.appendTo( 'body' ).hide();
		form.find( '#sc-slider-submit' ).click( function() {
			var options = {
				'effect'			: 'fade',
				'easing'			: 'swing',
				'speed'				: '600',
				'timeout'			: '4000',
				'animationloop'		: 'false',
				'smoothheight'		: 'true',
				'controlnav'		: 'true',
				'directionnav'		: 'true'
				};
			var shortcode = '[slider';
			var inner = '';
			var dummy = '<p>Optional slide content. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus leo ante, consectetur sit amet vulputate vel, dapibus sit amet lectus. Etiam varius dui eget lorem elementum eget mattis sapien interdum.</p>';
			var num = table.find( '#sc-slider-num' ).val();
			var video_check = table.find( '#sc-slider-video' ).val();
			for( var index in options ) {
				var value = table.find( '#sc-slider-' + index ).val();
				if ( value !== options[ index ] ) {
						shortcode += ' ' + index + '="' + value + '"';
				} // value
			}
			shortcode += ']';
			for( var i = 1; i <= num; i++ ) {
				inner += '<p>[slide]</p><p><img src="http://yoursite.com/wp-content/themes/newsplus/images/slide.jpg" title="image title"/></p><p>[slide_text]</p><h2>Slide Heading ' + i + '</h2>' + dummy + '<p>[/slide_text]</p><p>[/slide]</p>';
			}
			if ( video_check == 'yes' ) {
				video_slide = '<p>[slide_video src="39683393"]</p>';
				shortcode += inner + video_slide + '[/slider]';
			}
			else
			 shortcode += inner + '[/slider]';
			tinyMCE.activeEditor.execCommand( 'mceInsertContent', 0, shortcode );
			tb_remove();
		} );
	} );
 } )();