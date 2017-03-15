<?php
/* Header widget area
 * Required inside header.php file
 */

global $pls_logo_align, $post;
if ( is_page() ) {
	$page_opts = get_post_meta( $posts[0]->ID, 'page_options', true );
	$hwa_usage = isset( $page_opts['hwa_usage'] ) ? $page_opts['hwa_usage'] : 'default-headerbar';
}
elseif ( is_single() ) {
	$post_opts = get_post_meta( $posts[0]->ID, 'post_options', true );
	$hwa_usage = isset( $post_opts['hwa_usage'] ) ? $post_opts['hwa_usage'] : 'default-headerbar';
}
if ( is_page() || is_single() ) {
	if ( is_active_sidebar( $hwa_usage )) : ?>
        <div class="header-widget-area<?php if ( 'right' == $pls_logo_align ) echo( ' left' );?>">
        <?php dynamic_sidebar( $hwa_usage ); ?>
        </div><!-- .header-widget-area -->
	<?php endif;
}
else
{
	if ( is_active_sidebar( 'default-headerbar' ) ) : ?>
        <div class="header-widget-area<?php if ( 'right' == $pls_logo_align ) echo( ' left' );?>">
		<?php dynamic_sidebar( 'default-headerbar' ); ?>
        </div><!-- .header-widget-area -->
	<?php endif;
} ?>