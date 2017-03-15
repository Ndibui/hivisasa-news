<?php
/**
 * The template for displaying 404 pages (Not Found).
 */

get_header(); ?>
<div id="primary" class="site-content">
    <div id="content" role="main">
		<?php show_breadcrumbs(); ?>
        <article id="post-0" class="post error404 no-results not-found">
            <header class="entry-header">
                <h1 class="entry-title"><?php _e( 'Nothing found!', 'newsplus' ); ?></h1>
            </header>
            <div class="entry-content">
                <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'newsplus' ); ?></p>
                <?php get_search_form(); ?>
            </div><!-- .entry-content -->
        </article><!-- #post-0 -->
    </div><!-- #content -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>