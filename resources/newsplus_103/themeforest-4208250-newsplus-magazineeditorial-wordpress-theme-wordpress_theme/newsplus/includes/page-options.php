<?php
/**
 * Page options panel
 * Used to generate page options inside page edit screen.
 */

// Load text domain for translation.
load_theme_textdomain( 'newsplus', get_template_directory() . '/languages' );

$page_opts_key = 'page_options';
$page_options = array(
		'info1' 	=> array(
			'type' 			=> 'heading',
			'description' 	=> __( 'Sidebar Options', 'newsplus' )
		),

		'sb_usage' 	=> array(
			'id' 			=> 'sb_usage',
			'title' 		=> __( 'Available widget areas for Sidebar', 'newsplus' ),
			'type' 			=> 'custom_select_a',
			'description' 	=> __( 'Select a widget area to use on Sidebar', 'newsplus' )
		),

		'hwa_usage' => array(
			'id' 			=> 'hwa_usage',
			'title' 		=> __( 'Available widget areas for Header Section', 'newsplus' ),
			'type' 			=> 'custom_select_h',
			'description' 	=> __( 'Select a widget area to use on Header Section', 'newsplus' )
		),

		'sidebar_a' => array(
			'id' 			=> 'sidebar_a',
			'title' 		=> __( 'Create an exclusive sidebar for this page.', 'newsplus' ),
			'type' 			=> 'checkbox',
			'description' 	=> __( 'Check to create exclusive sidebar for this page.', 'newsplus' )
		),

		'sidebar_h' => array(
			'id' 			=> 'sidebar_h',
			'title' 		=> __( 'Create an exclusive Header Widget Area for this page.', 'newsplus' ),
			'type' 			=> 'checkbox',
			'description' 	=> __( 'Check to create exclusive header widget area for this page. <br />On checking these options, a new Widget Area will be created in the name of this page. Once you publish or update the page, the new sidebar will appear inside dropdown menu. You can select that new sidebar and update the page again. You can remove the sidebar by unchecking these options.', 'newsplus' )
		),

		'hr1' 		=> array( 'type' => 'hr'),

		'info2' 	=> array(
			'type' 			=> 'heading',
			'description' 	=> __( 'Archive and Blog Options', 'newsplus' )
		),

		'category' 	=> array(
			'id' 			=> 'category',
			'title' 		=> __( 'Category IDs to fetch Archive or Blog Posts', 'newsplus' ),
			'type' 			=> 'text',
			'description' 	=> __( 'Enter a numeric category ID, or IDs separated by commas, from which you wish to show posts. Use this option if you are using an Archive or Blog template. Example: 3,4,7,12', 'newsplus' )
		),

		'post_per_page' => array(
			'id' 			=> 'post_per_page',
			'title' 		=> __( 'Posts per page', 'newsplus' ),
			'type' 			=> 'text',
			'description' 	=> __( 'The number of posts to show per page.', 'newsplus' )
		),

		'hr2' => array(	'type' => 'hr'),

		'info3' => array(
			'type' 			=> 'heading',
			'description' 	=> __( 'Other Settings', 'newsplus' )
		),

		'hide_crumbs' => array(
			'id' 			=> 'hide_crumbs',
			'title' 		=> __( 'Check to hide breadcrumbs on this page.', 'newsplus' ),
			'type' 			=> 'checkbox'
		),

		'hide_secondary' => array(
			'id' 			=> 'hide_secondary',
			'title' 		=> __( 'Check to hide secondary widget area on this page.', 'newsplus' ),
			'type' 			=> 'checkbox'
		)
);

function create_page_options() {
	global $page_opts_key;
	if ( function_exists( 'add_meta_box' ) ) {
		add_meta_box( 'page_options_panel', __( 'Page Options', 'newsplus' ), 'display_page_options', 'page', 'normal', 'high' );
	}
}
add_action( 'add_meta_boxes', 'create_page_options' );

function display_page_options() {
	global $post, $page_options, $page_opts_key; ?>
	<div class="form-wrap">
		<?php wp_nonce_field( plugin_basename( __FILE__ ), $page_opts_key . '_wpnonce', false, true );
        foreach ( $page_options as $meta_box ) {
            $data = get_post_meta( $post->ID, $page_opts_key, true );

            if( $meta_box['type'] == 'heading' ) {
                echo ('<h4>' . $meta_box['description'] . '</h4>' );
            }
            elseif ( $meta_box['type'] == 'hr' ) {
                echo ('<div style="border-bottom:1px solid #e0e0e0; margin:1.5em 0"></div>');
            }
            elseif ( $meta_box['type'] == 'text' ) { ?>
                <div>
                    <label for="<?php echo $meta_box['id']; ?>"><?php echo $meta_box['title']; ?></label>
                    <input style="width:100%" type="text" name="<?php if ( isset( $meta_box['id'] ) ) echo $meta_box['id']; ?>" id="<?php if ( isset( $meta_box['id'] ) ) echo $meta_box['id']; ?>" value="<?php if( isset( $data[ $meta_box['id'] ] ) ) echo htmlspecialchars( $data[ $meta_box['id'] ] ); else { if ( isset( $meta_box['std'] ) ) echo htmlspecialchars( $meta_box['std'] ); } ?>" />
                    <p><?php if ( isset( $meta_box['description'] ) ) echo $meta_box['description']; ?></p>
                </div>
            <?php }
            elseif ( $meta_box['type'] == 'textarea' ) { ?>
                <div>
                    <label for="<?php echo $meta_box['id']; ?>"><?php echo $meta_box['title']; ?></label>
                    <textarea style="width:100%" name="<?php if ( isset( $meta_box['id'] ) ) echo $meta_box['id']; ?>" cols="40" rows="6"><?php if ( isset( $data[ $meta_box['id'] ] ) ) echo stripslashes( $data[ $meta_box['id'] ] ); else { if ( isset( $meta_box['std'] ) ) echo stripslashes(  $meta_box['std'] ); } ?></textarea>
                    <p><?php if( isset( $meta_box['description'] ) ) echo $meta_box['description']; ?></p>
                </div>
            <?php }
            elseif ( $meta_box['type'] == 'select' ) { ?>
                <div>
                    <label for="<?php echo $meta_box['id']; ?>"><?php echo $meta_box['title']; ?></label>
                    <select style="width:100%" name="<?php echo $meta_box['id']; ?>" id="<?php echo $meta_box['id']; ?>">
                    <?php foreach ( $meta_box['options'] as $option ) { ?>
                    <option <?php if ( isset( $data[ $meta_box['id'] ] ) && ( $data[ $meta_box['id'] ] == $option ) ) { echo ' selected="selected"'; } elseif ( $option == $meta_box['std'] ) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
                    <?php } ?>
                    </select>
                    <p><?php if ( isset( $meta_box['description'] ) ) echo $meta_box['description']; ?></p>
                </div>
            <?php }
            elseif ( $meta_box['type'] == 'custom_select_a' ) { ?>
                <div>
                    <label for="<?php echo $meta_box['id']; ?>"><?php echo $meta_box['title']; ?></label>
                    <select style="width:100%" name="<?php echo $meta_box['id']; ?>" id="<?php echo $meta_box['id']; ?>">
                    <?php
                    global $wp_registered_sidebars;
                    $current_sidebars = $wp_registered_sidebars;
                    if ( is_array( $current_sidebars ) && ! empty( $current_sidebars ) ) {
                        foreach ( $current_sidebars as $sidebar ) {
                            if( $sidebar['handler'] == 'sidebar' ) { ?>
                            <option <?php if ( isset( $data[ $meta_box['id'] ] ) && ( $data[ $meta_box['id'] ] == $sidebar['id'] ) ) { echo ' selected="selected"'; } ?> value="<?php echo $sidebar['id']; ?>"><?php echo $sidebar['name']; ?></option><?php }
                        }
                    }?>
                    </select>
                    <p><?php if ( isset( $meta_box['description'] ) ) echo $meta_box['description']; ?></p>
                </div>
            <?php }
            elseif ( $meta_box['type'] == 'custom_select_h' ) { ?>
                <div>
                    <label for="<?php echo $meta_box['id']; ?>"><?php echo $meta_box['title']; ?></label>
                    <select style="width:100%" name="<?php echo $meta_box['id']; ?>" id="<?php echo $meta_box['id']; ?>">
                    <?php
                    global $wp_registered_sidebars;
                    $current_sidebars = $wp_registered_sidebars;
                    if ( is_array( $current_sidebars ) && ! empty( $current_sidebars ) ) {
                        foreach ( $current_sidebars as $sidebar ) {
                            if ( $sidebar['handler'] == 'headerbar' ) { ?>
                            <option <?php if ( isset( $data[ $meta_box['id'] ] ) && ( $data[ $meta_box['id'] ] == $sidebar['id'] ) ) { echo ' selected="selected"'; } ?> value="<?php echo $sidebar['id']; ?>"><?php echo $sidebar['name']; ?></option><?php } //sec
                        }
                    }?>
                    </select>
                    <p><?php if ( isset( $meta_box['description'] ) ) echo $meta_box['description']; ?></p>
                </div>
            <?php }

            elseif ( $meta_box['type'] == 'checkbox' ) { ?>
                <div>
                    <?php if ( isset( $data[ $meta_box['id'] ] ) && ( $data[ $meta_box['id'] ] ) ){ $checked = 'checked="checked"'; } else { $checked = ''; } ?>
                    <input style="float:left; width:20px" type="checkbox" name="<?php echo $meta_box['id']; ?>" id="<?php echo $meta_box['id']; ?>" value="true" <?php echo $checked; ?> />
                    <label for="<?php echo $meta_box['id']; ?>"><?php echo $meta_box['title']; ?></label>
                    <p><?php if ( isset( $meta_box['description'] ) ) echo $meta_box['description']; ?></p>
                </div>
            <?php }
        } ?>
	</div>
<?php }

function save_page_options( $post_id ) {
	global $post, $page_options, $page_opts_key;

	// verify if this is an auto save routine.
	// If it is our form has not been submitted, so we dont want to do anything
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	// verify this came from our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( isset( $_POST[ $page_opts_key . '_wpnonce' ] ) )
		if ( ! wp_verify_nonce( $_POST[ $page_opts_key . '_wpnonce' ], plugin_basename(__FILE__) ) )
			return;

	// Check permissions
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] )
	{
		if ( ! current_user_can( 'edit_page', $post_id ) )
			return;
	}
	else
	{
		if ( ! current_user_can( 'edit_post', $post_id ) )
			return;
	}

	// OK, we're authenticated: we need to find and save the data
	foreach ( $page_options as $meta_box ) {
		if ( isset( $meta_box['id'] ) && isset( $_POST[ $meta_box['id'] ] ) )
			$data[ $meta_box['id'] ] = $_POST[ $meta_box['id'] ];
	}

	if ( isset( $data ) )
		update_post_meta( $post_id, $page_opts_key, $data );
}
add_action( 'save_post', 'save_page_options' ); ?>