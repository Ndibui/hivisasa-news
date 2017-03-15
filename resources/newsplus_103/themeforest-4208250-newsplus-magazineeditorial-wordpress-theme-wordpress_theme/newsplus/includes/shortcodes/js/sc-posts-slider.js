/**
 * Posts Slider Short code button
 */

( function() {
     tinymce.create( 'tinymce.plugins.posts_slider', {
        init : function( ed, url ) {
             ed.addButton( 'posts_slider', {
                title : 'Insert Posts Slider',
                image : url + '/images/posts_slider.png',
                onclick : function() {
						var width = jQuery( window ).width(), H = jQuery( window ).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 120;
						tb_show( 'Posts Slider Options', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=sc-posts-slider-form' );
                 }
             });
         },
         createControl : function( n, cm ) {
             return null;
         },
     });
	tinymce.PluginManager.add( 'posts_slider', tinymce.plugins.posts_slider );
	jQuery( function() {
	var form = jQuery( '<div id="sc-posts-slider-form"><table id="sc-posts-slider-table" class="form-table">\
						<tr>\
						<th><label for="sc-posts-slider-effect">Effect</label></th>\
						<td><select name="effect" id="sc-posts-slider-effect">\
						<option value="fade">Fade</option>\
						<option value="slide">Slide</option>\
						</select><br />\
						<small>Select animation effect for slides.</small></td>\
						</tr>\
						<tr>\
						<th><label for="sc-posts-slider-speed">Animation speed</label></th>\
						<td><input type="text" id="sc-posts-slider-speed" name="speed" value="600" /><br />\
						<small>Enter an animation speed in milliseconds.</small></td>\
						</tr>\
						<tr>\
						<th><label for="sc-posts-slider-timeout">Slides timeout</label></th>\
						<td><input type="text" id="sc-posts-slider-timeout" name="timeout" value="4000" /><br />\
						<small>Enter a time in milliseconds, for how long a slide should stay.</small></td>\
						</tr>\
						<tr>\
						<th><label for="sc-posts-slider-animationloop">Animation Loop</label></th>\
						<td><select name="animationloop" id="sc-posts-slider-animationloop">\
						<option value="false">False</option>\
						<option value="true">True</option>\
						</select><br />\
						<small>Choose whether to show continous animation or not.</small></td>\
						</tr>\
						<tr>\
						<th><label for="sc-posts-slider-smoothheight">Smooth Height</label></th>\
						<td><select name="smoothheight" id="sc-posts-slider-smoothheight">\
						<option value="true">True</option>\
						<option value="false">False</option>\
						</select><br />\
						<small>Choose whether to show smooth height or fixed height.</small></td>\
						</tr>\
						<tr>\
						<th><label for="sc-posts-slider-controlnav">Slider bullets</label></th>\
						<td><select name="controlnav" id="sc-posts-slider-controlnav">\
						<option value="true">True</option>\
						<option value="false">False</option>\
						</select><br />\
						<small>Choose to show or hide slider navigation bullets.</small></td>\
						</tr>\
						<tr>\
						<th><label for="sc-posts-slider-directionnav">Next/Previous</label></th>\
						<td><select name="directionnav" id="sc-posts-slider-directionnav">\
						<option value="true">True</option>\
						<option value="false">False</option>\
						</select><br />\
						<small>Choose to show or hide next/previous buttons.</small></td>\
						</tr>\
						<tr>\
						<th><label for="sc-posts-slider-easing">Animation Easing</label></th>\
						<td><select name="easing" id="sc-posts-slider-easing">\
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
						<tr>\
						<th><label for="sc-posts-slider-query_type">Query type</label></th>\
						<td><select name="query_type" id="sc-posts-slider-query_type">\
						<option value="category">Category</option>\
						<option value="tags">Tags</option>\
						<option value="posts">Selective Posts</option>\
						<option value="pages">Selective Pages</option>\
						<option value="cpt">Custom Post Types</option>\
						</select><br/>\
						<small>Choose how do you wish to query posts. i.e. from category, tags, selective posts, selective pages or CPTs.</small></td>\
						</tr>\
						<tr>\
						<th><label for="sc-posts-slider-cats">Category IDs for Posts</label></th>\
						<td><input type="text" id="sc-posts-slider-cats" name="cats" value="" /><br />\
						<small>Enter a numeric category ID, or IDs separated by comma, from which you wish to show posts. Example: 3,4,7</small></td>\
						</tr>\
						<tr>\
						<th><label for="sc-posts-slider-tags">Tag slug for Posts</label></th>\
						<td><input type="text" id="sc-posts-slider-tags" name="tags" value="" /><br />\
						<small>Enter tag slugs, separated by comma. Example: sports, lifestyle, tag-with-spaces</small></td>\
						</tr>\
						<tr>\
						<th><label for="sc-posts-slider-posts">Selective Post IDs</label></th>\
						<td><input type="text" id="sc-posts-slider-posts" name="posts" value="" /><br />\
						<small>Enter Post IDs of your selective posts, separated by comma. Example: 123,141,232</small></td>\
						</tr>\
						<tr>\
						<th><label for="sc-posts-slider-pages">Selective Page IDs</label></th>\
						<td><input type="text" id="sc-posts-slider-pages" name="pages" value="" /><br />\
						<small>Enter Page IDs of your selective pages, separated by comma. Example: 12,32,55</small></td>\
						</tr>\
						<tr>\
						<th><label for="sc-posts-slider-post_type">Custom Post Type Name</label></th>\
						<td><input type="text" id="sc-posts-slider-post_type" name="post_type" value="" /><br />\
						<small>Enter a Custom Post Type name. Example: product. or, event</small></td>\
						</tr>\
						<th><label for="sc-posts-slider-taxonomy">Custom Post Type Taxonomy</label></th>\
						<td><input type="text" id="sc-posts-slider-taxonomy" name="taxonomy" value="category" /><br />\
						<small>Enter a Taxonomy name for CPT. Example: product_cat, or portfolio_cat. Default is category</small></td>\
						</tr>\
						<th><label for="sc-posts-slider-terms">Custom Post Type Terms</label></th>\
						<td><input type="text" id="sc-posts-slider-terms" name="terms" value="" /><br />\
						<small>Enter Term slug names for CPT. Example: men,women,shoes,jeans</small></td>\
						</tr>\
						<tr>\
						<th><label for="sc-posts-slider-num">Number of posts to show</label></th>\
						<td><input type="text" id="sc-posts-slider-num" name="num" value="4" /><br />\
						<small>Enter number of posts to show. Example: 4</small></td>\
						</tr>\
						<tr>\
						<th><label for="sc-posts-slider-offset">Posts offset</label></th>\
						<td><input type="text" id="sc-posts-slider-offset" name="offset" value="0" /><br />\
						<small>Enter an offset for posts. i.e. how many posts should be skipped from the specified category or posts. Example: 3</small></td>\
						</tr>\
						<tr>\
						<th><label for="sc-posts-slider-excerpt_length">Excerpt Character length</label></th>\
						<td><input type="text" id="sc-posts-slider-excerpt_length" name="excerpt_length" value="140" /><br />\
						<small>Enter an excerpt length. Default is 140 characters.</small></td>\
						</tr>\
						<tr>\
						<th><label for="sc-posts-slider-hide_excerpt">Hide post excerpt?</label></th>\
						<td><select name="hide_excerpt" id="sc-posts-slider-hide_excerpt">\
						<option value="false">No</option>\
						<option value="true">Yes</option>\
						</select><br />\
						<small>Choose whether to show or hide excerpt.</small></td>\
						</tr>\
						<tr>\
						<th><label for="sc-posts-slider-hide_meta">Hide post meta?</label></th>\
						<td><select name="hide_meta" id="sc-posts-slider-hide_meta">\
						<option value="false">No</option>\
						<option value="true">Yes</option>\
						</select><br/>\
						<small>Choose whether to show or hide post meta.</small></td>\
						</tr>\
						<tr>\
						<th><label for="sc-posts-slider-hide_image">Hide post image?</label></th>\
						<td><select name="hide_image" id="sc-posts-slider-hide_image">\
						<option value="false">No</option>\
						<option value="true">Yes</option>\
						</select><br/>\
						<small>Choose whether to show or hide post featured image.</small></td>\
						</tr>\
						<tr>\
						<th><label for="sc-posts-slider-order">Order of appearance</label></th>\
						<td><select name="order" id="sc-posts-slider-order">\
						<option value="desc">Descending</option>\
						<option value="asc">Ascending</option>\
						</select><br />\
						<small>Select an order of appearance for posts. Ascending or descending.</small></td>\
						</tr>\
						<tr>\
						<th><label for="sc-posts-slider-orderby">Order posts by</label></th>\
						<td><select name="orderby" id="sc-posts-slider-orderby">\
						<option value="date">Date</option>\
						<option value="title">Title</option>\
						<option value="rand">Random</option>\
						<option value="author">Author</option>\
						<option value="modified">Last Modified</option>\
						<option value="comment_count">Comment Count</option>\
						</select><br />\
						<small>Select how do you wish to sort posts. i.e. by date, title, random order, etc.</small></td>\
						</tr>\
						</table>\
						<p class="submit">\
						<input type="button" id="sc-posts-slider-submit" class="button-primary" value="Insert Posts Slider" name="submit" />\
						</p>\
						</div>' );
		var table = form.find( 'table' );
		form.appendTo( 'body' ).hide();
		form.find( '#sc-posts-slider-submit' ).click( function() {
			var options = {
				'query_type'		: 'category',
				'cats'				: '-1',
				'posts'				: '',
				'pages'				: '',
				'tags'				: '',
				'post_type'			: '',
				'taxonomy'			: 'category',
				'terms'				: '',
				'order'				: 'desc',
				'orderby'			: 'date',
				'num'				: '2',
				'offset'			: '0',
				'effect'			: 'fade',
				'easing'			: 'swing',
				'speed'				: '600',
				'timeout'			: '4000',
				'animationloop'		: 'false',
				'smoothheight'		: 'true',
				'controlnav'		: 'true',
				'directionnav'		: 'true',
				'excerpt_length'	: '140',
				'hide_excerpt'		: 'false',
				'hide_meta'			: 'false',
				'hide_image'		: 'false'
				};
			var q_type = table.find( '#sc-posts-slider-query_type' ).val();
			var shortcode = '[posts_slider';
			for ( var index in options ) {
				var value = table.find( '#sc-posts-slider-' + index ).val();
				if ( value !== options[ index ] ) {
					if ( q_type == 'category' && index != 'posts' && index != 'pages' && index != 'tags' && index != 'cpt' && index != 'post_type' && index != 'taxonomy' && index != 'terms' )
						shortcode += ' ' + index + '="' + value + '"';
					if ( q_type == 'posts' && index != 'cats' && index != 'pages' && index != 'tags' && index != 'cpt' && index != 'post_type' && index != 'taxonomy' && index != 'terms' )
						shortcode += ' ' + index + '="' + value + '"';
					if ( q_type == 'pages' && index != 'cats' && index != 'posts' && index != 'tags' && index != 'cpt' && index != 'post_type' && index != 'taxonomy' && index != 'terms' )
						shortcode += ' ' + index + '="' + value + '"';
					if ( q_type == 'tags' && index != 'cats' && index != 'posts' && index != 'pages' && index != 'cpt' && index != 'post_type' && index != 'taxonomy' && index != 'terms' )
						shortcode += ' ' + index + '="' + value + '"';
					if ( q_type == 'cpt' && index != 'cats' && index != 'posts' && index != 'pages' && index != 'tags' )
						shortcode += ' ' + index + '="' + value + '"';
				} // value
			}
			shortcode += ']';
			tinyMCE.activeEditor.execCommand( 'mceInsertContent', 0, shortcode );
			tb_remove();
		} );
	} );
 } )();