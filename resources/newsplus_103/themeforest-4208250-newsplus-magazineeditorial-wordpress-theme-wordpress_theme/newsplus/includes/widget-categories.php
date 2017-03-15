<?php
/**
 * Categories widget
 * Display categories with an exclusde option.
 */

class NewsPlus_Cat_Widget extends WP_Widget {
	function NewsPlus_Cat_Widget() {
		$widget_ops = array(
		'classname'		=> 'newsplus_categories',
		'description'	=> __( 'Display a custom list of categories using exclude option.', 'newsplus' )
		);
		$this->WP_Widget( 'newsplus-categories', __( 'NewsPlus Categories', 'newsplus' ), $widget_ops );
	}
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Categories', 'newsplus' ) : $instance['title'] );
		$exclude = empty( $instance['exclude'] ) ? '' : $instance['exclude'];
		$c = ! empty( $instance['count'] ) ? '1' : '0';
		$h = ! empty( $instance['hierarchical'] ) ? '1' : '0';
		$d = ! empty( $instance['dropdown'] ) ? '1' : '0';
		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
		$cat_args = array(
			'orderby'		=> 'name',
			'exclude'		=> $exclude,
			'show_count'	=> $c,
			'hierarchical'	=> $h
		);
		if ( $d ) {
			$cat_args['show_option_none'] = __( 'Select Category', 'newsplus' );
			wp_dropdown_categories( apply_filters( 'widget_categories_dropdown_args', $cat_args ) ); ?>
			<script type='text/javascript'>
				/* <![CDATA[ */
				var dropdown = document.getElementById("cat");
				function onCatChange() {
					if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
						location.href = "<?php echo home_url(); ?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
					}
				}
				dropdown.onchange = onCatChange;
				/* ]]> */
            </script>
	<?php }
    else { ?>
		<ul>
			<?php
            $cat_args['title_li'] = '';
            wp_list_categories( apply_filters( 'custom_cat_args', $cat_args ) );
            ?>
		</ul>
	<?php }
	echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['count'] = ! empty( $new_instance['count'] ) ? 1 : 0;
		$instance['hierarchical'] = ! empty( $new_instance['hierarchical'] ) ? 1 : 0;
		$instance['dropdown'] = ! empty( $new_instance['dropdown'] ) ? 1 : 0;
		$instance['exclude'] = strip_tags( $new_instance['exclude'] );
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'exclude' => '' ) );
		$title = esc_attr( $instance['title'] );
		$count = isset($instance['count']) ? (bool) $instance['count'] :false;
		$hierarchical = isset( $instance['hierarchical'] ) ? (bool) $instance['hierarchical'] : false;
		$dropdown = isset( $instance['dropdown'] ) ? (bool) $instance['dropdown'] : false;
		$exclude = esc_attr( $instance['exclude'] );?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'newsplus' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id( 'exclude' ); ?>"><?php _e( 'Exclude:', 'newsplus' ); ?></label>
		<input type="text" value="<?php echo $exclude; ?>" name="<?php echo $this->get_field_name( 'exclude' ); ?>" id="<?php echo $this->get_field_id( 'exclude' ); ?>" class="widefat" />
		<br />
		<small><?php _e( 'Category IDs, separated by commas.', 'newsplus' ); ?></small>
		</p>
		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'dropdown' ); ?>" name="<?php echo $this->get_field_name( 'dropdown' ); ?>"<?php checked( $dropdown ); ?> />
		<label for="<?php echo $this->get_field_id( 'dropdown' ); ?>"><?php _e( 'Display as dropdown', 'newsplus' ); ?></label><br />

		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>"<?php checked( $count ); ?> />
		<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e( 'Show post counts', 'newsplus' ); ?></label><br />

		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'hierarchical' ); ?>" name="<?php echo $this->get_field_name( 'hierarchical' ); ?>"<?php checked( $hierarchical ); ?> />
		<label for="<?php echo $this->get_field_id('hierarchical'); ?>"><?php _e( 'Show hierarchy', 'newsplus' ); ?></label></p>
	<?php }
}?>