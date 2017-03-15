/**
 * Insert Posts Short code button
 */

( function() {
     tinymce.create( 'tinymce.plugins.insert_posts', {
        init : function( ed, url ) {
             ed.addButton( 'insert_posts', {
                title : 'Insert Posts',
                image : url + '/images/insert_posts.png',
                onclick : function() {
						var width = jQuery( window ).width(), H = jQuery( window ).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 120;
						tb_show( 'Post Options', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=sc-insert-posts-form' );
                 }
             });
         },
         createControl : function( n, cm ) {
             return null;
         },
     });
	tinymce.PluginManager.add( 'insert_posts', tinymce.plugins.insert_posts );
	jQuery( function() {
		var form = jQuery( '<div id="sc-insert-posts-form"><table id="sc-insert-posts-table" class="form-table">\
							<tr>\
							<th><label for="sc-insert-posts-display_style">Display Style</label></th>\
							<td><select name="display_style" id="sc-insert-posts-display_style">\
							<option value="one-col">One Columnar</option>\
							<option value="two-col">Two Columnar</option>\
							<option value="three-col">Three Columnar</option>\
							<option value="list-big">Big Thumbnails left aligned</option>\
							<option value="list-small">Small Thumbnails left aligned</option>\
							<option value="list-plain">Plain list</option>\
							</select><br/>\
							<small>Choose a display style for posts.</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-insert-posts-query_type">Query type</label></th>\
							<td><select name="query_type" id="sc-insert-posts-query_type">\
							<option value="category">Category</option>\
							<option value="tags">Tags</option>\
							<option value="posts">Selective Posts</option>\
							<option value="pages">Selective Pages</option>\
							<option value="cpt">Custom Post Types</option>\
							</select><br/>\
							<small>Choose how do you wish to query posts. i.e. from category, tags, selective posts, selective pages or CPTs.</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-insert-posts-cats">Category IDs for Posts</label></th>\
							<td><input type="text" id="sc-insert-posts-cats" name="cats" value="" /><br />\
							<small>Enter a numeric category ID, or IDs separated by comma, from which you wish to show posts. Example: 3,4,7</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-insert-posts-tags">Tag slug for Posts</label></th>\
							<td><input type="text" id="sc-insert-posts-tags" name="tags" value="" /><br />\
							<small>Enter tag slugs, separated by comma. Example: sports, lifestyle, tag-with-spaces</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-insert-posts-posts">Selective Post IDs</label></th>\
							<td><input type="text" id="sc-insert-posts-posts" name="posts" value="" /><br />\
							<small>Enter Post IDs of your selective posts, separated by comma. Example: 123,141,232</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-insert-posts-pages">Selective Page IDs</label></th>\
							<td><input type="text" id="sc-insert-posts-pages" name="pages" value="" /><br />\
							<small>Enter Page IDs of your selective pages, separated by comma. Example: 12,32,55</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-insert-posts-post_type">Custom Post Type Name</label></th>\
							<td><input type="text" id="sc-insert-posts-post_type" name="post_type" value="" /><br />\
							<small>Enter a Custom Post Type name. Example: product. or, event</small></td>\
							</tr>\
							<th><label for="sc-insert-posts-taxonomy">Custom Post Type Taxonomy</label></th>\
							<td><input type="text" id="sc-insert-posts-taxonomy" name="taxonomy" value="category" /><br />\
							<small>Enter a Taxonomy name for CPT. Example: product_cat, or portfolio_cat. Default is category</small></td>\
							</tr>\
							<th><label for="sc-insert-posts-terms">Custom Post Type Terms</label></th>\
							<td><input type="text" id="sc-insert-posts-terms" name="terms" value="" /><br />\
							<small>Enter Term slug names for CPT. Example: men,women,shoes,jeans</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-insert-posts-num">Number of posts to show</label></th>\
							<td><input type="text" id="sc-insert-posts-num" name="num" value="4" /><br />\
							<small>Enter number of posts to show. Example: 4</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-insert-posts-offset">Posts offset</label></th>\
							<td><input type="text" id="sc-insert-posts-offset" name="offset" value="0" /><br />\
							<small>Enter an offset for posts. i.e. how many posts should be skipped from the specified category or posts. Example: 3</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-insert-posts-excerpt_length">Excerpt Character length</label></th>\
							<td><input type="text" id="sc-insert-posts-excerpt_length" name="excerpt_length" value="140" /><br />\
							<small>Enter an excerpt length. Default is 140 characters.</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-insert-posts-hide_excerpt">Hide post excerpt?</label></th>\
							<td><select name="hide_excerpt" id="sc-insert-posts-hide_excerpt">\
							<option value="false">No</option>\
							<option value="true">Yes</option>\
							</select><br />\
							<small>Choose whether to show or hide excerpt.</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-insert-posts-hide_meta">Hide post meta?</label></th>\
							<td><select name="hide_meta" id="sc-insert-posts-hide_meta">\
							<option value="false">No</option>\
							<option value="true">Yes</option>\
							</select><br/>\
							<small>Choose whether to show or hide post meta.</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-insert-posts-hide_image">Hide post image?</label></th>\
							<td><select name="hide_image" id="sc-insert-posts-hide_image">\
							<option value="false">No</option>\
							<option value="true">Yes</option>\
							</select><br />\
							<small>Choose whether to show or hide featured image.</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-insert-posts-order">Order of appearance</label></th>\
							<td><select name="order" id="sc-insert-posts-order">\
							<option value="desc">Descending</option>\
							<option value="asc">Ascending</option>\
							</select><br />\
							<small>Select an order of appearance for posts. Ascending or descending.</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-insert-posts-orderby">Order posts by</label></th>\
							<td><select name="orderby" id="sc-insert-posts-orderby">\
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
							<input type="button" id="sc-insert-posts-submit" class="button-primary" value="Insert Posts" name="submit" />\
							</p>\
							</div>' );
		var table = form.find( 'table' );
		form.appendTo( 'body' ).hide();
		form.find( '#sc-insert-posts-submit' ).click( function() {
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
					'num'				: '4',
					'display_style'		: 'one-col',
					'offset'			: '0',
					'excerpt_length'	: '140',
					'hide_excerpt'		: 'false',
					'hide_meta'			: 'false',
					'hide_image'		: 'false'
				};
			var q_type = table.find( '#sc-insert-posts-query_type' ).val();
			var shortcode = '[insert_posts';
			for ( var index in options ) {
				var value = table.find( '#sc-insert-posts-' + index ).val();
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