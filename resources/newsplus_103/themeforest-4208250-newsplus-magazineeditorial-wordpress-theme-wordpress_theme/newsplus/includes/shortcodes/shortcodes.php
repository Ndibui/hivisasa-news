<?php
/**
 * Theme short codes
 * Containes short codes for layout columns, tabs, accordion, slider, carousel, posts, etc.
 */

// Register and initialize short codes
function newsplus_add_shortcodes() {
	add_shortcode( 'col', 'col' );
	add_shortcode( 'row', 'row' );
	add_shortcode( 'tabs', 'tabs' );
	add_shortcode( 'tab', 'tab' );
	add_shortcode( 'toggle', 'toggle' );
	add_shortcode( 'accordion', 'accordion' );
	add_shortcode( 'acc_item', 'acc_item' );
	add_shortcode( 'box', 'box' );
	add_shortcode( 'hr', 'hr' );
	add_shortcode( 'btn', 'btn' );
	add_shortcode( 'indicator', 'indicator' );
	add_shortcode( 'slider', 'slider' );
	add_shortcode( 'slide', 'slide' );
	add_shortcode( 'slide_video', 'slide_video' );
	add_shortcode( 'slide_text', 'slide_text' );
	add_shortcode( 'posts_slider', 'posts_slider' );
	add_shortcode( 'posts_carousel', 'posts_carousel' );
	add_shortcode( 'insert_posts', 'insert_posts' );
}
add_action( 'init', 'newsplus_add_shortcodes' );

// Helper function for removing automatic p and br tags from nested short codes
function return_clean( $content, $p_tag = false, $br_tag = false )
{
	$content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content );

	if ( $br_tag )
		$content = preg_replace( '#<br \/>#', '', $content );

	if ( $p_tag )
		$content = preg_replace( '#<p>|</p>#', '', $content );

	return do_shortcode( shortcode_unautop( trim( $content ) ) );
}

function col( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'type' => 'full'
	), $atts ) );
	$out = '<div class="column ' . $type . '">' . return_clean( $content ) . '</div>';
	if ( strpos( $type, 'last' ) )
		$out .= '<div class="clear"></div>';
	return $out;
}

function row( $atts, $content = null ) {
	extract( shortcode_atts( array(), $atts ) );
	$out = '<div class="row">' . return_clean( $content ) . '</div>';
	return $out;
}

function tabs( $atts, $content = null ) {
   extract( shortcode_atts( array(), $atts ) );
	$out = '<div class="tabber">' . return_clean( $content ) . '</div>';
	return $out;
}

function tab( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'title' => 'mytab'
      ), $atts ) );
	$tab_id = 'tab-' . rand( 2, 20000 );
	$out = '<div class="tabbed" id="' . $tab_id . '"><h4 class="tab_title">' . $title . '</h4>' . return_clean( $content ) . '</div>';
	return $out;
}

function toggle( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'title' => 'mytoggle'
      ), $atts ) );
	$out = '<h5 class="toggle">' . $title . '</h5><div class="toggle-content">' . return_clean( $content ) . '</div>';
	return $out;
}

function accordion( $atts, $content = null ) {
   extract( shortcode_atts( array(), $atts ) );
	$out = '<div class="accordion">' . return_clean( $content ) . '</div>';
	return $out;
}

function acc_item( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'title' => 'myaccordion'
      ), $atts ) );
	$out = '<h5 class="handle">' . $title . '</h5><div class="acc-content"><div class="acc-inner">' . return_clean( $content ) . '</div></div>';
	return $out;
}

function box( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'style' 		=> '0',
	  'close_btn'	=> 'false'
      ), $atts ) );
	if ( $style == '0' ) $class = 'box0';
	if ( $style == '1' ) $class = 'box1';
	if ( $style == '2' ) $class = 'box2';
	if ( $style == '3' ) $class = 'box3';
	if ( $style == '4' ) $class = 'box4';
	if ( 'true' == $close_btn )
		$out = '<div class="box ' . $class . '">' . return_clean( $content ) . '<span class="hide_box">&#215;</span></div>';
	else
		$out = '<div class="box ' . $class . '">' . return_clean( $content ) . '</div>';
	return $out;
}

function btn( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'link'		=> '',
		'color'		=> 'default',
		'size'		=> '',
		'target'	=> '_self',
	), $atts ) );
	$color_class = ( $color == '' ) ? '' : $color;
	$size_class = ( ( $size != '' ) ) ? $size : '';
	if ( $target == '_blank' ) {
		return '<a href="' . $link . '" class="ss-button ' . $color_class . ' ' . $size_class . '" target="_blank">' . return_clean( $content ) . '</a>';
	}
	else
	{
		return '<a href="' . $link . '" class="ss-button ' . $color_class . ' ' . $size_class . '">' . return_clean( $content ) . '</a>';
	}
}

function hr( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'style' => 'single',
      ), $atts ) );
	$class = '';
	if ( $style == 'single' ) $class = 'hr';
	if ( $style == 'double' ) $class = 'hr-double';
	if ( $style == '3d' ) $class = 'hr-3d';
	if ( $style == 'bar' ) $class = 'hr-bar';
	if ( $style == 'dashed' ) $class = 'hr-dashed';
	$out = '<div class="' . $class . '"></div>';
	return $out;
}

function indicator( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'label'	=> 'Label here',
		'bg'	=> '#ffcc00',
		'value'	=> '75',
	), $atts ) );
	if ( $value < 0 )
		$value = 0;
	elseif ( $value > 100 )
		$value = 100;
	return '<div class="p_bar"><div class="p_label">' . $label . '</div><div class="p_indicator"><div class="p_active" style="width:' . $value . '%; background:' . $bg . '"></div></div><div class="p_value">' . $value . '%</div></div>';
}

function slider( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'effect'			=> 'fade',
		'easing'			=> 'swing',
		'speed'				=> '600',
		'timeout'			=> '4000',
		'animationloop'		=> 'false',
		'smoothheight'		=> 'true',
		'controlnav'		=> 'true',
		'directionnav'		=> 'true'
	), $atts ) );
	$slider_id = 'slider-' . rand( 2, 400000 );
	if ( 'false' == $directionnav && 'false' == $controlnav ) {
		$controls_container = "''";
		$container_markup = '';
	}
	else {
		$controls_container = '"#' . $slider_id . '-controls"';
		$container_markup = '<div class="flex-controls-container main-slider" id="' . $slider_id . '-controls"></div>';
	}
	$out = '<div class="slider-wrap clear">
	<script type="text/javascript">
		jQuery(window).load(function(){
			var vimeoPlayers = jQuery("#' . $slider_id . '").find("iframe");
			jQuery(vimeoPlayers).each(function(){
				Froogaloop(this).addEvent("ready", ready);
			});
			function ready(player_id) {
				Froogaloop(player_id).addEvent("play", function(data) {
					jQuery("#' . $slider_id . '").flexslider("pause");
				});
				Froogaloop(player_id).addEvent("pause", function(data) {
					jQuery("#'.$slider_id.'").flexslider("play");
				});
			}
			jQuery("#' . $slider_id . '").flexslider({
				animation: "' . $effect . '",
				easing: "' . $easing . '",
				animationSpeed:' . $speed . ',
				slideshowSpeed:' . $timeout . ',
				selector: ".slides > .slide",
				pauseOnAction: true,
				smoothHeight: ' . $smoothheight . ',
				controlNav: ' . $controlnav . ',
				directionNav: ' . $directionnav . ',
				useCSS: false,
				prevText: "' . __( 'Prev', 'newsplus') . '",
				nextText: "' . __( 'Next', 'newsplus') . '",
				controlsContainer: ' . $controls_container . ',
				animationLoop: ' . $animationloop . ',
				start: function(slider) {
					jQuery(slider).removeClass("flex-loading");
				},
				before: function(slider) {
					if (slider.slides.eq(slider.currentSlide).find("iframe").length !== 0)
						Froogaloop( slider.slides.eq(slider.currentSlide).find("iframe").attr("id") ).api("pause");
				},
				after: function(slider) {
				}
			});
		})
	</script>';
	$out .= '<div class="flexslider flex-loading" id="' . $slider_id . '"><div class="slides">' . return_clean( $content, false, true ) . '</div></div>' . $container_markup;
	return $out;
}

function slide( $atts, $content = null ) {
	extract( shortcode_atts( array(), $atts ) );
	$out = '<div class="slide">' . return_clean( $content ) . '</div>';
	return $out;
}

function slide_video( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'src' => ''
		), $atts ) );
	if ( '' != $src ) {
		$player_id = 'player_' . rand( 10, 400000 );
		$out = '<div class="slide"><div class="embed-wrap"><iframe id="' . $player_id . '" src="http://player.vimeo.com/video/' . $src . '?api=1&mp;player_id=' . $player_id . '"></iframe></div></div>';
	}
	else $out = '';
	return $out;
}

function slide_text( $atts, $content = null ) {
	extract( shortcode_atts( array(), $atts ) );
	$out = '<div class="flex-caption">' . return_clean( $content ) . '</div>';
	return $out;
}

function posts_slider( $atts ) {
	extract( shortcode_atts( array(
		'query_type'		=> 'category',
		'cats'				=> '-1',
		'posts'				=> '',
		'pages'				=> '',
		'tags'				=> '',
		'post_type'			=> '',
		'taxonomy'			=> 'category',
		'terms'				=> '',
		'operator'			=> 'IN',
		'order'				=> 'desc',
		'orderby'			=> 'date',
		'num'				=> '2',
		'offset'			=> '0',
		'effect'			=> 'fade',
		'easing'			=> 'swing',
		'speed'				=> '600',
		'timeout'			=> '4000',
		'animationloop'		=> 'false',
		'smoothheight'		=> 'true',
		'controlnav'		=> 'true',
		'directionnav'		=> 'true',
		'excerpt_length'	=> '140',
		'hide_excerpt'		=> 'false',
		'hide_meta'			=> 'false',
		'hide_image'		=> 'false'
	), $atts ) );

	if ( 'posts' == $query_type ) {
		$custom_args = array(
			'posts_per_page'		=> $num,
			'order'					=> $order,
			'orderby'				=> $orderby,
			'post__in'				=> explode( ',', $posts ),
			'offset'				=> $offset,
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1
		);
	}
	elseif ( 'pages' == $query_type ) {
		$custom_args = array(
			'post_type'				=> 'page',
			'posts_per_page'		=> $num,
			'order'					=> $order,
			'orderby'				=> $orderby,
			'post__in'				=> explode( ',', $pages ),
			'offset'				=> $offset,
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1
		);
	}
	elseif ( 'tags' == $query_type ) {
		$custom_args = array(
			'posts_per_page'		=> $num,
			'order'					=> $order,
			'orderby'				=> $orderby,
			'tag'					=> $tags,
			'offset'				=> $offset,
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1
		);
	}
	elseif ( 'cpt' == $query_type ) {
		$custom_args = array(
			'post_type'				=> $post_type,
			'posts_per_page'		=> $num,
			'order'					=> $order,
			'orderby'				=> $orderby,
			'tax_query' 			=> array(
											array(
												'taxonomy'	=> $taxonomy,
												'field'		=> 'slug',
												'terms'		=> explode( ',', $terms ),
												'operator' 	=> $operator // Allowed values AND, IN, NOT IN
											)
										),
			'offset'				=> $offset,
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1
		);
	}
	else {
		$custom_args = array(
			'posts_per_page' 		=> $num,
			'order' 				=> $order,
			'orderby' 				=> $orderby,
			'cat' 					=> $cats,
			'offset' 				=> $offset,
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1
		);
	}
	$custom_query = new WP_Query( $custom_args );
    if ( $custom_query->have_posts() ) :
		$slider_id = 'slider-' . rand( 2, 20000 );
		if ( 'false' == $directionnav && 'false' == $controlnav ) {
			$controls_container = "''";
			$container_markup = '';
		}
		else {
			$controls_container = '"#' . $slider_id . '-controls"';
			$container_markup = '<div class="flex-controls-container main-slider" id="' . $slider_id . '-controls"></div>';
		}
		$out = '<script type="text/javascript">
			jQuery(window).load(function(){
				jQuery("#' . $slider_id . '").flexslider({
					animation: "' . $effect . '",
					easing: "' . $easing . '",
					animationSpeed:' . $speed . ',
					slideshowSpeed:' . $timeout . ',
					selector: ".slides > .slide",
					pauseOnAction: true,
					smoothHeight: ' . $smoothheight . ',
					controlNav: ' . $controlnav . ',
					directionNav: ' . $directionnav . ',
					useCSS: false,
					prevText: "' . __( 'Prev', 'newsplus') . '",
					nextText: "' . __( 'Next', 'newsplus') . '",
					controlsContainer: ' . $controls_container . ',
					animationLoop: ' . $animationloop . ',
					start: function(slider) {
						jQuery(slider).removeClass("flex-loading");
					}
				});
			})
		</script>';
		$slides = '';
		while ( $custom_query->have_posts() ) :
			$custom_query->the_post();
			global $multipage;
			$multipage = 0;
			$time = get_the_time( get_option( 'date_format' ) );
			$permalink = get_permalink();
			$title = get_the_title();
			$excerpt = ( $hide_excerpt == 'true' ) ? '' : sprintf( '<p class="slide-excerpt">%1$s</p>', short( get_the_excerpt(), $excerpt_length ) );
			$postID = get_the_ID();
			$num_comments = get_comments_number();
			if ( comments_open() ) {
				if ( $num_comments == 0 ) {
					$comments = __( '0 Comments', 'newsplus' );
				} elseif ( $num_comments > 1 ) {
					$comments = $num_comments . __( ' Comments', 'newsplus' );
				} else {
					$comments = __( '1 Comment', 'newsplus' );
				}
				$write_comments = sprintf( __( '<span class="sep"> | </span><a href="%1$s" title="Comment on %3$s">%2$s</a>', 'newsplus' ), get_comments_link(), $comments, $title );
			}
			else {
				$write_comments = '';
			}
			$post_meta = ( $hide_meta == 'true' ) ? '' : sprintf( '<span class="entry-meta"><a href="%1$s" title="%2$s"><time class="entry-date" datetime="%3$s">%4$s</time></a> | %5$s%6$s</span>',
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			get_the_category_list( ', ' ),
			$write_comments
			);
			if ( has_post_thumbnail() && 'true' !== $hide_image ) {
				$img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $GLOBALS['post']->ID ), 'posts_slider_thumb' );
				$thumbnail = $img_src[0];
				$thumblink = sprintf( '<a class="slide-image" href="%1$s" title="%2$s"><img src="%3$s" alt="%2$s" title="%2$s"/></a>', $permalink, $title, $thumbnail );
			}
			else
				$thumblink = '';
			$no_meta_class = ( 'true' == $hide_excerpt && 'true' == $hide_meta ) ? 'no-meta' : '';
			$format = '<div class="slide">%1$s<div class="flex-caption %6$s"><h2><a href="%2$s" title="%3$s">%3$s</a></h2>%4$s%5$s</div></div>';
			$slides .= sprintf( $format, $thumblink, $permalink, $title, $excerpt, $post_meta, $no_meta_class );
		endwhile;
		$out .= '<div class="flexslider flex-loading" id="' . $slider_id . '"><div class="slides">' . $slides . '</div></div>' . $container_markup;
		return $out;
	endif;
	wp_reset_query();
	wp_reset_postdata(); // Restore global post data
}

function posts_carousel( $atts ) {
	extract( shortcode_atts( array(
		'query_type'		=> 'category',
		'cats'				=> '-1',
		'posts'				=> '',
		'pages'				=> '',
		'tags'				=> '',
		'post_type'			=> '',
		'taxonomy'			=> 'category',
		'terms'				=> '',
		'operator'			=> 'IN',
		'order'				=> 'desc',
		'orderby'			=> 'date',
		'num'				=> '6',
		'offset'			=> '0',
		'easing'			=> 'swing',
		'speed'				=> '600',
		'timeout'			=> '4000',
		'animationloop'		=> 'false',
		'controlnav'		=> 'true',
		'directionnav'		=> 'true',
		'excerpt_length'	=> '140',
		'hide_excerpt'		=> 'false',
		'hide_meta'			=> 'false',
		'hide_image'		=> 'false'
	), $atts ) );

	if ( 'posts' == $query_type ) {
		$custom_args = array(
			'posts_per_page'		=> $num,
			'order'					=> $order,
			'orderby'				=> $orderby,
			'post__in'				=> explode( ',', $posts ),
			'offset'				=> $offset,
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1
		);
	}
	elseif ( 'pages' == $query_type ) {
		$custom_args = array(
			'post_type'				=> 'page',
			'posts_per_page'		=> $num,
			'order'					=> $order,
			'orderby'				=> $orderby,
			'post__in'				=> explode( ',', $pages ),
			'offset'				=> $offset,
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1
		);
	}
	elseif ( 'tags' == $query_type ) {
		$custom_args = array(
			'posts_per_page'		=> $num,
			'order'					=> $order,
			'orderby'				=> $orderby,
			'tag'					=> $tags,
			'offset'				=> $offset,
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1
		);
	}
	elseif ( 'cpt' == $query_type ) {
		$custom_args = array(
			'post_type'				=> $post_type,
			'posts_per_page'		=> $num,
			'order'					=> $order,
			'orderby'				=> $orderby,
			'tax_query' 			=> array(
											array(
												'taxonomy'	=> $taxonomy,
												'field'		=> 'slug',
												'terms'		=> explode( ',', $terms ),
												'operator' 	=> $operator // Allowed values AND, IN, NOT IN
											)
										),
			'offset'				=> $offset,
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1
		);
	}
	else {
		$custom_args = array(
			'posts_per_page' 		=> $num,
			'order' 				=> $order,
			'orderby' 				=> $orderby,
			'cat' 					=> $cats,
			'offset' 				=> $offset,
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1
		);
	}
	$custom_query = new WP_Query( $custom_args );
	if ( $custom_query->have_posts() ) :
		$slider_id = 'slider-' . rand( 5, 20000 );
		$out = '<div class="slider-wrap clear">
		<script type="text/javascript">
		jQuery(window).load(function(){
			parentWidth = jQuery( "#' . $slider_id . '" ).width();
			bodyFontSize = jQuery("body").css("font-size");
			bodyFontSizeNum = parseFloat ( bodyFontSize );
			item_width = Math.floor( ( parentWidth - bodyFontSizeNum * 3 ) / 3 );
			item_margin = bodyFontSizeNum * 1.5;
			max_items = 3;
			if ( parentWidth < 480 ) {
				item_width = Math.floor( ( parentWidth - bodyFontSizeNum * 1.5 ) / 2 );
				max_items = 2;
			}
			jQuery("#' . $slider_id . '").flexslider({
				animation: "slide",
				easing:"' . $easing . '",
				animationSpeed:' . $speed . ',
				slideshowSpeed:' . $timeout . ',
				selector: ".slides > .slide",
				useCSS:false,
				prevText: "'.__( 'Prev', 'newsplus').'",
				nextText: "'.__( 'Next', 'newsplus').'",
				controlsContainer: "#' . $slider_id . '-controls",
				animationLoop: ' . $animationloop . ',
				controlNav: ' . $controlnav . ',
				directionNav: ' . $directionnav . ',
				itemWidth: item_width,
				itemMargin: item_margin,
				minItems: 1,
				maxItems: max_items,
				move: 0,
				start: function(slider) {
					jQuery(slider).removeClass("flex-loading");
				}
			});
		})
		</script>';
		$slides = '';
		while ( $custom_query->have_posts() ) :
			$custom_query->the_post();
			global $multipage;
			$multipage = 0;
			$time = get_the_time( get_option( 'date_format' ) );
			$permalink = get_permalink();
			$title = get_the_title();
			$excerpt = ( $hide_excerpt == 'true' ) ? '' : sprintf( '<p class="post-excerpt">%1$s</p>', short( get_the_excerpt(), $excerpt_length ) );
			$postID = get_the_ID();
			$num_comments = get_comments_number();
			if ( comments_open() ) {
				if ( $num_comments == 0 ) {
					$comments = __( '0 Comments', 'newsplus' );
				} elseif ( $num_comments > 1 ) {
					$comments = $num_comments . __( ' Comments', 'newsplus' );
				} else {
					$comments = __( '1 Comment', 'newsplus' );
				}
				$write_comments = sprintf( __( '<span class="sep"> | </span><a href="%1$s" title="Comment on %3$s">%2$s</a>', 'newsplus' ), get_comments_link(), $comments, $title );
			}
			else {
				$write_comments = '';
			}
			$post_meta = ( $hide_meta == 'true' ) ? '' : sprintf( '<span class="entry-meta"><a href="%1$s" title="%2$s"><time class="entry-date" datetime="%3$s">%4$s</time></a>%5$s</span>',
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			$write_comments );
			if ( has_post_thumbnail() && 'true' !== $hide_image ) {
				$img_big = wp_get_attachment_image_src( get_post_thumbnail_id( $GLOBALS['post']->ID ), 'three_col_thumb' );
				$thumbnail = $img_big[0];
				$thumblink = sprintf( '<div class="post-thumb"><a href="%1$s" title="%2$s"><img src="%3$s" alt="%2$s" title="%2$s"/></a></div>', $permalink, $title, $thumbnail );
			}
			else {
				$thumblink = '';
			}
			if ( 'video' == get_post_format() ) {
				$post_opts = get_post_meta( $GLOBALS['post']->ID, 'post_options', true );
				$pf_video = ! empty( $post_opts['pf_video'] ) ? $post_opts['pf_video'] : '';
				global $wp_embed;
				$post_embed = $wp_embed->run_shortcode( '[embed]' . $pf_video . '[/embed]' );
				if ( '' != $pf_video ) {
					$thumblink = sprintf( '<div class="embed-wrap">%1$s</div>', $post_embed );
				}
			}
			$no_meta_class = ( 'true' == $hide_excerpt && 'true' == $hide_meta ) ? 'no-meta' : '';
			$format = '<div class="slide post-%1$s">%2$s<div class="entry-content %7$s"><h3><a href="%3$s" title="%4$s">%4$s</a></h3>%5$s%6$s</div></div>';
			$slides .= sprintf ( $format, $postID, $thumblink, $permalink, $title, $excerpt, $post_meta, $no_meta_class );
		endwhile;
		$out .= '<div class="flexslider carousel flex-loading" id="' . $slider_id . '"><div class="slides">' . $slides . '</div></div><div class="flex-controls-container" id="' . $slider_id . '-controls"></div></div>';
		return $out;
	endif;
	wp_reset_query();
	wp_reset_postdata(); // Restore global post data
}

function insert_posts( $atts ) {
	extract( shortcode_atts( array(
		'query_type'		=> 'category',
		'cats'				=> '-1',
		'posts'				=> '',
		'pages'				=> '',
		'tags'				=> '',
		'post_type'			=> '',
		'taxonomy'			=> 'category',
		'terms'				=> '',
		'operator'			=> 'IN',
		'order'				=> 'desc',
		'orderby'			=> 'date',
		'num'				=> '4',
		'display_style'		=> 'one-col',
		'offset'			=> '0',
		'excerpt_length'	=> '140',
		'hide_excerpt'		=> 'false',
		'hide_meta'			=> 'false',
		'hide_image'		=> 'false'
	), $atts ) );

	if ( 'posts' == $query_type ) {
		$custom_args = array(
			'posts_per_page'		=> $num,
			'order'					=> $order,
			'orderby'				=> $orderby,
			'post__in'				=> explode( ',', $posts ),
			'offset'				=> $offset,
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1
		);
	}
	elseif ( 'pages' == $query_type ) {
		$custom_args = array(
			'post_type'				=> 'page',
			'posts_per_page'		=> $num,
			'order'					=> $order,
			'orderby'				=> $orderby,
			'post__in'				=> explode( ',', $pages ),
			'offset'				=> $offset,
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1
		);
	}
	elseif ( 'tags' == $query_type ) {
		$custom_args = array(
			'posts_per_page'		=> $num,
			'order'					=> $order,
			'orderby'				=> $orderby,
			'tag'					=> $tags,
			'offset'				=> $offset,
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1
		);
	}
	elseif ( 'cpt' == $query_type ) {
		$custom_args = array(
			'post_type'				=> $post_type,
			'posts_per_page'		=> $num,
			'order'					=> $order,
			'orderby'				=> $orderby,
			'tax_query' 			=> array(
											array(
												'taxonomy'	=> $taxonomy,
												'field'		=> 'slug',
												'terms'		=> explode( ',', $terms ),
												'operator' 	=> $operator // Allowed values AND, IN, NOT IN
											)
										),
			'offset'				=> $offset,
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1
		);
	}
	else {
		$custom_args = array(
			'posts_per_page' 		=> $num,
			'order' 				=> $order,
			'orderby' 				=> $orderby,
			'cat' 					=> $cats,
			'offset' 				=> $offset,
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1
		);
	}
	$custom_query = new WP_Query( $custom_args );
    if ( $custom_query->have_posts() ) :
		$count = 1;
		$fclass = '';
		$lclass = '';
		if( $display_style == 'two-col' ) {
			$out = '<ul class="two-col clear">';
		}
		elseif ( $display_style == 'three-col' ) {
			$out = '<ul class="three-col clear">';
		}
		elseif ( $display_style == 'list-small' || $display_style == 'list-plain' ) {
			$out = '<ul class="post-list">';
		}
		else
			$out = '';

		while ( $custom_query->have_posts() ) :
			$custom_query->the_post();
			global $multipage;
			$multipage = 0;
			$time = get_the_time( get_option( 'date_format' ) );
			$permalink = get_permalink();
			$title = get_the_title();
			$excerpt = ( $hide_excerpt == 'true' ) ? '' : sprintf( '<p class="post-excerpt">%1$s</p>', short( get_the_excerpt(), $excerpt_length ) );
			$postID = get_the_ID();
			$num_comments = get_comments_number();
			if ( comments_open() ) {
				if ( $num_comments == 0 ) {
					$comments = __( '0 Comments', 'newsplus' );
				}
				elseif ( $num_comments > 1 ) {
					$comments = $num_comments . __( ' Comments', 'newsplus' );
				}
				else {
					$comments = __( '1 Comment', 'newsplus' );
				}
				$write_comments = sprintf( __( '<span class="sep"> | </span><a href="%1$s" title="Comment on %3$s">%2$s</a>', 'newsplus' ), get_comments_link(), $comments, $title );
			}
			else {
				$write_comments = '';
			}
			$post_meta = ( $hide_meta == 'true' ) ? '' : sprintf( '<span class="entry-meta"><a href="%1$s" title="%2$s"><time class="entry-date" datetime="%3$s">%4$s</time></a>%5$s</span>',
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			$write_comments );
			
			$post_meta_big = ( $hide_meta == 'true' ) ? '' : sprintf( '<span class="entry-meta"><a href="%1$s" title="%2$s"><time class="entry-date" datetime="%3$s">%4$s</time></a> | %5$s%6$s</span>',
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			get_the_category_list( ', ' ),
			$write_comments );
			
			$no_meta_class = ( 'true' == $hide_excerpt && 'true' == $hide_meta ) ? 'no-meta' : '';

			if ( has_post_thumbnail() && 'true' !== $hide_image ) {
				if ( $display_style == 'list-small' ) {
					$img = wp_get_attachment_image_src( get_post_thumbnail_id( $GLOBALS['post']->ID ), 'list_small_thumb' );
				}
				elseif ( $display_style == 'list-big' ) {
					$img = wp_get_attachment_image_src( get_post_thumbnail_id( $GLOBALS['post']->ID ), 'list_big_thumb' );
				}
				elseif ( $display_style == 'two-col' ) {
					$img = wp_get_attachment_image_src( get_post_thumbnail_id( $GLOBALS['post']->ID ), 'two_col_thumb' );
				}
				elseif ( $display_style == 'three-col' ) {
					$img = wp_get_attachment_image_src( get_post_thumbnail_id( $GLOBALS['post']->ID ), 'three_col_thumb' );
				}
				else {
					$img = wp_get_attachment_image_src( get_post_thumbnail_id( $GLOBALS['post']->ID ), 'size_max' );
				}
				$thumbnail = $img[0];
				$thumbclass = '';
				if ( $display_style == 'list-big') {
					$thumblink = sprintf( '<div class="entry-list-left"><div class="entry-thumb"><a href="%1$s" title="%2$s"><img src="%3$s" alt="%2$s" title="%2$s"/></a></div></div>', $permalink, $title, $thumbnail );
				}
				else {
					$thumblink = sprintf( '<div class="post-thumb"><a href="%1$s" title="%2$s"><img src="%3$s" alt="%2$s" title="%2$s"/></a></div>', $permalink, $title, $thumbnail );
				}
			}
			else {
				$thumblink = '';
				if ( $display_style == 'list-big' || $display_style == 'list-small' )
					$thumbclass = 'no-image';
			}
			if ( 'video' == get_post_format() && $display_style != 'list-small' ) {
				$post_opts = get_post_meta( $GLOBALS['post']->ID, 'post_options', true );
				$pf_video = ! empty( $post_opts['pf_video'] ) ? $post_opts['pf_video'] : '';
				global $wp_embed;
				$post_embed = $wp_embed->run_shortcode( '[embed]' . $pf_video . '[/embed]' );
				if ( '' != $pf_video ) {
					if ( $display_style == 'list-big' ) {
						$thumblink = sprintf( '<div class="entry-list-left"><div class="embed-wrap">%1$s</div></div>', $post_embed );
						$thumbclass = '';
					}
					else
						$thumblink = sprintf( '<div class="embed-wrap">%1$s</div>', $post_embed );
				}
			}
			if ( $display_style == 'two-col' ) {
				$fclass = ( 0 == ( ( $count - 1 ) % 2 ) ) ? ' first-grid' : '';
				$lclass = ( 0 == ( $count % 2 ) ) ? ' last-grid' : '';
				$format = '<li class="post-%1$s entry-grid %2$s%3$s">%4$s<div class="entry-content %9$s"><h3><a href="%5$s" title="%6$s">%6$s</a></h3>%7$s%8$s</div></li>';
				$out .= sprintf ( $format, $postID, $fclass, $lclass, $thumblink, $permalink, $title, $excerpt, $post_meta_big, $no_meta_class );
				$count++;
			}
			elseif ( $display_style == 'three-col' ) {
				$fclass = ( 0 == ( ( $count - 1 ) % 3 ) ) ? ' first-grid' : '';
				$lclass = ( 0 == ( $count % 3 ) ) ? ' last-grid' : '';
				$format = '<li class="post-%1$s entry-grid %2$s%3$s">%4$s<div class="entry-content %9$s"><h3><a href="%5$s" title="%6$s">%6$s</a></h3>%7$s%8$s</div></li>';
				$out .= sprintf ( $format, $postID, $fclass, $lclass, $thumblink, $permalink, $title, $excerpt, $post_meta, $no_meta_class );
				$count++;
			}
			elseif ( $display_style == 'list-big' ) {
				$format = '<div class="post-%1$s entry-list clear">%2$s<div class="entry-list-right %3$s"><h3><a href="%4$s" title="%5$s">%5$s</a></h3>%6$s%7$s</div></div>';
				$out .= sprintf ( $format, $postID, $thumblink, $thumbclass, $permalink, $title, $excerpt, $post_meta_big );
			}
			elseif ( $display_style == 'list-small' ) {
				$format = '<li>%1$s<div class="post-content %2$s"><h3><a href="%3$s" title="%4$s">%4$s</a></h3>%5$s</div></li>';
				$out .= sprintf ( $format, $thumblink, $thumbclass, $permalink, $title, $post_meta );
			}
			elseif ( $display_style == 'list-plain' ) {
				$format = '<li><h4><a href="%1$s" title="%2$s">%2$s</a></h4>%3$s</li>';
				$out .= sprintf ( $format, $permalink, $title, $post_meta );
			}
			else {
				$format = '<div class="one-col post-%1$s entry-grid">%2$s<div class="entry-content %7$s"><h3><a href="%3$s" title="%4$s">%4$s</a></h3>%5$s%6$s</div></div>';
				$out .= sprintf ( $format, $postID, $thumblink, $permalink, $title, $excerpt, $post_meta_big, $no_meta_class );
			}
		endwhile;
		if ( $display_style != 'one-col' && $display_style != 'list-big' )
			$out .= '</ul>';
		return $out;
	endif;
	wp_reset_query();
	wp_reset_postdata(); // Restore global post data
} ?>