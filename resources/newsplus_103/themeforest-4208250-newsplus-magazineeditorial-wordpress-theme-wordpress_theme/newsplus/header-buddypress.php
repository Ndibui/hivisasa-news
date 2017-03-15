<?php
/**
 * header.php for buddyPress plugin
 */

/**
 * Fetch theme options variables required in this template
 */
global $pls_disable_resp_css, $pls_top_bar_hide, $pls_cb_item_left, $pls_cb_item_right, $pls_cb_text_left, $pls_cb_text_right, $pls_scheme, $pls_logo_align, $pls_logo_check, $pls_custom_title, $pls_logo;
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php if ( 'true' != $pls_disable_resp_css ) : ?>
<meta name="viewport" content="width=device-width" />
<?php endif; ?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site clear">
<?php if ( 'true' != $pls_top_bar_hide ) : ?>
    <div id="utility-top">
        <div class="wrap clear">
			<?php if ( 'menu' == $pls_cb_item_left ) : ?>
            <nav id="optional-nav" class="secondary-nav">
                <?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_class' => 'sec-menu clear', 'container' => false ) ); ?>
            </nav><!-- #optional-nav -->
            <?php else : ?>
            <div id="callout-bar" class="callout-left" role="complementary">
                <div class="callout-inner">
                <?php echo stripslashes( $pls_cb_text_left ); ?>
                </div><!-- .callout-inner -->
            </div><!-- #callout-bar -->
            <?php endif;
			if ( 'searchform' == $pls_cb_item_right ) : ?>
            <div id="search-bar" role="complementary">
                <?php get_search_form(); ?>
            </div><!-- #search-bar -->
            <?php else : ?>
            <div id="callout-bar" role="complementary">
                <div class="callout-inner">
                <?php echo stripslashes( $pls_cb_text_right ); ?>
                </div><!-- .callout-inner -->
            </div><!-- #callout-bar -->
            <?php endif; ?>
        </div><!-- #utility-top .wrap -->
    </div><!-- #utility-top-->
<?php endif; ?>
        <header id="header" class="site-header" role="banner">
            <div class="wrap clear">
                <div class="brand<?php if ( 'right' == $pls_logo_align ) echo( ' right' ); ?>" role="banner">
					<?php
                    if ( 'true' != $pls_logo_check ) :
						site_header_tag( 'open' ); ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php if ( '' != $pls_custom_title ) echo $pls_custom_title; else bloginfo( 'name' ); ?></a><span class="site-description"><?php bloginfo( 'description' ); ?></span><?php site_header_tag( 'close' );
					else :
						site_header_tag( 'open' ); ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php if ( '' != $pls_logo ) echo $pls_logo; else { echo get_template_directory_uri() . '/images/logo.png' ; } ?>" alt="<?php bloginfo( 'name' ); ?>" title="<?php bloginfo( 'name' ); ?>" /></a>
						<?php site_header_tag( 'close' );
                    endif; ?>
                </div><!-- .brand -->
                <?php get_template_part( 'includes/header-widget-area' ); ?>
            </div><!-- #header .wrap -->
        </header><!-- #header -->
		<nav id="main-nav" class="primary-nav" role="navigation">
            <div class="wrap">
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu clear', 'container' => false, 'walker' => new Arrow_Walker_Nav_Menu ) ); ?>
            </div><!-- .primary-nav .wrap -->
		</nav><!-- #main-nav -->
        <div id="main" class="buddyPress">
        <div class="wrap clear">