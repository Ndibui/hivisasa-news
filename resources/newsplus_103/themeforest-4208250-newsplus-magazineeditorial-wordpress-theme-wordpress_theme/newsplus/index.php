<?php
/**
 * The main template file.
 */

global $pls_archive_template;
get_header(); ?>
<div id="primary" class="site-content">
    <div id="content" role="main">
		<?php show_breadcrumbs();
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