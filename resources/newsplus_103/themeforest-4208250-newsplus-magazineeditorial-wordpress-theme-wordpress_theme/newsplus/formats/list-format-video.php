<?php
/* Post Format - Video */

$post_opts = get_post_meta( $post->ID, 'post_options', true );
$pf_video = !empty( $post_opts['pf_video'] ) ? $post_opts['pf_video'] : ''; ?>
<?php if ( $pf_video ) { ?>
    <div class="entry-list-left">
        <div class="embed-wrap">
            <?php global $wp_embed;
            $post_embed = $wp_embed->run_shortcode( '[embed]'.$pf_video.'[/embed]' );
            echo $post_embed; ?>
        </div><!-- .embed-wrap -->
    </div><!-- .entry-list-left -->
<?php } ?>
<div class="entry-list-right<?php if( ! $pf_video ) echo(' no_image'); ?>">