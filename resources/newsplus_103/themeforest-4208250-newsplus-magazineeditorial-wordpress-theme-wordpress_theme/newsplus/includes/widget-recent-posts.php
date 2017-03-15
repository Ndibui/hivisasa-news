<?php
/**
 * Recent posts widget
 * Display most recent posts from specified categories.
 */

class NewsPlus_Recent_Posts extends WP_Widget {
	function NewsPlus_Recent_Posts() {
		$widget_ops = array(
			'classname'		=> 'newsplus_recent_posts',
			'description'	=> __( 'List recent posts with thumbnails from custom categories.', 'newsplus' )
		);
		$this->WP_Widget( 'newsplus-recent-posts', __( 'NewsPlus Recent Posts', 'newsplus' ), $widget_ops );
		$this->alt_option_name = 'newsplus_recent_entries';
		add_action( 'save_post', array( &$this, 'flush_widget_cache' ) );
		add_action( 'deleted_post', array( &$this, 'flush_widget_cache' ) );
		add_action( 'switch_theme', array( &$this, 'flush_widget_cache' ) );
	}

	function widget( $args, $instance ) {
		$cache = wp_cache_get( 'widget_recent_posts', 'widget' );
		$hide_thumb= isset( $instance['hide_thumb'] ) ? $instance['hide_thumb'] : false;
		if ( ! is_array( $cache ) )
			$cache = array();
		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}
		ob_start();
		extract( $args );
		$cats = empty( $instance['cats'] ) ? '-1' : $instance['cats'];
		$offset = empty( $instance['offset'] ) ? '0' : $instance['offset'];
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Recent Posts', 'newsplus' ) : $instance['title'] );
		if ( ! $number = (int) $instance['number'] )
			$number = 10;
		elseif ( $number < 1 )
			$number = 1;
		elseif ( $number > 15 )
			$number = 15;
		$r = new WP_Query(
			array(
				'posts_per_page'		=> $number,
				'post_status'			=> 'publish',
				'ignore_sticky_posts'	=> 1,
				'cat'					=> $cats,
				'offset'				=> $offset
			)
		);
		if ( $r->have_posts() ) :
			$output = '';
			echo $before_widget;
            if ( $title )
				echo $before_title . $title . $after_title; ?>
            <ul class="post-list">
			<?php while ( $r->have_posts() ) :
					$r->the_post();
					$time = get_the_time( get_option( 'date_format' ) );
					$permalink = get_permalink();
					$title = get_the_title();
					$num_comments = get_comments_number();
					if ( comments_open() ) {
						if ( $num_comments == 0 ) {
							$comments = __( '0 Comments', 'newsplus' );
						} elseif ( $num_comments > 1 ) {
							$comments = $num_comments . __( ' Comments', 'newsplus' );
						} else {
							$comments = __( '1 Comment', 'newsplus' );
						}
					$write_comments = sprintf( __( '<span class="sep"> | </span><a href="%1$s" title="Comment on %3$s">%2$s</a>', 'newsplus' ), get_comments_link(), $comments, $title );
					}
					else {
						$write_comments = '';
					}
					$post_meta = sprintf( '<span class="entry-meta"><a href="%1$s" title="%2$s"><time class="entry-date" datetime="%3$s">%4$s</time></a>%5$s</span>',
					esc_url( get_permalink() ),
					esc_attr( get_the_time() ),
					esc_attr( get_the_date( 'c' ) ),
					esc_html( get_the_date() ),
					$write_comments );
					$post_content_class = 'post-content';
					if ( has_post_thumbnail() && false == $hide_thumb ) {
						$img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $GLOBALS['post']->ID), 'list_small_thumb' );
						$thumbnail = $img_src[0];
						$thumblink = sprintf( '<div class="post-thumb"><a href="%1$s" title="%2$s"><img src="%3$s" alt="%2$s" title="%2$s"/></a></div>', $permalink, $title, $thumbnail );
					}
					else {
						$thumblink = '';
						$post_content_class .= ' no-image';
					}
					$format = '<li>%1$s<div class="%2$s"><h4><a href="%3$s" title="%4$s">%4$s</a></h4>%5$s</div></li>';
					$output.= sprintf( $format, $thumblink, $post_content_class, $permalink, $title, $post_meta );
                endwhile;
                $output .= '</ul>';
				echo $output;
				echo $after_widget; ?>
		<?php wp_reset_postdata();  // Restore global post data
		endif;
		$cache[ $args['widget_id'] ] = ob_get_flush();
		wp_cache_add( 'widget_recent_posts', $cache, 'widget' );
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['cats'] = strip_tags( $new_instance['cats'] );
		$instance['offset'] = strip_tags( $new_instance['offset'] );
		$instance['hide_thumb'] = isset( $new_instance['hide_thumb'] ) ? true : false;
		$this->flush_widget_cache();
		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset( $alloptions['newsplus_recent_entries'] ) )
		delete_option( 'newsplus_recent_entries' );
		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete( 'widget_recent_posts', 'widget' );
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'hide_thumb' => false, 'cats' => '', 'offset' => '0' ) );
		$title = esc_attr( $instance['title'] );
		$cats = esc_attr( $instance['cats'] );
		$offset = esc_attr( $instance['offset'] );
		if ( ! isset( $instance['number'] ) || ! $number = (int) $instance['number'] )
			$number = 5; ?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'newsplus' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:', 'newsplus' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /><br />
		<small><?php _e( '(at most 15)', 'newsplus' ); ?></small>
        </p>
		<p><label for="<?php echo $this->get_field_id( 'offset' ); ?>"><?php _e( 'Posts offset', 'newsplus' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'offset' ); ?>" name="<?php echo $this->get_field_name( 'offset' ); ?>" type="text" value="<?php echo $offset; ?>" size="3" /><br />
		<small><?php _e( 'Provide an offset number to which you wish to skip the posts.', 'newsplus' ); ?></small>
        </p>
		<p><label for="<?php echo $this->get_field_id( 'cats' ); ?>"><?php _e( 'Cat IDs to exclude or include:', 'newsplus' ); ?></label>
		<input type="text" value="<?php echo $cats; ?>" name="<?php echo $this->get_field_name( 'cats' ); ?>" id="<?php echo $this->get_field_id( 'cats' ); ?>" class="widefat" />
		<br />
		<small><?php _e( 'Category IDs, separated by commas. Eg: 3,6,7 to include. Or -3,-6,-7 to exclude.', 'newsplus' ); ?></small>
		</p>
        <p><label for="<?php echo $this->get_field_id( 'hide_thumb' ); ?>"><?php _e( 'Hide Thumbnails?', 'newsplus' ); ?></label>
        <input class="checkbox" type="checkbox" <?php checked( $instance['hide_thumb'], true ) ?> id="<?php echo $this->get_field_id( 'hide_thumb' ); ?>" name="<?php echo $this->get_field_name( 'hide_thumb' ); ?>" /><br />
        <small><?php _e( 'If unchecked, it will show post thumbnails.', 'newsplus' ); ?></small>
        </p>
	<?php }
} ?>