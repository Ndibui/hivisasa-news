<?php
/**
 * Template Name: Blog - List Style
 *
 * Description: A list style blog template with left aligned thumbnails.
 */
global $pls_hide_post_meta;
get_header(); ?>
<div id="primary" class="site-content">
    <div id="content" role="main">
    <?php show_breadcrumbs();
    if ( is_page() ) :
		$page_opts 		= get_post_meta( $posts[0]->ID, 'page_options', true );
		$category 		= empty( $page_opts['category'] ) ? '-1' : $page_opts['category'];
		$post_per_page 	= empty( $page_opts['post_per_page'] ) ? '9' : $page_opts['post_per_page'];
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				the_content();
			endwhile;
		endif; // have posts
    endif; // is page
    if ( $category ) :
		if ( get_query_var( 'paged' ) )
			$paged = get_query_var( 'paged' );
		elseif ( get_query_var( 'page' ) )
			$paged = get_query_var( 'page' );
		else
			$paged = 1;
		$args = array(
			'cat' 					=> $category,
			'orderby' 				=> 'date',
			'order' 				=> 'desc',
			'paged' 				=> $paged,
			'posts_per_page' 		=> $post_per_page,
			'ignore_sticky_posts' 	=> 1
		);
		$temp = $wp_query;  // assign orginal query to temp variable for later use
		$wp_query = new WP_Query( $args );
		if ( $wp_query->have_posts() ) :
			while ( $wp_query->have_posts() ) :
				$wp_query->the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-list clear' ); ?>>
					<?php get_template_part( 'formats/list-format', get_post_format() ); ?>
                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    <?php echo ( '<p class="post-excerpt">' . get_the_excerpt() . '</p>' );
                    if( 'true' != $pls_hide_post_meta ) { ?>
                    <aside id="meta-<?php the_ID(); ?>" class="entry-meta list"><?php newsplus_small_meta(); ?><span class="sep"> | </span><a href="<?php the_permalink(); ?>" title="<?php _e( 'Read full post', 'newsplus'); ?>"><?php _e( 'Read More', 'newsplus' ); ?></a></aside>
                    <?php } // Globally hide post meta ?>
                    </div><!-- .entry-list-right -->
                </article><!-- #post-<?php the_ID(); ?> -->
			<?php endwhile; // End the loop
			newsplus_content_nav( 'nav-below' );
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
        <?php endif;
		$wp_query = $temp;  //reset back to original query
    endif;  // if category ?>
    </div><!-- #content -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>