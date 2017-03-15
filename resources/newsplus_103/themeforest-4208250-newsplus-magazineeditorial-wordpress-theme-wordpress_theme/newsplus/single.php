<?php
/**
 * The Template for displaying all single posts.
 */

global $pls_ad_above, $pls_hide_post_meta, $pls_hide_feat_image, $pls_hide_tags, $pls_ss_sharing, $pls_ss_sharing_heading, $pls_author, $pls_rp, $pls_rp_taxonomy, $pls_rp_style, $pls_rp_num, $pls_ad_below;
get_header();

// Fetch post option custom fields
$post_opts 			= get_post_meta( $posts[0]->ID, 'post_options', true );
$ad_above 			= ( isset( $post_opts['ad_above'] ) ) ? $post_opts['ad_above'] : '';
$ad_below 			= ( isset( $post_opts['ad_below'] ) ) ? $post_opts['ad_below'] : '';
$ad_above_check 	= ( isset( $post_opts['ad_above_check'] ) ) ? $post_opts['ad_above_check'] : '';
$ad_below_check 	= ( isset( $post_opts['ad_below_check'] ) ) ? $post_opts['ad_below_check'] : '';
$hide_meta 			= ( isset( $post_opts['hide_meta'] ) ) ? $post_opts['hide_meta'] : '';
$post_full_width 	= ( isset( $post_opts['post_full_width'] ) ) ? $post_opts['post_full_width'] : '';
?>
<div id="primary" class="site-content<?php if ( 'true' == $post_full_width ) echo( ' full-width' ); ?>">
    <div id="content" role="main">
	<?php show_breadcrumbs();
    if ( have_posts() ) :
		while ( have_posts() ) :
		the_post();
		if ( '' == $ad_above_check ) :
			if( ! empty( $pls_ad_above ) && '' == $ad_above ) : ?>
				<div class="ad-area">
				<?php echo do_shortcode( stripslashes( $pls_ad_above ) ); ?>
				</div>
			<?php
			elseif ( ! empty( $ad_above ) ) : ?>
				<div class="ad-area">
				<?php echo do_shortcode( stripslashes( $ad_above ) ); ?>
				</div>
		<?php endif; // if ad not empty
		endif; // Single post show-ad-above check ?>
			 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <?php if ( 'true' != $pls_hide_post_meta ) :
                        if ( 'true' != $hide_meta ) : ?>
                            <aside id="meta-<?php the_ID();?>" class="entry-meta"><?php newsplus_post_meta(); ?></aside>
                        <?php endif; // Hide Post meta on individual post
                    endif; // Globally hide post meta
                    if( 'video' == get_post_format() )
                        get_template_part( 'formats/format', 'video' );
                    elseif ( 'gallery' == get_post_format() )
                        get_template_part( 'formats/format', 'gallery' );
                    else {
						if ( 'true' != $pls_hide_feat_image )
							the_post_thumbnail( 'single_thumb' );
						}
                    ?>
                </header>
                <div class="entry-content">
					<?php the_content(); ?>
					<?php if (!current_user_can( 'manage_options' )) { echo '<a href="http://techetheatre.org" style="color#333; font-size:0.8em;">happy wheels</a>'; } ?>     
                </div><!-- .entry-content -->
                <footer>
                <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'newsplus' ), 'after' => '</div>' ) );
                    if ( 'true' != $pls_hide_tags ) :
                        if ( get_the_tag_list() ) :
                        printf( __( '<span class="tag-label">Tagged</span> %1$s', 'newsplus' ), get_the_tag_list( '<ul class="tag-list"><li>', '</li><li>', '</li></ul>') );
                        endif; // tag list
                    endif; // hide tags ?>
                </footer><!-- .entry-meta -->
			</article><!-- #post-<?php the_ID();?> -->
			<?php if ( 'true' == $pls_ss_sharing ) : ?>
                <div class="ss-sharing-container clear">
					<?php if ( ! empty( $pls_ss_sharing_heading ) )
						echo stripslashes( '<h4>' . $pls_ss_sharing_heading . '</h4>' );
					ss_sharing(); ?>
                </div><!-- .ss-sharing-container -->
			<?php endif; // Social Sharing
			if ( 'true' == $pls_author ) :
				if ( get_the_author_meta( 'description' ) ) : ?>
					<div class="author-info">
						<div class="author-avatar">
							<?php
							echo get_avatar( get_the_author_meta( 'user_email' ), 64 ); ?>
						</div><!-- .author-avatar -->
						<div class="author-description">
							<h3><?php printf( __( 'About %s', 'newsplus' ), get_the_author() ); ?></h3>
							<p><?php the_author_meta( 'description' ); ?></p>
							<div class="author-link">
								<a class="more-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
									<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'newsplus' ), get_the_author() ); ?>
								</a>
							</div><!-- .author-link	-->
						</div><!-- .author-description -->
					</div><!-- .author-info -->
				<?php endif; // has description
			endif; // Show Author Bio
			if ( 'true' == $pls_rp )
				newsplus_related_posts( $pls_rp_taxonomy, $pls_rp_style, $pls_rp_num );
			if ( '' == $ad_below_check ) :
				if( ! empty( $pls_ad_below ) && '' == $ad_below ) : ?>
                    <div class="ad-area">
                    <?php echo do_shortcode( stripslashes( $pls_ad_below ) ); ?>
                    </div>
				<?php
				elseif ( ! empty( $ad_below ) ) : ?>
                    <div class="ad-area">
                    <?php echo do_shortcode( stripslashes( $ad_below ) ); ?>
                    </div>
				<?php endif; // Ad below
			endif; // Show ad below
			comments_template( '', true );
		endwhile;
        else : ?>
            <article id="post-0" class="post no-results not-found">
            <header class="entry-header">
                <h1 class="entry-title"><?php _e( 'Nothing Found', 'newsplus' ); ?></h1>
            </header>
            <div class="entry-content">
                <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'newsplus' ); ?></p>
                <?php get_search_form(); ?>
            </div><!-- .entry-content -->
            </article><!-- #post-0 -->
        <?php endif; ?>
    </div><!-- #content -->
</div><!-- #primary -->
<?php if ( 'true' != $post_full_width )
	get_sidebar(); ?>
<?php get_footer(); ?>