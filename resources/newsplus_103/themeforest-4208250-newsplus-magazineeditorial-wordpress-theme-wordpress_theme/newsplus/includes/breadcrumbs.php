<?php
/* Theme Breadcrumbs
 * Logic by http://dimox.net
 */

if ( ! function_exists( 'ss_breadcrumbs' ) ) :
	function ss_breadcrumbs() {
		$delimiter	= '<span class="sep"> / </span>';
		$home 		= __( 'Home', 'newsplus' );
		$before 	= '<span class="current">';
		$after 		= '</span>';
		if ( ! is_home() && ! is_front_page() || is_paged() ) {
			echo '<div class="breadcrumbs">';
			global $post;
			$homeLink = home_url();
			echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
			if ( is_category() ) {
				global $wp_query;
				$cat_obj	= $wp_query->get_queried_object();
				$thisCat 	= $cat_obj->term_id;
				$thisCat 	= get_category($thisCat);
				$parentCat 	= get_category($thisCat->parent);
				if ( $thisCat->parent != 0 )
					echo( get_category_parents( $parentCat, TRUE, ' ' . $delimiter . ' ' ) );
				printf( __( '%1$sArchive by category <strong>%2$s</strong>%3$s', 'newsplus' ), $before, single_cat_title( '', false ), $after );
			}
			elseif ( is_day() ) {
				echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a> ' . $delimiter . ' ';
				echo '<a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time( 'F' ) . '</a> ' . $delimiter . ' ';
				echo $before . get_the_time( 'd' ) . $after;
			}
			elseif ( is_month() ) {
				echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a> ' . $delimiter . ' ';
				echo $before . get_the_time( 'F' ) . $after;
			}
			elseif ( is_year() ) {
				echo $before . get_the_time( 'Y' ) . $after;
			}
			elseif ( is_single() && ! is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					$post_type = get_post_type_object( get_post_type() );
					$slug = $post_type->rewrite;
					echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
					echo $before . get_the_title() . $after;
				}
				else {
					$cat = get_the_category(); $cat = $cat[0];
					echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
					echo $before . get_the_title() . $after;
				}
			}
			elseif ( ! is_single() && ! is_page() && get_post_type() != 'post' && ! is_404() && ! is_search() ) {
				$post_type = get_post_type_object( get_post_type() );
				echo $before . $post_type->labels->singular_name . $after;
			}
			elseif ( is_attachment() ) {
				$parent = get_post( $post->post_parent );
				$cat = get_the_category( $parent->ID );
				if ( $cat ) {
					$cat = $cat[0];
					echo get_category_parents( $cat, TRUE, ' ' . $delimiter . ' ' );
				}
				echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
				echo $before . get_the_title() . $after;
			}
			elseif ( is_page() && ! $post->post_parent ) {
				echo $before . get_the_title() . $after;
			}
			elseif ( is_page() && $post->post_parent ) {
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while ( $parent_id ) {
					$page = get_page( $parent_id );
					$breadcrumbs[] = '<a href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a>';
					$parent_id  = $page->post_parent;
				}
				$breadcrumbs = array_reverse( $breadcrumbs );
				foreach ( $breadcrumbs as $crumb )
					echo $crumb . ' ' . $delimiter . ' ';
				echo $before . get_the_title() . $after;
			}
			elseif ( is_search() ) {
				printf( __( '%1$sSearch results for <strong>%2$s</strong>%3$s', 'newsplus' ), $before, get_search_query(), $after );
			}
			elseif ( is_tag() ) {
				printf( __( '%1$sPosts tagged <strong>%2$s</strong>%3$s', 'newsplus' ), $before, single_tag_title( '', false ), $after );
			}
			elseif ( is_author() ) {
				global $author;
				$userdata = get_userdata( $author );
				printf( __( '%1$sArticles posted by <strong>%2$s</strong>%3$s', 'newsplus' ), $before, $userdata->display_name, $after );
			}
			elseif ( is_404() ) {
				printf( __( '%1$sError 404%2$s', 'newsplus' ), $before, $after );
			}
			if ( get_query_var( 'paged' ) ) {
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
					echo __( 'Page', 'newsplus' ) . ' ' . get_query_var( 'paged' );
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
			}
			echo '</div>';
		}
	} // end ss_breadcrumbs()
endif;

/* Function to show breadcrumbs as required */
if ( ! function_exists( 'show_breadcrumbs' ) ) :
	function show_breadcrumbs() {
		global $post, $pls_hide_crumbs;
		if ( ! is_home() && ! is_front_page() ) {
			if ( is_page() ) {
				$page_opts = get_post_meta( $post->ID, 'page_options', true );
				$hide_crumbs = isset( $page_opts['hide_crumbs'] ) ? $page_opts['hide_crumbs'] : '';
				if ( 'true' != $hide_crumbs ) { // If not opted to hide breadcrumbs
					if ( 'true' != $pls_hide_crumbs ) {
						ss_breadcrumbs();
					}
				} // Hide breadcrumbs
				elseif ( ! isset( $page_opts ) ) {
					if ( 'true' != $pls_hide_crumbs ) {
						ss_breadcrumbs();
					}
				} // Default Fallback when no options are set
			} // is_page
			else {
				if ( 'true' != $pls_hide_crumbs ) {
					ss_breadcrumbs();
				}
			}
		}
	}
endif; ?>