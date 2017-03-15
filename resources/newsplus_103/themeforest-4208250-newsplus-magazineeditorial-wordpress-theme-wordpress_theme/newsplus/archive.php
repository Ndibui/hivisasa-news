<?php
/**
 * The template for displaying Archive pages.
 */

global $pls_archive_template;
get_header(); ?>
<div id="primary" class="site-content">
    <div id="content" role="main">
		<?php show_breadcrumbs();
        if ( have_posts() )
			the_post();
		if ( is_category() ) { ?>
		<h1 class="section-title"><?php printf( __( 'Archive by category %s', 'newsplus' ), single_cat_title( '', false ) ); ?></h1>
		<?php echo category_description();
        }
		elseif ( is_day() ) { ?>
		<h1 class="section-title"><?php printf( __( 'Archive by day %s', 'newsplus' ), get_the_time( 'F j, Y' ) ); ?></h1>
		<?php }
		elseif ( is_month() ) { ?>
		<h1 class="section-title"><?php printf( __( 'Archive by month %s', 'newsplus' ), get_the_time( 'F' ) ); ?></h1>
		<?php }
		elseif ( is_year() ) { ?>
		<h1 class="section-title"><?php printf( __( 'Archive by year %s', 'newsplus' ), get_the_time( 'Y' ) ); ?></h1>
		<?php }
        if ( is_author() ) :
			if ( get_the_author_meta( 'description' ) ) : ?>
			<div class="author-info">
				<div class="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), 64 ); ?>
				</div><!-- .author-avatar -->
				<div class="author-description">
					<h1 class="author vcard"><?php printf( __( 'About <span class="fn">%s</span>', 'newsplus' ), get_the_author() ); ?></h1>
					<p><?php the_author_meta( 'description' ); ?></p>
				</div><!-- .author-description -->
			</div><!-- .author-info -->
			<?php endif; // has description
        endif; // is author
        rewind_posts();
        if ( 'list-style' == $pls_archive_template )
			get_template_part( 'content-list' );
        elseif ( 'grid-style' == $pls_archive_template )
			get_template_part( 'content-grid' );
        else
			get_template_part( 'content-classic' ); ?>
    </div><!-- #content -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>