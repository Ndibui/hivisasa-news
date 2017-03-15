<?php
/* Post Format - Standard */

$title = get_the_title();
$permalink = get_permalink();
if ( has_post_thumbnail() ) {
	$img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'two_col_thumb' );
	$img = $img_src[0];
	echo( '<div class="post-thumb"><a href="' . $permalink . '" title="' . $title . '"><img src="' . $img . '" alt="' . $title . '" title="' . $title . '"/></a></div>');
} ?>