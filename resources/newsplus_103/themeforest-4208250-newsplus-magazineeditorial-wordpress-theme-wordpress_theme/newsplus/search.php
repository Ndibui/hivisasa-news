<?php
/**
 * The template for displaying Search Results pages.
 */
get_header(); ?>
<div id="primary" class="site-content">
    <div id="content" role="main">
		<?php show_breadcrumbs();
        if ( ! have_posts() ) : ?>
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
        while ( have_posts() ) :
			the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'clear' ); ?>>
			<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php highlight_search_title(); ?></a></h3>
			<?php highlight_search_excerpt(); ?>
			</article><!-- #post-<?php the_ID(); ?> -->
        <?php endwhile; // End the loop
        newsplus_content_nav( 'nav-below' ); ?>
    </div><!-- #content -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>