<?php
/**
 * Short codes in visual editor
 * Register short code buttons and add them to the visual mode of editor
 */

// Register Buttons
function register_buttons( $buttons ) {
	array_push( $buttons, 'col' );
	array_push( $buttons, 'insert_posts' );
	array_push( $buttons, 'slider' );
	array_push( $buttons, 'posts_slider' );
	array_push( $buttons, 'posts_carousel' );
	array_push( $buttons, 'tabs' );
	array_push( $buttons, 'accordion' );
	array_push( $buttons, 'toggle' );
	array_push( $buttons, 'box' );
	array_push( $buttons, 'list' );
	array_push( $buttons, 'horz_rule' );
	array_push( $buttons, 'btn' );
	array_push( $buttons, 'indicator' );
	array_push( $buttons, 'logo_grid' );
    return $buttons;
}

// Register TinyMCE Plugin
function add_plugins($plugin_array) {
	$js_path = get_template_directory_uri() . '/includes/shortcodes/js/';
	$plugin_array['col'] 			= $js_path . 'sc-columns.js';
	$plugin_array['insert_posts']	= $js_path . 'sc-insert-posts.js';
	$plugin_array['slider']			= $js_path . 'sc-slider.js';
	$plugin_array['posts_slider']	= $js_path . 'sc-posts-slider.js';
	$plugin_array['posts_carousel']	= $js_path . 'sc-posts-carousel.js';
	$plugin_array['tabs']			= $js_path . 'sc-tabs.js';
	$plugin_array['accordion']		= $js_path . 'sc-accordion.js';
	$plugin_array['toggle']			= $js_path . 'sc-toggle.js';
	$plugin_array['box']			= $js_path . 'sc-box.js';
	$plugin_array['list']			= $js_path . 'sc-list.js';
	$plugin_array['horz_rule']		= $js_path . 'sc-hr.js';
	$plugin_array['btn']			= $js_path . 'sc-btn.js';
	$plugin_array['indicator']		= $js_path . 'sc-indicator.js';
	$plugin_array['logo_grid']		= $js_path . 'sc-logo-grid.js';
    return $plugin_array;
 }

// Initialization Function
function add_buttons() {
    if ( current_user_can( 'edit_posts' ) &&  current_user_can( 'edit_pages' ) ) {
	  add_filter( 'mce_external_plugins', 'add_plugins' );
      add_filter( 'mce_buttons_3', 'register_buttons' );
	}
 }
add_action( 'init', 'add_buttons' ); ?>