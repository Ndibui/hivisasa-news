<?php
/**
 * NewsPlus functions and definitions.
 *
 * Contains helper functions used in the theme, along with functions
 * that are attached to action and filter hooks in WordPress.

 * Most functions in this file are pluggable, and can be used in Child Theme.
 * Functions that are not pluggable (not wrapped in function_exists()) are attached
 * to a filter or action hook.
 *
 */

/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 660;

/**
 * Sets up theme defaults and registers the various WordPress features that
 * NewsPlus supports.
 */
function newsplus_setup() {

	// Make theme options variables globally available for use
	global $options;
	foreach ( $options as $value ) {
		if( isset( $value['id'] ) && isset( $value['std'] ) ) {
			global $$value['id'];
			if ( get_option( $value['id'] ) === FALSE )
				$$value['id'] = $value['std'];
			else
				$$value['id'] = get_option( $value['id'] );
		}
	}

	// Makes theme available for translation.
	load_theme_textdomain( 'newsplus', get_template_directory() . '/languages' );

	// Add visual editor stylesheet support
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Add post formats
	add_theme_support( 'post-formats', array( 'gallery', 'video' ) );

	// Add navigation menus
	register_nav_menus( array(
		'secondary'	=> __( 'Secondary Top Menu', 'newsplus' ),
		'primary'	=> __( 'Primary Menu', 'newsplus' )
	) );

	// Add support for custom background and set default color
	add_theme_support( 'custom-background', array(
		'default-color' => 'f5f5f5',
		'default-image' => ''
	) );

	// Add suport for post thumbnails and set default sizes
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 800, 9999 );

	// Add custom image sizes
	add_image_size( 'size_max', 1000, 9999 );
	
	// Posts Slider
	add_image_size( 'posts_slider_thumb', $ps_width, $ps_height, $ps_crop );

	// Two Columnar Grid Posts
	add_image_size( 'two_col_thumb', $two_col_width, $two_col_height, $two_col_crop );

	// Three Columnar Grid Posts
	add_image_size( 'three_col_thumb', $three_col_width, $three_col_height, $three_col_crop );

	// List Big
	add_image_size( 'list_big_thumb', $list_big_width, $list_big_height, $list_big_crop );

	// List Small
	add_image_size( 'list_small_thumb', $list_small_width, $list_small_height, $list_small_crop );

	// Related Posts
	add_image_size( 'related_posts_thumb', $rp_width, $rp_height, $rp_crop );

	// Minifolio Widget
	add_image_size( 'minifolio_thumb', $mf_width, $mf_height, $mf_crop );
	
	// Single Post
	add_image_size( 'single_thumb', $sng_width, $sng_height, $sng_crop );


	// Declare theme as WooCommerce compatible
	$template = get_option( 'template' );
	update_option( 'woocommerce_theme_support_check', $template );

}
add_action( 'after_setup_theme', 'newsplus_setup' );


/**
 * Include widgets and theme option files
 */
require_once( 'includes/widget-categories.php' );
require_once( 'includes/widget-recent-posts.php' );
require_once( 'includes/widget-popular-posts.php' );
require_once( 'includes/widget-minifolio.php' );
require_once( 'includes/widget-flickr.php' );
require_once( 'includes/widget-social-links.php' );
require_once( 'includes/post-options.php' );
require_once( 'includes/page-options.php' );
require_once( 'includes/theme-admin-options.php' );
require_once( 'includes/shortcodes/shortcodes.php' );
require_once( 'includes/shortcodes/visual-shortcodes.php' );
require_once( 'includes/breadcrumbs.php' );
require_once( 'includes/theme-customizer.php' );


/**
 * Enqueue scripts and styles for front-end.
 */
function newsplus_scripts_styles() {
	global $wp_styles, $pls_archive_template, $pls_scheme, $pls_disable_resp_css, $pls_enable_rtl_css, $pls_disable_user_css, $pls_disable_prettyphoto, $pls_ss_sharing, $pls_ss_tw, $pls_ss_gp, $pls_ss_pint, $pls_ss_ln, $pls_disable_custom_font, $pls_font_family, $pls_font_subset;

	/*
	 * Add JavaScript for threaded comments when required
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/*
	 * Add JavaScript plugins required by the theme
	 */
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'tabber', get_template_directory_uri() . '/js/tabs.js', array( 'jquery-ui-core', 'jquery-ui-tabs', 'jquery-ui-accordion' ), '', true );
	wp_enqueue_script( 'jq-easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array(), '', true );
	wp_enqueue_script( 'jq-hover-intent', get_template_directory_uri() . '/js/jquery.hoverIntent.minified.js', array(), '', true );
	wp_enqueue_script( 'jq-froogaloop', get_template_directory_uri() . '/js/froogaloop2.min.js', array(), '', true );
	wp_enqueue_script( 'jq-flex-slider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array(), '', true );

	if ( 'true' !== $pls_disable_prettyphoto )
	wp_enqueue_script( 'jq-pretty-photo', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array(), '', true );

	// For contact page template
	if( is_page_template( 'templates/page-contact.php' ) ) {
		wp_register_script( 'jq-validate', get_template_directory_uri() . '/js/jquery.validate.min.js', array(), '', true );
		wp_enqueue_script( 'contact-form', get_template_directory_uri() . '/js/contact-form.js', array( 'jq-validate' ), '', true );
	}

	// Load social sharing scripts in footer
	if( is_single() && 'true' == $pls_ss_sharing ) {
		if( 'true' == $pls_ss_tw )
			wp_enqueue_script( 'twitter_share_script', 'http://platform.twitter.com/widgets.js', '', '', true );
		if( 'true' == $pls_ss_gp )
			wp_enqueue_script( 'google_plus_script', 'https://apis.google.com/js/plusone.js', '', '', true );
		if( 'true' == $pls_ss_pint )
			wp_enqueue_script( 'pinterest_script', '//assets.pinterest.com/js/pinit.js', '', '', true );
		if( 'true' == $pls_ss_ln )
			wp_enqueue_script( 'linkedin_script', 'http://platform.linkedin.com/in.js', '', '', true );
	}

	// Custom JavaScript file used to initialize plugins
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array(), '', true );


	/*
	 * Google font CSS file
	 *
	 * The use of custom Google fonts can be configured inside Theme Options Panel.
	 */

	if ( 'true' !== $pls_disable_custom_font ) {
		$protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
			'family' => $pls_font_family,
			'subset' => $pls_font_subset,
		);
		wp_enqueue_style( 'newsplus-fonts', add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" ), array(), null );
	}

	/*
	 * Load stylesheets required by the theme
	 */

	// Main stylesheet
	wp_enqueue_style( 'newsplus-style', get_stylesheet_uri() );

	// Internet Explorer specific stylesheet
	wp_enqueue_style( 'newsplus-ie', get_template_directory_uri() . '/css/ie.css', array(), '' );
	$wp_styles->add_data( 'newsplus-ie', 'conditional', 'lt IE 9' );

	// RTL stylesheet
	if ( 'true' == $pls_enable_rtl_css || is_rtl() ) {
		wp_register_style( 'rtl', get_template_directory_uri() . '/rtl.css', array(), '' );
		wp_enqueue_style( 'rtl' );
	}

	// Responsive stylesheet
	if ( 'true' != $pls_disable_resp_css ) {
		wp_register_style( 'newsplus-responsive', get_template_directory_uri() . '/responsive.css', array(), '' );
		wp_enqueue_style( 'newsplus-responsive' );

		// Load RTL responsive only if RTL version enabled
		if ( 'true' == $pls_enable_rtl_css || is_rtl() ) {
			wp_register_style( 'newsplus-rtl-responsive', get_template_directory_uri() . '/rtl-responsive.css', array(), '' );
			wp_enqueue_style( 'newsplus-rtl-responsive' );
		}
	}
	if ( 'true' !== $pls_disable_prettyphoto ) {
		wp_register_style( 'prettyphoto', get_template_directory_uri() . '/css/prettyPhoto.css', array(), '' );
		wp_enqueue_style( 'prettyphoto' );
	}

	// User stylesheet
	if ( 'true' != $pls_disable_user_css  ) {
		wp_register_style( 'newsplus-user', get_template_directory_uri() . '/user.css', array(), '' );
		wp_enqueue_style( 'newsplus-user' );
	}
}
add_action( 'wp_enqueue_scripts', 'newsplus_scripts_styles' );

/**
 * Enqueue html5 script in head section for old browsers
 */
function html5_js() { ?>
<!--[if lt IE 9]>
<script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?php }
add_action( 'wp_head', 'html5_js' );

/**
 * Allow custom head markup to be inserted by user from Theme Options
 */
function custom_head_code() {
global $pls_custom_head_code;
if ( '' != $pls_custom_head_code )
	echo stripslashes( $pls_custom_head_code );
}
add_action( 'wp_head', 'custom_head_code');

/**
 * Generate title for site pages
 */
function newsplus_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'newsplus' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'newsplus_wp_title', 10, 2 );


/**
 * Register theme widgets and widget areas
 */
function newsplus_widgets_init() {

	register_widget( 'NewsPlus_Cat_Widget' );
	register_widget( 'NewsPlus_Recent_Posts' );
	register_widget( 'NewsPlus_Popular_Posts' );
	register_widget( 'NewsPlus_Mini_Folio' );
	register_widget( 'NewsPlus_Flickr_Widget' );
	register_widget( 'NewsPlus_Social_Widget' );

	register_sidebar( array(
		'name' 			=> __( 'Default Header Bar', 'newsplus' ),
		'id' 			=> 'default-headerbar',
		'description' 	=> __( 'Header Bar', 'newsplus' ),
		'before_widget' => '<aside id="%1$s" class="hwa-wrap %2$s">',
		'after_widget'	=> "</aside>",
		'before_title' 	=> '<h3 class="hwa-title">',
		'after_title' 	=> '</h3>',
		'handler'		=> 'headerbar'
	) );

	register_sidebar( array(
		'name' 			=> __( 'Default Sidebar', 'newsplus' ),
		'id' 			=> 'default-sidebar',
		'description' 	=> __( 'Sidebar', 'newsplus' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> "</aside>",
		'before_title' 	=> '<h3 class="sb-title">',
		'after_title' 	=> '</h3>',
		'handler'		=> 'sidebar'
	) );

	register_sidebar( array(
		'name' 			=> __( 'Default Secondary Column 1', 'newsplus' ),
		'id' 			=> 'secondary-column-1',
		'description' 	=> __( 'Secondary Column', 'newsplus' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> "</aside>",
		'before_title' 	=> '<h3 class="sc-title">',
		'after_title' 	=> '</h3>',
	) );

	register_sidebar( array(
		'name' 			=> __( 'Default Secondary Column 2', 'newsplus' ),
		'id' 			=> 'secondary-column-2',
		'description' 	=> __( 'Secondary Column', 'newsplus' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> "</aside>",
		'before_title' 	=> '<h3 class="sc-title">',
		'after_title' 	=> '</h3>',
	) );

	register_sidebar( array(
		'name' 			=> __( 'Default Secondary Column 3', 'newsplus' ),
		'id' 			=> 'secondary-column-3',
		'description' 	=> __( 'Secondary Column', 'newsplus' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> "</aside>",
		'before_title' 	=> '<h3 class="sc-title">',
		'after_title' 	=> '</h3>',
	) );

	register_sidebar( array(
		'name' 			=> __( 'Default Secondary Column 4', 'newsplus' ),
		'id' => 'secondary-column-4',
		'description' 	=> __( 'Secondary Column', 'newsplus' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> "</aside>",
		'before_title' 	=> '<h3 class="sc-title">',
		'after_title' 	=> '</h3>',
	) );

	// Register exclusive widget areas for each page
	$mypages = get_pages();
	foreach ( $mypages as $pp ) {
		$page_opts = get_post_meta( $pp->ID, 'page_options', true );
		$sidebar_a = isset( $page_opts['sidebar_a'] ) ? $page_opts['sidebar_a'] : '';
		$sidebar_h = isset( $page_opts['sidebar_h'] ) ? $page_opts['sidebar_h'] : '';

		if ( 'true' == $sidebar_h ){
			register_sidebar( array(
				'name' 			=> sprintf( __( '%1$s Header Bar', 'newsplus' ), $pp->post_title ),
				'id' 			=> $pp->ID . '-headerbar',
				'description' 	=> 'Header Bar',
				'before_widget' => '<aside id="%1$s" class="hwa-wrap %2$s">',
				'after_widget' 	=> "</aside>",
				'before_title' 	=> '<h3 class="hwa-title">',
				'after_title' 	=> '</h3>',
				'handler'		=> 'headerbar'
			) );
		};
		if ( 'true' == $sidebar_a ){
			register_sidebar( array(
				'name' 			=> sprintf( __( '%1$s Sidebar', 'newsplus' ), $pp->post_title ),
				'id' 			=> $pp->ID . '-sidebar',
				'description' 	=> 'Sidebar',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget' 	=> "</aside>",
				'before_title' 	=> '<h3 class="sb-title">',
				'after_title' 	=> '</h3>',
				'handler'		=> 'sidebar'
			) );
		}
	} // foreach
}
add_action( 'widgets_init', 'newsplus_widgets_init' );

/**
 * Theme Comments
 */
if ( ! function_exists( 'newsplus_comments' ) ) :
	function newsplus_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'newsplus' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'newsplus' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
		break;
		default :
		// Proceed with normal comments.
		global $post;
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<article id="comment-<?php comment_ID(); ?>" class="comment">
				<header class="comment-meta comment-author vcard">
					<?php
						echo get_avatar( $comment, 48 );
						printf( '<cite class="fn">%1$s %2$s</cite>',
							get_comment_author_link(),
							// If current post author is also comment author, make it known visually.
							( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'newsplus' ) . '</span>' : ''
						);
						printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
							esc_url( get_comment_link( $comment->comment_ID ) ),
							get_comment_time( 'c' ),
							/* translators: 1: date, 2: time */
							sprintf( __( '%1$s at %2$s', 'newsplus' ), get_comment_date(), get_comment_time() )
						);
					?>
				</header><!-- .comment-meta -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'newsplus' ); ?></p>
				<?php endif; ?>

				<section class="comment-content comment">
					<?php comment_text(); ?>
					<?php edit_comment_link( __( 'Edit', 'newsplus' ), '<p class="edit-link">', '</p>' ); ?>
				</section><!-- .comment-content -->

				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'newsplus' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div><!-- .reply -->
			</article><!-- #comment-## -->
		<?php
        break;
	endswitch; // end comment_type check
}
endif;

/**
 * Post meta information
 */
if ( ! function_exists( 'newsplus_post_meta' ) ) :
	function newsplus_post_meta() {
		printf( __( '<span class="posted-on">Posted on </span><a href="%1$s" title="%2$s"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="by-author"> by </span><span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span><span class="posted-in"> in </span>%8$s ', 'newsplus' ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'newsplus' ), get_the_author() ) ),
			get_the_author(),
			get_the_category_list( ', ' )
		);
		if ( comments_open() ) : ?>
				<span class="with-comments"><?php _e( ' with ', 'newsplus' ); ?></span>
				<span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( '0 Comments', 'newsplus' ) . '</span>', __( '1 Comment', 'newsplus' ), __( '% Comments', 'newsplus' ) ); ?></span>
		<?php endif; // End if comments_open() ?>
		<?php edit_post_link( __( 'Edit', 'newsplus' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' );
	}
endif;

/**
 * Post meta information for smaller sections
 */
if ( ! function_exists( 'newsplus_small_meta' ) ) :
	function newsplus_small_meta() {
		printf( __( '<a href="%1$s" title="%2$s"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="sep"> |  </span>%5$s ', 'newsplus' ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			get_the_category_list( ', ' )
		);
		if ( comments_open() ) : ?>
				<span class="sep"><?php _e( ' | ', 'newsplus' ); ?></span>
				<span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( '0 Comments', 'newsplus' ) . '</span>', __( '1 Comment', 'newsplus' ), __( '% Comments', 'newsplus' ) ); ?></span>
		<?php endif; // End if comments_open()
	}
endif;

/**
 * Add body class to the theme depending upon options and templates
 */
function newsplus_body_class( $classes ) {
	global $pls_sb_pos, $pls_layout, $pls_enable_rtl_css;

	if ( ( 'left' == $pls_sb_pos || is_page_template( 'templates/page-sb-left.php' ) ) && ! ( is_page_template( 'templates/page-sb-right.php' ) || is_page_template( 'templates/page-full.php' )  ) ) {
		$classes[] = 'sidebar-left';
	}

	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'newsplus-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';

	if ( 'stretched' == $pls_layout ) {
		$classes[] = 'is-stretched';
	}

	if ( 'true' == $pls_enable_rtl_css || is_rtl() ) {
		$classes[] = 'rtl-enabled';
	}

	return $classes;
}
add_filter( 'body_class', 'newsplus_body_class' );

/**
 * next/previous navigation for pages and archives
 */
if ( ! function_exists( 'newsplus_content_nav' ) ) :
function newsplus_content_nav( $html_id ) {
	global $wp_query;
	$html_id = esc_attr( $html_id );
	if ( function_exists( 'wp_pagenavi' ) ) wp_pagenavi();
	else {
	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'newsplus' ) ); ?></div>
			<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'newsplus' ) ); ?></div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
	}
}
endif;

/**
 * Related Posts feature for Single Posts
 */
if ( ! function_exists( 'newsplus_related_posts' ) ) :
function newsplus_related_posts( $pls_rp_taxonomy, $pls_rp_style, $pls_rp_num ) {
	global $post;
	$temp = ( isset( $post ) ) ? $post : '';
	if ( 'tags' == $pls_rp_taxonomy )
	{
		$tags = wp_get_post_tags( $post->ID );
		if ( $tags ) {
			$tag_ids = array();
			foreach ( $tags as $individual_tag )
				$tag_ids[] = $individual_tag->term_id;
			$args = array(
				'tag__in' 				=> $tag_ids,
				'post__not_in' 			=> array( $post->ID ),
				'posts_per_page'		=> $pls_rp_num,
				'orderby' 				=> 'rand',
				'ignore_sticky_posts'	=> 1
			);
		} // if tags
	} // taxonomy tags
	else
	{
		$categories = get_the_category( $post->ID );
		if ( $categories ) {
			$category_ids = array();
			foreach( $categories as $individual_category )
				$category_ids[] = $individual_category->term_id;
				$args = array(
				'category__in' 			=> $category_ids,
				'post__not_in' 			=> array( $post->ID ),
				'posts_per_page'		=> $pls_rp_num,
				'orderby'				=> 'rand',
				'ignore_sticky_posts'	=> 1
			);
		} // if categories
	} // taxonomy categories
		$new_query = new WP_Query( $args );
		if( 'thumbnail' == $pls_rp_style )
			$list_class = 'thumb-style';
		else
			$list_class = 'plain-style';
		if ( $new_query->have_posts() ) : ?>
			<div class="related-posts clear">
                <h3><?php _e( 'Related Posts', 'newsplus' ); ?></h3>
                <ul class="<?php echo $list_class; ?> clear">
                <?php
                while( $new_query->have_posts() ) :
                    $new_query->the_post();
                    if ( has_post_thumbnail() ) {
                        $title = get_the_title();
                        $img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'related_posts_thumb' );
                        $img = $img_src[0];
                    }
                    else $img = ''; ?>
                    <li>
                    <?php if ( 'thumbnail' == $pls_rp_style ) {
						if ( '' !== $img ) { ?>
                            <a class="rp-thumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $img; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/></a>
						<?php } ?>
						<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
					<?php }
                    else { ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    <?php } ?>
                    </li>
                <?php endwhile; // while have posts ?>
                </ul>
            </div><!-- .related-posts -->
	<?php endif; // if have posts
	$post = $temp;
	wp_reset_query();
	wp_reset_postdata();
}
endif;

/**
 * Social Sharing feature on single posts
 */
if ( ! function_exists( 'ss_sharing' ) ) :
	function ss_sharing() {
	global $pls_ss_fb, $pls_ss_tw, $pls_ss_tw_usrname, $pls_ss_gp, $pls_ss_pint, $pls_ss_ln;
		$share_link = get_permalink();
		$share_title = get_the_title();
		$out = '';
		if ( 'true' == $pls_ss_fb ) {
			$out .= '<div class="fb-like" data-href="' . $share_link . '" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false" data-font="arial"></div>';
		}
		if ( 'true' == $pls_ss_tw ) {
			if( ! empty( $pls_ss_tw_usrname ) ) {
				$out .= '<div class="ss-sharing-btn"><a href="http://twitter.com/share" class="twitter-share-button" data-url="' . $share_link . '"  data-text="' . $share_title . '" data-via="' . $pls_ss_tw_usrname . '">Tweet</a></div>';
			}
			else {
				$out .= '<div class="ss-sharing-btn"><a href="http://twitter.com/share" class="twitter-share-button" data-url="' . $share_link . '"  data-text="' . $share_title . '">Tweet</a></div>';
			}
		}
		if ( 'true' == $pls_ss_gp ) {
			$out .= '<div class="ss-sharing-btn"><div class="g-plusone" data-size="medium" data-href="' . $share_link . '"></div></div>';
		}
		if ( 'true' == $pls_ss_pint ) {
			global $post;
			setup_postdata( $post );
			if ( has_post_thumbnail( $post->ID ) ) {
				$src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '', '' );
				$image = $src[0];
			}
			else
				$image = '';
			$description = 'Next%20stop%3A%20Pinterest';
			$share_link = get_permalink();
			$out .= '<div class="ss-sharing-btn"><a data-pin-config="beside" href="//pinterest.com/pin/create/button/?url=' . $share_link . '&amp;media=' . $image . '&amp;description=' . $description . '" data-pin-do="buttonPin" ><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" alt="PinIt" /></a></div>';
			wp_reset_postdata();
		}
		if ( 'true' == $pls_ss_ln ) {
			$out .= '<div class="ss-sharing-btn"><script type="IN/Share" data-url="' . $share_link . '" data-counter="right"></script></div>';
		}
		echo $out;
	}
endif;

/**
 * Load FaceBook script in footer
 */
function ss_fb_script() {
	global $pls_ss_sharing, $pls_ss_fb;
	if ( is_single() && ( 'true' == $pls_ss_sharing ) && ( 'true' == $pls_ss_fb ) ) { ?>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
	fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
<?php }
}
add_action( 'wp_footer', 'ss_fb_script' );

/**
 * Add FaceBook Open Graph Meta Tags on single post
 */
function add_facebook_open_graph_tags() {
	global $pls_ss_sharing, $pls_ss_fb;
	if ( is_single() && ( 'true' == $pls_ss_sharing ) && ( 'true' == $pls_ss_fb ) ) {
		global $post;
		setup_postdata( $post );
		if ( has_post_thumbnail( $post->ID ) ) {
			$src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '', '' );
			$image = $src[0];
		}
		else
			$image = '';
		?>
		<meta property="og:title" content="<?php the_title(); ?>"/>
		<meta property="og:type" content="article"/>
		<meta property="og:image" content="<?php echo $image; ?>"/>
		<meta property="og:url" content="<?php the_permalink(); ?>"/>
		<meta property="og:description" content="<?php echo short( get_the_excerpt(), 140 ); ?>"/>
		<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>"/>
		<?php wp_reset_postdata();
	}
}
add_action( 'wp_head', 'add_facebook_open_graph_tags', 99 );

/**
 * Add FaceBook OG xmlns in html tag
 */
function add_og_xml_ns( $out ) {
	global $pls_ss_sharing, $pls_ss_fb;
	if ( is_single() && ( 'true' == $pls_ss_sharing ) && ( 'true' == $pls_ss_fb ) ) {
		return $out . ' xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml"';
	}
	else
		return $out;
}
add_filter( 'language_attributes', 'add_og_xml_ns' );

/**
 * Add arrow class to menu items with sub menus
 */
class Arrow_Walker_Nav_Menu extends Walker_Nav_Menu {
    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        $id_field = $this->db_fields['id'];
        if ( ! empty( $children_elements[ $element->$id_field ] ) ) {
            $element->classes[] = 'arrow';
        }
        Walker_Nav_Menu::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
}

/**
 * Menu notifier when navigation menus are not configured
 */
if ( ! function_exists( 'menu_reminder' ) ) :
	function menu_reminder() {
		_e( '<span class="menu-notifier">Set navigation menu inside WordPress Appearance > Menus</span>', 'newsplus' );
	}
endif;

/**
 * Enable short codes inside Widgets
 */
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');

/**
 * Allow HTML in category and term descriptions
 */
foreach ( array( 'pre_term_description' ) as $filter ) {
    remove_filter( $filter, 'wp_filter_kses' );
}
foreach ( array( 'term_description' ) as $filter ) {
    remove_filter( $filter, 'wp_kses_data' );
}

/**
 * Add span tag to post count of categories and archives widget
 */
function cats_widget_postcount_filter( $out ) {
	$out = str_replace( ' (', '<span class="count">(', $out );
	$out = str_replace( ')', ')</span>', $out );
	return $out;
}
add_filter( 'wp_list_categories', 'cats_widget_postcount_filter' );

function archives_widget_postcount_filter( $out ) {
	$out = str_replace( '&nbsp;(', '<span class="count">(', $out );
	$out = str_replace( ')', ')</span>', $out );
	return $out;
}
add_filter('get_archives_link', 'archives_widget_postcount_filter');

/**
 * Assign appropriate heading tag for blog name (SEO improvement)
 */
if ( ! function_exists( 'site_header_tag' ) ) :
	function site_header_tag( $tag_type ) {
		if ( is_front_page() ) {
			$open_tag = '<h1 class="site-title">';
			$close_tag = '</h1>';
		}
		elseif ( is_archive() || is_page_template( 'templates/archive-2col.php' ) || is_page_template( 'templates/archive-3col.php' ) || is_page_template( 'templates/archive-4col.php' ) || is_page_template( 'templates/blog-classic.php' ) || is_page_template( 'templates/blog-list.php' ) || is_page_template( 'templates/blog-grid.php' ) ) {
			$open_tag = '<h3 class="site-title">';
			$close_tag = '</h3>';
		}
		else {
			$open_tag = '<h4 class="site-title">';
			$close_tag = '</h4>';
		}
		if ( 'open' == $tag_type )
			echo $open_tag;
		if ( 'close' == $tag_type )
			echo $close_tag;
	}
endif;

/**
 * Funtion to shorten any text
 */
if ( ! function_exists( 'short' ) ) :
	function short( $text, $limit )
	{
		$chars_limit = $limit;
		$chars_text = strlen( $text );
		$text = strip_tags( $text );
		$text = $text . '';
		$text = substr( $text, 0, $chars_limit );
		$text = substr( $text, 0, strrpos( $text, ' ' ) );
		if ( $chars_text > $chars_limit )
		{
			$text = $text . " &hellip;";
		}
		return $text;
	}
endif;

/**
 * Highlight search result titles and excerpt
 */
if ( ! function_exists( 'highlight_search_title' ) ) :
	function highlight_search_title() {
		$title = get_the_title();
		$keys = implode( '|', explode(' ', get_search_query() ) );
		$keys = preg_quote( $keys );
		$title = preg_replace( '/(' . $keys . ')/iu', '<ins>\0</ins>', $title );
		echo $title;
	}
endif;

if ( ! function_exists( 'highlight_search_excerpt' ) ) :
	function highlight_search_excerpt() {
		$excerpt = get_the_excerpt();
		$keys = implode( '|', explode( ' ', get_search_query() ) );
		$keys = preg_quote( $keys );
		$excerpt = preg_replace( '/(' . $keys . ')/iu', '<ins>\0</ins>', $excerpt );
		echo '<p>' . $excerpt . '</p>';
	}
endif;

/**
 * Remove invalid rel attribute on category lists
 */

add_filter( 'wp_list_categories', 'remove_invalid_rel' );
add_filter( 'the_category', 'remove_invalid_rel' );
function remove_invalid_rel( $output ) {
    return str_replace( 'rel="category tag"', 'rel="tag"', $output );
}
?>