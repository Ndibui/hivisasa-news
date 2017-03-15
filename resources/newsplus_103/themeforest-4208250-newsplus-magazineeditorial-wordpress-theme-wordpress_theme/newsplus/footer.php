<?php
/**
 * The template for displaying footer.
 *
 * Contains secondary widget areas, footer content and the closing of the
 * #main and #page div elements.
 */

global $pls_hide_secondary, $pls_footer_left, $pls_footer_right, $post; ?>
    </div><!-- #main .wrap -->
</div><!-- #main -->
<?php
/* Check if the secondary widget areas are active */
if ( is_active_sidebar( 'secondary-column-1' ) || is_active_sidebar( 'secondary-column-2' ) || is_active_sidebar( 'secondary-column-3' ) || is_active_sidebar( 'secondary-column-4' ) ) :

	/* Check if the user has opted to hide widget area */
	if ( is_page() ) {
		$page_opts = get_post_meta( $posts[0]->ID, 'page_options', true );
		$hide_secondary = isset( $page_opts[ 'hide_secondary' ] ) ? $page_opts[ 'hide_secondary' ] : '';
	} // is page
	elseif ( is_single() ) {
		$post_opts = get_post_meta( $posts[0]->ID, 'post_options', true );
		$hide_secondary = isset( $post_opts[ 'hide_secondary' ] ) ? $post_opts[ 'hide_secondary' ] : '';
	} // is single
	else {
		$hide_secondary = $pls_hide_secondary;
	}
	if ( 'true' != $hide_secondary ) : ?>
        <div id="secondary" role="complementary">
            <div class="wrap clear">
                <div class="column one-fourth">
					<?php
                    if ( is_active_sidebar( 'secondary-column-1' ) )
						dynamic_sidebar( 'secondary-column-1' );
                    ?>
                </div><!-- .column one-fourth -->
                <div class="column one-fourth">
					<?php
                    if ( is_active_sidebar( 'secondary-column-2' ) )
						dynamic_sidebar( 'secondary-column-2' );
                    ?>
                </div><!-- .column one-fourth -->
                <div class="column one-fourth">
					<?php
                    if ( is_active_sidebar( 'secondary-column-3' ) )
						dynamic_sidebar( 'secondary-column-3' );
                    ?>
                </div><!-- .column one-fourth -->
                <div class="column one-fourth last">
					<?php
                    if ( is_active_sidebar( 'secondary-column-4' ) )
						dynamic_sidebar( 'secondary-column-4' );
                    ?>
                </div><!-- .column one-fourth .last -->
            </div><!-- #secondary .wrap -->
        </div><!-- #secondary -->
	<?php endif; // hide secondary
endif; // if widget areas are active ?>
<footer id="footer" role="contentinfo">
    <div class="wrap clear">
        <div class="notes-left"><?php echo stripslashes( $pls_footer_left ); ?></div><!-- .notes-left -->
        <div class="notes-right"><?php echo stripslashes( $pls_footer_right ); ?></div><!-- .notes-right -->
    </div><!-- #footer wrap -->
</footer><!-- #footer -->
</div> <!-- #page -->
<div class="scroll-to-top"><a href="#" title="<?php _e( 'Scroll to top', 'newsplus' ); ?>"></a></div><!-- .scroll-to-top -->
<?php wp_footer(); ?>
</body>
</html>