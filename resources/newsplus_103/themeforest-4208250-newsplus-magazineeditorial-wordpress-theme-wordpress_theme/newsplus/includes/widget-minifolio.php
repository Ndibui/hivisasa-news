<?php
/**
 * Mini Portfolio widget
 * Display post featured images specified categories.
 */

class NewsPlus_Mini_Folio extends WP_Widget {
	function NewsPlus_Mini_Folio() {
		$widget_ops = array(
			'classname'		=> 'newsplus_mini_folio',
			'description'	=> __( 'Show a mini portfolio from post featured images.', 'newsplus' )
		);
		$this->WP_Widget( 'newsplus-mini-folio', __( 'NewsPlus Mini Folio', 'newsplus' ), $widget_ops );
		$this->alt_option_name = 'newsplus_mini_folio';
		add_action( 'save_post', array( &$this, 'flush_widget_cache' ) );
		add_action( 'deleted_post', array( &$this, 'flush_widget_cache' ) );
		add_action( 'switch_theme', array( &$this, 'flush_widget_cache' ) );
	}

	function widget( $args, $instance ) {
		$cache = wp_cache_get( 'widget_recent_posts', 'widget' );
		if ( ! is_array( $cache ) )
			$cache = array();
		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}
		ob_start();
		extract( $args );
		$output = '';
		$cats = empty( $instance['cats'] ) ? '-1' : $instance['cats'];
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Recent Posts', 'newsplus' ) : $instance['title'] );
		if ( ! $number = (int) $instance['number'] )
			$number = 12;
		elseif ( $number < 1 )
			$number = 1;
		$r = new WP_Query(
			array(
				'posts_per_page'		=> $number,
				'post_status'			=> 'publish',
				'ignore_sticky_posts'	=> 1,
				'cat'					=> $cats
			)
		);
		if ( $r->have_posts() ) :
			echo $before_widget;
            if ( $title )
				echo $before_title . $title . $after_title; ?>
            <ul class="minifolio clear">
			<?php while ( $r->have_posts() ) :
					$r->the_post();
					$permalink = get_permalink();
					$title = get_the_title();
					$bloginfo = get_template_directory_uri();
					if ( has_post_thumbnail()) {
						$img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $GLOBALS['post']->ID ), 'minifolio_thumb' );
						$thumbnail = $img_src[0];
						$output .= sprintf( '<li><a href="%1$s" title="%2$s"><img src="%3$s" alt="%2$s" title="%2$s"/></a></li>', $permalink, $title, $thumbnail );
					}
                endwhile;
                $output .= '</ul>';
				echo $output;
            echo $after_widget; ?>
		<?php wp_reset_postdata(); // Restore global post data
		endif;
		$cache[ $args['widget_id'] ] = ob_get_flush();
		wp_cache_add( 'widget_recent_posts', $cache, 'widget' );
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['cats'] = strip_tags( $new_instance['cats'] );
		$this->flush_widget_cache();
		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset( $alloptions['newsplus_mini_folio'] ) )
		delete_option( 'newsplus_mini_folio' );
		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete( 'widget_recent_posts', 'widget' );
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'cats' => '' ) );
		$title = esc_attr( $instance['title'] );
		$cats = esc_attr( $instance['cats'] );
		if ( ! isset( $instance['number'] ) || ! $number = (int) $instance['number'] )
			$number = 12; ?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'newsplus' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:', 'newsplus' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /><br />
		<small><?php _e( 'Enter number of posts to show', 'newsplus' ); ?></small>
        </p>
		<p><label for="<?php echo $this->get_field_id( 'cats' ); ?>"><?php _e( 'Cat IDs to exclude or include:', 'newsplus' ); ?></label>
		<input type="text" value="<?php echo $cats; ?>" name="<?php echo $this->get_field_name('cats'); ?>" id="<?php echo $this->get_field_id( 'cats' ); ?>" class="widefat" />
		<br />
		<small><?php _e( 'Category IDs, separated by commas. Eg: 3,6,7 to include. Or -3,-6,-7 to exclude.', 'newsplus' ); ?></small>
		</p>
	<?php }
} ?>