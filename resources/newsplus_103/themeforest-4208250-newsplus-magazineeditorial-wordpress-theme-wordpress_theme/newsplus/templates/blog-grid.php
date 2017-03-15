<?php
/**
 * Template Name: Blog - Grid Style
 *
 * Description: A two columnar grid style Blog template.
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
		if ( $wp_query->have_posts() ) : ?>
            <div class="clear">
            <?php
            $count = 1;
            $fclass = '';
            $lclass = '';
            while ( $wp_query->have_posts() ) :
				$wp_query->the_post();
				$fclass = ( 0 == ( ( $count - 1 ) % 2 ) ) ? ' first-grid' : '';
				$lclass = ( 0 == ( $count % 2 ) ) ? ' last-grid' : ''; ?>
				<article id="post-<?php the_ID();?>" <?php post_class( 'entry-grid '. $fclass.$lclass ); ?>>
				<?php get_template_part( 'formats/format', get_post_format() ); ?>
				<div class="entry-content">
                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    <p class="post-excerpt"><?php echo short( get_the_excerpt(), 160 ); ?></p>
                    <?php if( 'true' != $pls_hide_post_meta ) { ?>
                    <aside id="meta-<?php the_ID();?>" class="entry-meta"><?php newsplus_small_meta(); ?></aside>
                    <?php } ?>
				</div><!-- .entry-content -->
				</article><!-- #post-<?php the_ID();?> -->
				<?php $count++;
            endwhile; ?>
            </div><!-- .clear -->
		<?php
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
		<?php endif; // if have posts
		$wp_query = $temp;  // reset back to original query
    endif;  // if category ?>
    </div><!-- #content -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>