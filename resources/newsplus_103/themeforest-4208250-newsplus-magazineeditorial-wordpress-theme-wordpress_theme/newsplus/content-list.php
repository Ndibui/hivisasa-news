<?php
/**
 * Content Loop for archives - List Style.
 */

global $pls_hide_post_meta;
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
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-list clear' ); ?>>
		<?php get_template_part( 'formats/list-format', get_post_format() ); ?>
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        <?php echo ( '<p class="post-excerpt">' . get_the_excerpt() . '</p>' );
        if( 'true' != $pls_hide_post_meta ) { ?>
            <aside id="meta-<?php the_ID(); ?>" class="entry-meta list"><?php newsplus_small_meta(); ?><span class="sep"> | </span><a href="<?php the_permalink(); ?>" title="<?php _e( 'Read full post', 'newsplus'); ?>"><?php _e( 'Read More', 'newsplus' ); ?></a></aside>
        <?php } // Hide post meta ?>
        </div><!-- .entry-list-right -->
    </article><!-- #post-<?php the_ID(); ?> -->
<?php endwhile; // End the loop
newsplus_content_nav( 'nav-below' ); ?>