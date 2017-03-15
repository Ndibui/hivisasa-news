<?php
/**
 * Social links widget
 * Display social networking icons
 */

class NewsPlus_Social_Widget extends WP_Widget {
	function NewsPlus_Social_Widget() {
		$widget_ops = array(
			'classname'		=> 'newsplus_social',
			'description'	=> __( 'Social networking icons widget.', 'newsplus' )
		);
		$this->WP_Widget( 'newsplus-social', __( 'NewsPlus Social Icons', 'newsplus' ), $widget_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$twitter_url = $instance['twitter_url'];
		$twitter = isset( $instance['twitter'] ) ? $instance['twitter'] : false;
		$facebook_url = $instance['facebook_url'];
		$facebook = isset( $instance['facebook'] ) ? $instance['facebook'] : false;
		$in_url = $instance['in_url'];
		$in = isset( $instance['in'] ) ? $instance['in'] : false;
		$gplus_url = $instance['gplus_url'];
		$gplus = isset( $instance['gplus'] ) ? $instance['gplus'] : false;
		$yahoo_url = $instance['yahoo_url'];
		$yahoo = isset( $instance['yahoo'] ) ? $instance['yahoo'] : false;
		$delicious_url = $instance['delicious_url'];
		$delicious = isset( $instance['delicious'] ) ? $instance['delicious'] : false;
		$flickr_url = $instance['flickr_url'];
		$flickr = isset( $instance['flickr'] ) ? $instance['flickr'] : false;
		$skype_url = $instance['skype_url'];
		$skype = isset( $instance['skype'] ) ? $instance['skype'] : false;
		$vimeo_url = $instance['vimeo_url'];
		$vimeo = isset( $instance['vimeo'] ) ? $instance['vimeo'] : false;
		$utube_url = $instance['utube_url'];
		$utube = isset( $instance['utube'] ) ? $instance['utube'] : false;
		$pint_url = $instance['pint_url'];
		$pint = isset( $instance['pint'] ) ? $instance['pint'] : false;
		$blogger_url = $instance['blogger_url'];
		$blogger = isset( $instance['blogger'] ) ? $instance['blogger'] : false;
		$tumblr_url = $instance['tumblr_url'];
		$tumblr = isset( $instance['tumblr'] ) ? $instance['tumblr'] : false;
		$soundcloud_url = $instance['soundcloud_url'];
		$soundcloud = isset( $instance['soundcloud'] ) ? $instance['soundcloud'] : false;
		$lastfm_url = $instance['lastfm_url'];
		$lastfm = isset( $instance['lastfm'] ) ? $instance['lastfm'] : false;
		$rss_url = ! empty( $instance['rss_url'] ) ? $instance['rss_url'] : get_bloginfo( 'rss2_url' );
		$rss = isset( $instance['rss'] ) ? $instance['rss'] : false;
		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;

		/* Start output */
		$output = ''; ?>
        <ul class="ss_social clear">
		<?php
		if ( $twitter )
			$output .= '<li><a href="' . $twitter_url . '" class="twitter" title="Twitter" target="_blank"></a></li>';
		if ( $facebook )
			$output .= '<li><a href="' . $facebook_url . '" class="facebook" title="Facebook" target="_blank"></a></li>';
		if ( $in )
			$output .= '<li><a href="' . $in_url . '" class="in" title="LinkedIn" target="_blank"></a></li>';
		if ( $gplus )
			$output .= '<li><a href="' . $gplus_url . '" class="gplus" title="Google Plus" target="_blank"></a></li>';
		if ( $yahoo )
			$output .= '<li><a href="' . $yahoo_url . '" class="yahoo" title="yahoo" target="_blank"></a></li>';
		if ( $delicious )
			$output .= '<li><a href="' . $delicious_url . '" class="delicious" title="Delicious" target="_blank"></a></li>';
		if ( $flickr )
			$output .= '<li><a href="' . $flickr_url . '" class="flickr" title="Flickr" target="_blank"></a></li>';
		if ( $skype )
			$output .= '<li><a href="' . $skype_url . '" class="skype" title="Skype" target="_blank"></a></li>';
		if ( $vimeo )
			$output .= '<li><a href="' . $vimeo_url . '" class="vimeo" title="Vimeo" target="_blank"></a></li>';
		if ( $utube )
			$output .= '<li><a href="' . $utube_url . '" class="utube" title="YouTube" target="_blank"></a></li>';
		if ( $pint )
			$output .= '<li><a href="' . $pint_url . '" class="pint" title="Pinterest" target="_blank"></a></li>';
		if ( $blogger )
			$output .= '<li><a href="' . $blogger_url . '" class="blogger" title="Blogger" target="_blank"></a></li>';
		if ( $tumblr )
			$output .= '<li><a href="' . $tumblr_url . '" class="tumblr" title="Tumblr" target="_blank"></a></li>';
		if ( $soundcloud )
			$output .= '<li><a href="' . $soundcloud_url . '" class="soundcloud" title="SoundCloud" target="_blank"></a></li>';
		if ( $lastfm )
			$output .= '<li><a href="' . $lastfm_url . '" class="lastfm" title="Last FM" target="_blank"></a></li>';
		if ( $rss )
			$output .= '<li><a href="' . $rss_url . '" class="rss" title="RSS" target="_blank"></a></li>';
		echo ( $output . '</ul>' );
		echo $after_widget;
	}

	/* Update the widget settings. */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['twitter_url'] = strip_tags( $new_instance['twitter_url'] );
		$instance['twitter'] = isset( $new_instance['twitter'] ) ? true : false;
		$instance['facebook_url'] = strip_tags( $new_instance['facebook_url'] );
		$instance['facebook'] = isset( $new_instance['facebook'] ) ? true : false;
		$instance['in_url'] = strip_tags( $new_instance['in_url'] );
		$instance['in'] = isset( $new_instance['in'] ) ? true : false;
		$instance['gplus_url'] = strip_tags( $new_instance['gplus_url'] );
		$instance['gplus'] = isset( $new_instance['gplus'] ) ? true : false;
		$instance['yahoo_url'] = strip_tags( $new_instance['yahoo_url'] );
		$instance['yahoo'] = isset( $new_instance['yahoo'] ) ? true : false;
		$instance['delicious_url'] = strip_tags( $new_instance['delicious_url'] );
		$instance['delicious'] = isset( $new_instance['delicious'] ) ? true : false;
		$instance['flickr_url'] = strip_tags( $new_instance['flickr_url'] );
		$instance['flickr'] = isset( $new_instance['flickr'] ) ? true : false;
		$instance['skype_url'] = strip_tags( $new_instance['skype_url'] );
		$instance['skype'] = isset( $new_instance['skype'] ) ? true : false;
		$instance['vimeo_url'] = strip_tags( $new_instance['vimeo_url'] );
		$instance['vimeo'] = isset( $new_instance['vimeo'] ) ? true : false;
		$instance['utube_url'] = strip_tags( $new_instance['utube_url'] );
		$instance['utube'] = isset( $new_instance['utube'] ) ? true : false;
		$instance['pint_url'] = strip_tags( $new_instance['pint_url'] );
		$instance['pint'] = isset( $new_instance['pint'] ) ? true : false;
		$instance['blogger_url'] = strip_tags( $new_instance['blogger_url'] );
		$instance['blogger'] = isset( $new_instance['blogger'] ) ? true : false;
		$instance['tumblr_url'] = strip_tags( $new_instance['tumblr_url'] );
		$instance['tumblr'] = isset( $new_instance['tumblr'] ) ? true : false;
		$instance['soundcloud_url'] = strip_tags( $new_instance['soundcloud_url'] );
		$instance['soundcloud'] = isset( $new_instance['soundcloud'] ) ? true : false;
		$instance['lastfm_url'] = strip_tags( $new_instance['lastfm_url'] );
		$instance['lastfm'] = isset( $new_instance['lastfm'] ) ? true : false;
		$instance['rss_url'] = strip_tags( $new_instance['rss_url'] );
		$instance['rss'] = isset( $new_instance['rss'] ) ? true : false;
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance,
			array(
				'title'				=> '',
				'twitter'			=> false,
				'twitter_url'		=> '',
				'facebook'			=> false,
				'facebook_url'		=> '',
				'in'				=> false,
				'in_url'			=> '',
				'gplus'				=> false,
				'gplus_url'			=> '',
				'yahoo'				=> false,
				'yahoo_url'			=> '',
				'delicious'			=> false,
				'delicious_url'		=> '',
				'flickr'			=> false,
				'flickr_url'		=> '',
				'skype'				=> false,
				'skype_url'			=> '',
				'vimeo'				=> false,
				'vimeo_url'			=> '',
				'utube'				=> false,
				'utube_url'			=> '',
				'pint'				=> false,
				'pint_url'			=> '',
				'blogger'			=> false,
				'blogger_url'		=> '',
				'tumblr'			=> false,
				'tumblr_url'		=> '',
				'soundcloud'		=> false,
				'soundcloud_url'	=> '',
				'lastfm'			=> false,
				'lastfm_url'		=> '',
				'rss'				=> false,
				'rss_url'			=> ''
			)
		);
		$title = esc_attr( $instance['title'] );
		$twitter_url = esc_attr( $instance['twitter_url'] );
		$facebook_url = esc_attr( $instance['facebook_url'] );
		$in_url = esc_attr( $instance['in_url'] );
		$gplus_url = esc_attr( $instance['gplus_url'] );
		$yahoo_url = esc_attr( $instance['yahoo_url'] );
		$delicious_url = esc_attr( $instance['delicious_url'] );
		$flickr_url = esc_attr( $instance['flickr_url'] );
		$skype_url = esc_attr( $instance['skype_url'] );
		$vimeo_url = esc_attr( $instance['vimeo_url'] );
		$utube_url = esc_attr( $instance['utube_url'] );
		$pint_url = esc_attr( $instance['pint_url'] );
		$blogger_url = esc_attr( $instance['blogger_url'] );
		$tumblr_url = esc_attr( $instance['tumblr_url'] );
		$soundcloud_url = esc_attr( $instance['soundcloud_url'] );
		$lastfm_url = esc_attr( $instance['lastfm_url'] );
		$rss_url = esc_attr( $instance['rss_url'] );
		?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'newsplus' ); ?></label> <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
        	<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter', 'newsplus' ); ?></label>
            <input class="checkbox" type="checkbox" <?php checked( $instance['twitter'], true ) ?> id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" /><br />
            <input type="text" value="<?php echo $twitter_url; ?>" name="<?php echo $this->get_field_name( 'twitter_url' ); ?>" id="<?php echo $this->get_field_id( 'twitter_url' ); ?>" class="widefat" />
            <br />
            <small><?php _e( 'Full URL of Twitter profile', 'newsplus' ); ?>
            </small>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook', 'newsplus' ); ?></label>
            <input class="checkbox" type="checkbox" <?php checked( $instance['facebook'], true ) ?> id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" /><br />
            <input type="text" value="<?php echo $facebook_url; ?>" name="<?php echo $this->get_field_name( 'facebook_url' ); ?>" id="<?php echo $this->get_field_id( 'facebook_url' ); ?>" class="widefat" />
            <br />
            <small><?php _e( 'Full URL of Facebook profile', 'newsplus' ); ?>
            </small>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'in' ); ?>"><?php _e( 'LinkedIn', 'newsplus' ); ?></label>
            <input class="checkbox" type="checkbox" <?php checked( $instance['in'], true ) ?> id="<?php echo $this->get_field_id( 'in' ); ?>" name="<?php echo $this->get_field_name( 'in' ); ?>" /><br />
            <input type="text" value="<?php echo $in_url; ?>" name="<?php echo $this->get_field_name( 'in_url' ); ?>" id="<?php echo $this->get_field_id( 'in_url' ); ?>" class="widefat" />
            <br />
            <small><?php _e( 'Full URL to LinkedIn Profile', 'newsplus' ); ?></small>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'gplus' ); ?>"><?php _e( 'Google+', 'newsplus' ); ?></label>
            <input class="checkbox" type="checkbox" <?php checked( $instance['gplus'], true ) ?> id="<?php echo $this->get_field_id( 'gplus' ); ?>" name="<?php echo $this->get_field_name( 'gplus' ); ?>" /><br />
            <input type="text" value="<?php echo $gplus_url; ?>" name="<?php echo $this->get_field_name( 'gplus_url' ); ?>" id="<?php echo $this->get_field_id( 'gplus_url' ); ?>" class="widefat" />
            <br />
            <small><?php _e( 'Full URL to Google+ Profile', 'newsplus' ); ?></small>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'yahoo' ); ?>"><?php _e( 'Yahoo', 'newsplus' ); ?></label>
            <input class="checkbox" type="checkbox" <?php checked( $instance['yahoo'], true ) ?> id="<?php echo $this->get_field_id( 'yahoo' ); ?>" name="<?php echo $this->get_field_name( 'yahoo' ); ?>" /><br />
            <input type="text" value="<?php echo $yahoo_url; ?>" name="<?php echo $this->get_field_name( 'yahoo_url' ); ?>" id="<?php echo $this->get_field_id( 'yahoo_url' ); ?>" class="widefat" />
            <br />
            <small><?php _e( 'Full URL to Yahoo! profile', 'newsplus' ); ?>
            </small>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'delicious' ); ?>"><?php _e( 'Delicious', 'newsplus' ); ?></label>
            <input class="checkbox" type="checkbox" <?php checked( $instance['delicious'], true ) ?> id="<?php echo $this->get_field_id( 'delicious' ); ?>" name="<?php echo $this->get_field_name( 'delicious' ); ?>" /><br />
            <input type="text" value="<?php echo $delicious_url; ?>" name="<?php echo $this->get_field_name( 'delicious_url' ); ?>" id="<?php echo $this->get_field_id( 'delicious_url' ); ?>" class="widefat" />
            <br />
            <small><?php _e( 'Full URL to Delicious Profile', 'newsplus' ); ?>
            </small>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'flickr' ); ?>"><?php _e( 'Flickr', 'newsplus' ); ?></label>
            <input class="checkbox" type="checkbox" <?php checked( $instance['flickr'], true ) ?> id="<?php echo $this->get_field_id( 'flickr' ); ?>" name="<?php echo $this->get_field_name( 'flickr' ); ?>" /><br />
            <input type="text" value="<?php echo $flickr_url; ?>" name="<?php echo $this->get_field_name( 'flickr_url' ); ?>" id="<?php echo $this->get_field_id( 'flickr_url' ); ?>" class="widefat" />
            <br />
            <small><?php _e( 'Full URL of Flickr Photostream', 'newsplus' ); ?>
            </small>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'skype' ); ?>"><?php _e( 'Skype', 'newsplus' ); ?></label>
            <input class="checkbox" type="checkbox" <?php checked( $instance['skype'], true ) ?> id="<?php echo $this->get_field_id( 'skype' ); ?>" name="<?php echo $this->get_field_name( 'skype' ); ?>" /><br />
            <input type="text" value="<?php echo $skype_url; ?>" name="<?php echo $this->get_field_name( 'skype_url' ); ?>" id="<?php echo $this->get_field_id( 'skype_url' ); ?>" class="widefat" />
            <br />
            <small><?php _e( 'Full URL to Skype Profile', 'newsplus' ); ?>
            </small>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'vimeo' ); ?>"><?php _e( 'Vimeo', 'newsplus' ); ?></label>
            <input class="checkbox" type="checkbox" <?php checked( $instance['vimeo'], true ) ?> id="<?php echo $this->get_field_id( 'vimeo' ); ?>" name="<?php echo $this->get_field_name( 'vimeo' ); ?>" /><br />
            <input type="text" value="<?php echo $vimeo_url; ?>" name="<?php echo $this->get_field_name( 'vimeo_url' ); ?>" id="<?php echo $this->get_field_id( 'vimeo_url' ); ?>" class="widefat" />
            <br />
            <small><?php _e( 'Full URL to Vimeo Profile', 'newsplus' ); ?>
            </small>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'utube' ); ?>"><?php _e( 'YouTube', 'newsplus' ); ?></label>
            <input class="checkbox" type="checkbox" <?php checked( $instance['utube'], true ) ?> id="<?php echo $this->get_field_id( 'utube' ); ?>" name="<?php echo $this->get_field_name( 'utube' ); ?>" /><br />
            <input type="text" value="<?php echo $utube_url; ?>" name="<?php echo $this->get_field_name( 'utube_url' ); ?>" id="<?php echo $this->get_field_id( 'utube_url' ); ?>" class="widefat" />
            <br />
            <small><?php _e( 'Full URL to YouTube Profile', 'newsplus' ); ?>
            </small>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'pint' ); ?>"><?php _e( 'Pinterest', 'newsplus' ); ?></label>
            <input class="checkbox" type="checkbox" <?php checked( $instance['pint'], true ) ?> id="<?php echo $this->get_field_id( 'pint' ); ?>" name="<?php echo $this->get_field_name( 'pint' ); ?>" /><br />
            <input type="text" value="<?php echo $pint_url; ?>" name="<?php echo $this->get_field_name( 'pint_url' ); ?>" id="<?php echo $this->get_field_id( 'pint_url' ); ?>" class="widefat" />
            <br />
            <small><?php _e( 'Full URL to Pinterest', 'newsplus' ); ?>
            </small>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'blogger' ); ?>"><?php _e( 'Blogger', 'newsplus' ); ?></label>
            <input class="checkbox" type="checkbox" <?php checked( $instance['blogger'], true ) ?> id="<?php echo $this->get_field_id( 'blogger' ); ?>" name="<?php echo $this->get_field_name( 'blogger' ); ?>" /><br />
            <input type="text" value="<?php echo $blogger_url; ?>" name="<?php echo $this->get_field_name( 'blogger_url' ); ?>" id="<?php echo $this->get_field_id( 'blogger_url' ); ?>" class="widefat" />
            <br />
            <small><?php _e( 'Full URL to Blogger', 'newsplus' ); ?>
            </small>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'tumblr' ); ?>"><?php _e( 'Tumblr', 'newsplus' ); ?></label>
            <input class="checkbox" type="checkbox" <?php checked( $instance['tumblr'], true ) ?> id="<?php echo $this->get_field_id( 'tumblr' ); ?>" name="<?php echo $this->get_field_name( 'tumblr' ); ?>" /><br />
            <input type="text" value="<?php echo $tumblr_url; ?>" name="<?php echo $this->get_field_name( 'tumblr_url' ); ?>" id="<?php echo $this->get_field_id( 'tumblr_url' ); ?>" class="widefat" />
            <br />
            <small><?php _e( 'Full URL to Tumblr', 'newsplus' ); ?>
            </small>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'soundcloud' ); ?>"><?php _e( 'Sound Cloud', 'newsplus' ); ?></label>
            <input class="checkbox" type="checkbox" <?php checked( $instance['soundcloud'], true ) ?> id="<?php echo $this->get_field_id( 'soundcloud' ); ?>" name="<?php echo $this->get_field_name( 'soundcloud' ); ?>" /><br />
            <input type="text" value="<?php echo $soundcloud_url; ?>" name="<?php echo $this->get_field_name( 'soundcloud_url' ); ?>" id="<?php echo $this->get_field_id( 'soundcloud_url' ); ?>" class="widefat" />
            <br />
            <small><?php _e( 'Full URL to Sound Cloud', 'newsplus' ); ?>
            </small>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'lastfm' ); ?>"><?php _e( 'Last FM', 'newsplus' ); ?></label>
            <input class="checkbox" type="checkbox" <?php checked( $instance['lastfm'], true ) ?> id="<?php echo $this->get_field_id( 'lastfm' ); ?>" name="<?php echo $this->get_field_name( 'lastfm' ); ?>" /><br />
            <input type="text" value="<?php echo $lastfm_url; ?>" name="<?php echo $this->get_field_name( 'lastfm_url' ); ?>" id="<?php echo $this->get_field_id( 'lastfm_url' ); ?>" class="widefat" />
            <br />
            <small><?php _e( 'Full URL to Last FM', 'newsplus' ); ?>
            </small>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'rss' ); ?>"><?php _e( 'RSS', 'newsplus' ); ?></label>
            <input class="checkbox" type="checkbox" <?php checked( $instance['rss'], true ) ?> id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" />
            <input type="text" value="<?php echo $rss_url; ?>" name="<?php echo $this->get_field_name( 'rss_url' ); ?>" id="<?php echo $this->get_field_id( 'rss_url' ); ?>" class="widefat" />
            <br />
            <small><?php _e( 'Optional RSS URL. If left blank, default rss2 URL will be used.', 'newsplus' ); ?>
            </small>
        </p>
	<?php
	}
} ?>