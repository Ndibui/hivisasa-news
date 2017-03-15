<?php
/* List Format - Gallery */

$images = get_children(
	array(
		'post_parent' 		=> $post->ID,
		'post_type'			=> 'attachment',
		'post_mime_type'	=> 'image',
		'orderby'			=> 'menu_order',
		'order'				=> 'ASC',
		'numberposts'		=> 999
	)
);
if ( $images ): ?>
    <div class="entry-list-left">
	<script type="text/javascript">
		jQuery(window).load(function(){
			jQuery('#slider-<?php the_ID();?>').flexslider({
				animation: 'slide',
				easing: 'easeInOutExpo',
				animationSpeed: 400,
				slideshowSpeed: 4000,
				selector: '.slides > .slide',
				pauseOnAction: true,
				useCSS: false,
				prevText: '<?php _e( 'Prev', 'newsplus'); ?>',
				nextText: '<?php _e( 'Next', 'newsplus'); ?>',
				controlsContainer: '#slider-<?php the_ID();?>-controls',
				animationLoop: false,
				smoothHeight: true,
				start: function(slider) {
					jQuery(slider).removeClass("flex-loading");
				}
			});
		});
    </script>
    <div class="flexslider flex-loading" id="slider-<?php the_ID();?>"><ul class="slides">
    <?php foreach ( $images as $image ) {
		$img_src = wp_get_attachment_image_src( $image->ID, 'list_big_thumb' );
		echo '<li class="slide"><img src="' . $img_src[0] . '" alt="' . get_the_title() . '" title="' . get_the_title() . '"/></li>';
    }?>
    </ul></div><!-- #slider-<?php the_ID();?> -->
    <div id="slider-<?php the_ID();?>-controls" class="flex-controls-container"></div><!-- .flex-controls-container -->
    </div><!-- .entry-list-left -->
<?php endif; ?>
<div class="entry-list-right<?php if( ! $images ) echo(' no_image'); ?>">