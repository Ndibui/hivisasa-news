<?php
/**
 * Theme options panel
 * General theme options panel inside Appearance > NewsPlus Options
 */
 
// Load text domain for translation.
load_theme_textdomain( 'newsplus', get_template_directory() . '/languages' );

$shortname = 'pls';
$options = array(
		array( 'type'	=> 'wrap_start' ),

		array( 'type'	=> 'tabs_start' ),

		array(
			'name'		=> __( 'General', 'newsplus' ),
			'id'		=> $shortname . '_general',
			'type'		=> 'heading'
		),

		array(
			'name'		=> __( 'Header', 'newsplus' ),
			'id'		=> $shortname . '_header_area',
			'type'		=> 'heading'
		),

		array(
			'name'		=> __( 'Blog', 'newsplus' ),
			'id'		=> $shortname . '_blog',
			'type'		=> 'heading'
		),

		array(
			'name'		=> __( 'Contact', 'newsplus' ),
			'id'		=> $shortname . '_contact',
			'type'		=> 'heading'
		),

		array(
			'name'		=> __( 'Footer', 'newsplus' ),
			'id'		=> $shortname . '_footer',
			'type'		=> 'heading'
		),

		array(
			'name'		=> __( 'Custom Font', 'newsplus' ),
			'id'		=> $shortname . '_custom_font',
			'type'		=> 'heading'
		),

		array(
			'name'		=> __( 'Image Sizes', 'newsplus' ),
			'id'		=> $shortname . '_image_sizes',
			'type'		=> 'heading'
		),

		array( 'type'	=> 'tabs_end' ),

		array(
			'type'		=> 'tabbed_start',
			'id'		=> $shortname . '_general'
		),

		array(
			'name'		=> __( 'General Settings for the theme', 'newsplus' ),
			'type'		=> 'subheading'
		),

		array(
			'name'		=> __( 'Layout Style:', 'newsplus' ),
			'desc'		=> __( 'Select a layout style for the theme.', 'newsplus' ),
			'id'		=> $shortname . '_layout',
			'std'		=> 'boxed',
			'type'		=> 'select',
			'options'	=> array( 'boxed', 'stretched' )
		),

		array(
			'name'		=> __( 'Global Sidebar Placement', 'newsplus' ),
			'desc'		=> __( 'Select a global sidebar placement for blog, archives, author, single, etc.', 'newsplus' ),
			'id'		=> $shortname . '_sb_pos',
			'std'		=> 'right',
			'type'		=> 'select',
			'options'	=> array( 'right', 'left' )
		),

		array(
			'name'		=> __( 'Custom head markup:', 'newsplus' ),
			'desc'		=> __( 'Use this section for inserting any custom CSS or script inside head node of the site. For example, Google Analytics code, Google font CSS, or custom scripts.', 'newsplus' ),
			'id'		=> $shortname . '_custom_head_code',
			'std'		=> '',
			'type'		=> 'textarea'
		),

		array(
			'name'		=> __( 'Hide Breadcrumbs', 'newsplus' ),
			'desc'		=> __( 'Check to hide Breadcrumbs permanently.', 'newsplus' ),
			'id'		=> $shortname . '_hide_crumbs',
			'type'		=> 'checkbox',
			'std'		=> false
		),

		array(
			'name'		=> __( 'Disable responsive.css file', 'newsplus' ),
			'desc'		=> __( 'Check to disable responsive.css file. Located as <code>newsplus/responsive.css</code>', 'newsplus' ),
			'id'		=> $shortname . '_disable_resp_css',
			'type'		=> 'checkbox',
			'std'		=> false
		),

		array(
			'name'		=> __( 'Disable user.css file', 'newsplus' ),
			'desc'		=> __( 'Check to disable user.css file. Located as <code>newsplus/user.css</code> This file can be used to add your custom styles without modifying actual style.css file.', 'newsplus' ),
			'id'		=> $shortname . '_disable_user_css',
			'type'		=> 'checkbox',
			'std'		=> false
		),

		array(
			'name'		=> __( 'Enable rtl.css file', 'newsplus' ),
			'desc'		=> __( 'Check to enable rtl.css file. Located as <code>newsplus/rtl.css</code> If using RTL installation of WordPress, this file is automatically loaded. You can also load it forcefully by enabling this option.', 'newsplus' ),
			'id'		=> $shortname . '_enable_rtl_css',
			'type'		=> 'checkbox',
			'std'		=> false
		),

		array(
			'name'		=> __( 'Hide Secondary Widget Area', 'newsplus' ),
			'desc'		=> __( 'Check to hide secondary widget area on archives, category, search, author etc. You can control individual setting for Pages and Posts inside their options panel.', 'newsplus' ),
			'id'		=> $shortname . '_hide_secondary',
			'type'		=> 'checkbox',
			'std'		=> false
		),

		array(
			'name'		=> __( 'Disable PrettyPhoto', 'newsplus' ),
			'desc'		=> __( 'Check to disable PrettyPhoto on this theme.', 'newsplus' ),
			'id'		=> $shortname . '_disable_prettyphoto',
			'type'		=> 'checkbox',
			'std'		=> false
		),

		array( 'type'	=> 'tabbed_end' ),

		array(
			'type'		=> 'tabbed_start',
			'id'		=> $shortname . '_header_area'
		),

		array(
			'name'		=> __( 'Header Settings', 'newsplus' ),
			'type'		=> 'subheading'
		),

		array(
			'name'		=> __( 'Disable top utility bar ', 'newsplus' ),
			'desc'		=> __( 'Check to disable top utility bar.', 'newsplus' ),
			'id'		=> $shortname . '_top_bar_hide',
			'type'		=> 'checkbox',
			'std'		=> false
		),

		array(
			'name'		=> __( 'Left callout section', 'newsplus' ),
			'desc'		=> __( 'Choose what to display inside top-left callout section. Optional menu, or custom text.', 'newsplus' ),
			'id'		=> $shortname . '_cb_item_left',
			'std'		=> 'menu',
			'type'		=> 'select',
			'options'	=> array( 'menu', 'text' )
		),

		array(
			'name'		=> __( 'Top-left Callout Text:', 'newsplus' ),
			'desc'		=> __( 'Enter custom text that should appear on left side of top utility bar.', 'newsplus' ),
			'id'		=> $shortname . '_cb_text_left',
			'std'		=> 'Optional callout text left side.',
			'type'		=> 'textarea'
		),

		array(
			'name'		=> __( 'Right callout section', 'newsplus' ),
			'desc'		=> __( 'Choose what to display inside top-right callout section. Searchform or custom text.', 'newsplus' ),
			'id'		=> $shortname . '_cb_item_right',
			'std'		=> 'searchform',
			'type'		=> 'select',
			'options'	=> array( 'searchform', 'text' )
		),

		array(
			'name'		=> __( 'Top-right Callout Text:', 'newsplus' ),
			'desc'		=> __( 'Enter custom text that should appear on right side of top utility bar.', 'newsplus' ),
			'id'		=> $shortname . '_cb_text_right',
			'std'		=> 'Optional callout text right side.',
			'type'		=> 'textarea'
		),

		array(
			'name'		=> __( 'Site Name/Logo Settings', 'newsplus' ),
			'type'		=> 'subheading'
		),

		array(
			'name'		=> __( 'Display Logo Image:', 'newsplus' ),
			'desc'		=> __( 'Check to display logo image instead of site name and description', 'newsplus' ),
			'id'		=> $shortname . '_logo_check',
			'type'		=> 'checkbox',
			'std'		=> false
		),

		array(
			'name'		=> __( 'Custom Logo URL:', 'newsplus' ),
			'desc'		=> __( 'Enter full URL of your Logo image. You can upload logo to the media library or theme images folder and paste file URL here.', 'newsplus' ),
			'id'		=> $shortname . '_logo',
			'std'		=> '',
			'type'		=> 'text'
		),

		array(
			'name'		=> __( 'Custom Site Title', 'newsplus' ),
			'desc'		=> __( 'Enter custom site title other than your default site title. This is used to allow HTML in site title. This title will be shown when not using logo image.', 'newsplus' ),
			'id'		=> $shortname . '_custom_title',
			'std'		=> '',
			'type'		=> 'text'
		),

		array(
			'name'		=> __( 'Logo Placement', 'newsplus' ),
			'desc'		=> __( 'Select a placement for Logo/site name. You can set margins inside style.css file.', 'newsplus' ),
			'id'		=> $shortname . '_logo_align',
			'std'		=> 'left',
			'type'		=> 'select',
			'options'	=> array( 'left', 'right' )
		),

		array( 'type'	=> 'tabbed_end' ),

		array(
			'type'		=> 'tabbed_start',
			'id'		=> $shortname . '_blog'
		),

		array(
			'name'		=> __( 'Archive Settings', 'newsplus' ),
			'type'		=> 'subheading'
		),

		array(
			'name'		=> __( 'Global Archives Template', 'newsplus' ),
			'desc'		=> __( 'Select a template for default blog and archives.', 'newsplus' ),
			'id'		=> $shortname . '_archive_template',
			'std'		=> 'grid-style',
			'type'		=> 'select',
			'options'	=> array( 'grid-style', 'list-style', 'classic-style' )
		),

		array(
			'name'		=> __( 'Hide Post Meta', 'newsplus' ),
			'desc'		=> __( 'Check to hide post meta information on blog archives and single post.', 'newsplus' ),
			'id'		=> $shortname . '_hide_post_meta',
			'type'		=> 'checkbox',
			'std'		=> false
		),

		array(
			'name'		=> __( 'Single Post Settings', 'newsplus' ),
			'type'		=> 'subheading'
		),

		array(
			'name'		=> __( 'Show Author Bio:', 'newsplus' ),
			'desc'		=> __( 'Check to display Author bio on single posts.', 'newsplus' ),
			'id'		=> $shortname . '_author',
			'type'		=> 'checkbox',
			'std'		=> false
		),

		array(
			'name'		=> __( 'Show related posts:', 'newsplus' ),
			'desc'		=> __( 'Check to display related posts on single posts.', 'newsplus' ),
			'id'		=> $shortname . '_rp',
			'type'		=> 'checkbox',
			'std'		=> false
		),

		array(
			'name'		=> __( 'Related posts taxonomy:', 'newsplus' ),
			'desc'		=> __( 'Select a taxonomy for related posts.', 'newsplus' ),
			'id'		=> $shortname . '_rp_taxonomy',
			'std'		=> 'category',
			'type'		=> 'select',
			'options'	=> array( 'category', 'tags' )
		),

		array(
			'name'		=> __( 'Related posts display style:', 'newsplus' ),
			'desc'		=> __( 'Select a display style for related posts.', 'newsplus' ),
			'id'		=> $shortname . '_rp_style',
			'std'		=> 'thumbnail',
			'type'		=> 'select',
			'options'	=> array( 'thumbnail', 'list' )
		),

		array(
			'name'		=> __( 'Number of related posts to show:', 'newsplus' ),
			'desc'		=> __( 'Enter a number for posts to show.', 'newsplus' ),
			'id'		=> $shortname . '_rp_num',
			'std'		=> '4',
			'type'		=> 'text'
		),

		array(
			'name'		=> __( 'Hide featured Image', 'newsplus' ),
			'desc'		=> __( 'Check to disable automatic display of featured image on Single Posts.', 'newsplus' ),
			'id'		=> $shortname . '_hide_feat_image',
			'type'		=> 'checkbox',
			'std'		=> false
		),

		array(
			'name'		=> __( 'Hide Tag List', 'newsplus' ),
			'desc'		=> __( 'Check to hide tag list on Single Posts.', 'newsplus' ),
			'id'		=> $shortname . '_hide_tags',
			'type'		=> 'checkbox',
			'std'		=> false
		),

		array(
			'name'		=> __( 'Social Sharing Button Settings', 'newsplus' ),
			'type'		=> 'subheading'
		),

		array(
			'name'		=> __( 'Show Social Sharing Buttons:', 'newsplus' ),
			'desc'		=> __( 'Check to display social sharing on single posts.', 'newsplus' ),
			'id'		=> $shortname . '_ss_sharing',
			'type'		=> 'checkbox',
			'std'		=> false
		),

		array(
			'name'		=> __( 'Social Sharing Heading', 'newsplus' ),
			'desc'		=> __( 'Enter a heading for sharing buttons. Example, Share this post.', 'newsplus' ),
			'id'		=> $shortname . '_ss_sharing_heading',
			'std'		=> '',
			'type'		=> 'text'
		),

		array(
			'name'		=> __( 'Facebook:', 'newsplus' ),
			'desc'		=> __( 'Check to display Facebook Like button.', 'newsplus' ),
			'id'		=> $shortname . '_ss_fb',
			'type'		=> 'checkbox',
			'std'		=> false
		),

		array(
			'name'		=> __( 'Twitter:', 'newsplus' ),
			'desc'		=> __( 'Check to display Twitter button.', 'newsplus' ),
			'id'		=> $shortname . '_ss_tw',
			'type'		=> 'checkbox',
			'std'		=> false
		),

		array(
			'name'		=> __( 'Twitter Username (optional)', 'newsplus' ),
			'desc'		=> __( 'Write your twitter username without @', 'newsplus' ),
			'id'		=> $shortname . '_ss_tw_usrname',
			'std'		=> '',
			'type'		=> 'text'
		),

		array(
			'name'		=> __( 'Google Plus:', 'newsplus' ),
			'desc'		=> __( 'Check to display Google Plus button.', 'newsplus' ),
			'id'		=> $shortname . '_ss_gp',
			'type'		=> 'checkbox',
			'std'		=> false
		),

		array(
			'name'		=> __( 'Pinterest:', 'newsplus' ),
			'desc'		=> __( 'Check to display Pinterest button.', 'newsplus' ),
			'id'		=> $shortname.'_ss_pint',
			'type'		=> 'checkbox',
			'std'		=> false
		),

		array(
			'name'		=> __( 'LinkedIn:', 'newsplus' ),
			'desc'		=> __( 'Check to display LinkedIn button.', 'newsplus' ),
			'id'		=> $shortname . '_ss_ln',
			'type'		=> 'checkbox',
			'std'		=> false
		),

		array(
			'name'		=> __( 'Global Single Post Advertisements', 'newsplus' ),
			'type'		=> 'subheading'
		),

		array(
			'name'		=> __( 'Advertisement above the post', 'newsplus' ),
			'desc'		=> __( 'Enter custom HTML or advertisement code that should appear above the post. Short codes are supported. The markup used here will apply to all posts globally.<br/>You can override or hide this ad on individual posts.', 'newsplus' ),
			'id'		=> $shortname . '_ad_above',
			'std'		=> '',
			'type'		=> 'textarea'
		),

		array(
			'name'		=> __( 'Advertisement below the post', 'newsplus' ),
			'desc'		=> __( 'Enter custom HTML or advertisement code that should appear below the post. Short codes are supported. The markup used here will apply to all posts globally.<br/>You can override or hide this ad on individual posts.', 'newsplus' ),
			'id'		=> $shortname . '_ad_below',
			'std'		=> '',
			'type'		=> 'textarea'
		),

		array( 'type' 	=> 'tabbed_end' ),

		array(
			'type'		=> 'tabbed_start',
			'id'		=> $shortname . '_contact'
		),

		array(
			'name'		=> __( 'Contact page template settings', 'newsplus' ),
			'type'		=> 'subheading'
		),

		array(
			'name'		=> __( 'Contact e-mail', 'newsplus' ),
			'desc'		=> __( 'Enter an e-mail address to which mail should be received from contact page. If left blank, your blog admin email is used.', 'newsplus' ),
			'id'		=> $shortname . '_email',
			'std'		=> '',
			'type'		=> 'text'
		),

		array(
			'name'		=> __( 'Contact Page custom Markup<br/>(Can be used for Google Maps)', 'newsplus' ),
			'desc'		=> __( 'Visit maps.google.com and copy your map location iFrame code. Paste it here. This will be shown on contact page template.<br/>Tip: You can also use any custom markup or HTML here instead of Google Maps.', 'newsplus' ),
			'id'		=> $shortname . '_google_map',
			'std'		=> '',
			'type'		=> 'textarea'
		),

		array(
			'name'		=> __( 'Mail Sent Message:', 'newsplus' ),
			'desc'		=> __( 'Enter a message that should be displayed when the mail is successfully sent.', 'newsplus' ),
			'id'		=> $shortname . '_success_msg',
			'std'		=> __( '<h4>Thank You! Your message has been sent.</h4>', 'newsplus' ),
			'type'		=> 'textarea'
		),

		array( 'type'	=> 'tabbed_end' ),

		array(
			'type'		=> 'tabbed_start',
			'id'		=> $shortname . '_footer'
		),

		array(
			'name'		=> __( 'Footer settings', 'newsplus' ),
			'type'		=> 'subheading'
		),

		array(
			'name'		=> __( 'Custom Footer Text (Left):', 'newsplus' ),
			'desc'		=> __( 'Enter custom text for left side of the footer. You can use <code>HTML</code> here.', 'newsplus' ),
			'id'		=> $shortname . '_footer_left',
			'std'		=> '&copy; 2013 CompanyName. All rights reserved.',
			'type'		=> 'textarea'
		),

		array(
			'name'		=> __( 'Custom Footer Text (Right):', 'newsplus' ),
			'desc'		=> __( 'Enter custom text for right side of the footer. You can use <code>HTML</code> here.', 'newsplus' ),
			'id'		=> $shortname . '_footer_right',
			'std'		=> 'Optional footer notes.',
			'type'		=> 'textarea'
		),

		array( 'type'	=> 'tabbed_end' ),

		array(
			'type'		=> 'tabbed_start',
			'id'		=> $shortname . '_custom_font'
		),

		array(
			'name'		=> __( 'Custom Font Settings', 'newsplus' ),
			'type'		=> 'subheading'
		),

		array(
			'name'		=> __( 'Disable custom Google font:', 'newsplus' ),
			'desc'		=> __( 'Check to disable custom Google fonts for this theme.', 'newsplus' ),
			'id'		=> $shortname.'_disable_custom_font',
			'type'		=> 'checkbox',
			'std'		=> false
		),

		array(
			'name'		=> __( 'Font family:', 'newsplus' ),
			'desc'		=> __( 'Enter font family query as generated on the google.com/webfonts/ page. After changing the family name, it will be required to assign this font-family to appropriate selectors inside style.css or user.css file. For example: <br/> <pre>body.custom-font-enabled {<br/>  font-family: "Open Sans";<br/>}</pre>', 'newsplus' ),
			'id'		=> $shortname . '_font_family',
			'std'		=> 'Open+Sans:400italic,700italic,400,700',
			'type'		=> 'textarea'
		),

		array(
			'name'		=> __( 'Subsets:', 'newsplus' ),
			'desc'		=> __( 'If using other language, enter subset query for the font. For example: <code>cyrillic,cyrillic-ext</code>', 'newsplus' ),
			'id'		=> $shortname . '_font_subset',
			'std'		=> 'latin,latin-ext',
			'type'		=> 'textarea'
		),

		array( 'type'	=> 'tabbed_end' ),

		array(
			'type'		=> 'tabbed_start',
			'id'		=> $shortname . '_image_sizes'
		),

		array(
			'type'		=> 'subdescription',
			'desc'		=> __( 'Use this section for specifying custom image sizes. After changing settings, it will be required to <a href="http://wordpress.org/extend/plugins/regenerate-thumbnails/">Regenerate Thumbnails</a>. Kindly install this plugin and regenerate thumbnails for new sizes. For best results, keep default settings as they are appropriate for responsive version.', 'newsplus' ),
		),

		array(
			'name'		=> __( 'Posts Slider Images', 'newsplus' ),
			'type'		=> 'subheading'
		),

		array(
			'name'		=> __( 'Width', 'newsplus' ),
			'desc'		=> __( 'Enter a width for Posts Slider image.', 'newsplus' ),
			'id'		=> 'ps_width',
			'std'		=> '900',
			'type'		=> 'text'
		),

		array(
			'name'		=> __( 'Height', 'newsplus' ),
			'desc'		=> __( 'Enter a height for Posts Slider image.', 'newsplus' ),
			'id'		=> 'ps_height',
			'std'		=> '9999',
			'type'		=> 'text'
		),

		array(
			'name'		=> __( 'Hard Crop', 'newsplus' ),
			'desc'		=> __( 'Check to enable hard cropping mode.', 'newsplus' ),
			'id'		=> 'ps_crop',
			'type'		=> 'checkbox',
			'std'		=> false
		),

		array(
			'name'		=> __( 'Two Columnar Grid Images', 'newsplus' ),
			'type'		=> 'subheading'
		),

		array(
			'name'		=> __( 'Width', 'newsplus' ),
			'desc'		=> __( 'Enter a width for two columnar grid images.', 'newsplus' ),
			'id'		=> 'two_col_width',
			'std'		=> '800',
			'type'		=> 'text'
		),

		array(
			'name'		=> __( 'Height', 'newsplus' ),
			'desc'		=> __( 'Enter a height for two columnar grid images.', 'newsplus' ),
			'id'		=> 'two_col_height',
			'std'		=> '9999',
			'type'		=> 'text'
		),

		array(
			'name'		=> __( 'Hard Crop', 'newsplus' ),
			'desc'		=> __( 'Check to enable hard cropping mode.', 'newsplus' ),
			'id'		=> 'two_col_crop',
			'type'		=> 'checkbox',
			'std'		=> false
		),

		array(
			'name'		=> __( 'Three Columnar Grid / Carousel Images', 'newsplus' ),
			'type'		=> 'subheading'
		),

		array(
			'name'		=> __( 'Width', 'newsplus' ),
			'desc'		=> __( 'Enter a width for three columnar grid images.', 'newsplus' ),
			'id'		=> 'three_col_width',
			'std'		=> '800',
			'type'		=> 'text'
		),

		array(
			'name'		=> __( 'Height', 'newsplus' ),
			'desc'		=> __( 'Enter a height for three columnar grid images.', 'newsplus' ),
			'id'		=> 'three_col_height',
			'std'		=> '9999',
			'type'		=> 'text'
		),

		array(
			'name'		=> __( 'Hard Crop', 'newsplus' ),
			'desc'		=> __( 'Check to enable hard cropping mode.', 'newsplus' ),
			'id'		=> 'three_col_crop',
			'type'		=> 'checkbox',
			'std'		=> false
		),

		array(
			'name'		=> __( 'Blog - List Style Images', 'newsplus' ),
			'type'		=> 'subheading'
		),

		array(
			'name'		=> __( 'Width', 'newsplus' ),
			'desc'		=> __( 'Enter a width for list style big images.', 'newsplus' ),
			'id'		=> 'list_big_width',
			'std'		=> '800',
			'type'		=> 'text'
		),

		array(
			'name'		=> __( 'Height', 'newsplus' ),
			'desc'		=> __( 'Enter a height for list style big images.', 'newsplus' ),
			'id'		=> 'list_big_height',
			'std'		=> '9999',
			'type'		=> 'text'
		),

		array(
			'name'		=> __( 'Hard Crop', 'newsplus' ),
			'desc'		=> __( 'Check to enable hard cropping mode.', 'newsplus' ),
			'id'		=> 'list_big_crop',
			'type'		=> 'checkbox',
			'std'		=> false
		),

		array(
			'name'		=> __( 'Small Post Lists Images', 'newsplus' ),
			'type'		=> 'subheading'
		),

		array(
			'name'		=> __( 'Width', 'newsplus' ),
			'desc'		=> __( 'Enter a width for small post list images.', 'newsplus' ),
			'id'		=> 'list_small_width',
			'std'		=> '370',
			'type'		=> 'text'
		),

		array(
			'name'		=> __( 'Height', 'newsplus' ),
			'desc'		=> __( 'Enter a height for small post list images.', 'newsplus' ),
			'id'		=> 'list_small_height',
			'std'		=> '9999',
			'type'		=> 'text'
		),

		array(
			'name'		=> __( 'Hard Crop', 'newsplus' ),
			'desc'		=> __( 'Check to enable hard cropping mode.', 'newsplus' ),
			'id'		=> 'list_small_crop',
			'type'		=> 'checkbox',
			'std'		=> false
		),

		array(
			'name'		=> __( 'Related Posts Images', 'newsplus' ),
			'type'		=> 'subheading'
		),

		array(
			'name'		=> __( 'Width', 'newsplus' ),
			'desc'		=> __( 'Enter a width for related posts images on Single post.', 'newsplus' ),
			'id'		=> 'rp_width',
			'std'		=> '370',
			'type'		=> 'text'
		),

		array(
			'name'		=> __( 'Height', 'newsplus' ),
			'desc'		=> __( 'Enter a height for related posts images on Single post.', 'newsplus' ),
			'id'		=> 'rp_height',
			'std'		=> '9999',
			'type'		=> 'text'
		),

		array(
			'name'		=> __( 'Hard Crop', 'newsplus' ),
			'desc'		=> __( 'Check to enable hard cropping mode.', 'newsplus' ),
			'id'		=> 'rp_crop',
			'type'		=> 'checkbox',
			'std'		=> false
		),

		array(
			'name'		=> __( 'Minifolio Widget Images', 'newsplus' ),
			'type'		=> 'subheading'
		),

		array(
			'name'		=> __( 'Width', 'newsplus' ),
			'desc'		=> __( 'Enter a width for minifolio widget images.', 'newsplus' ),
			'id'		=> 'mf_width',
			'std'		=> '370',
			'type'		=> 'text'
		),

		array(
			'name'		=> __( 'Height', 'newsplus' ),
			'desc'		=> __( 'Enter a height for minifolio widget images.', 'newsplus' ),
			'id'		=> 'mf_height',
			'std'		=> '9999',
			'type'		=> 'text'
		),

		array(
			'name'		=> __( 'Hard Crop', 'newsplus' ),
			'desc'		=> __( 'Check to enable hard cropping mode.', 'newsplus' ),
			'id'		=> 'mf_crop',
			'type'		=> 'checkbox',
			'std'		=> false
		),
		
		array(
			'name'		=> __( 'Single Post Image', 'newsplus' ),
			'type'		=> 'subheading'
		),

		array(
			'name'		=> __( 'Width', 'newsplus' ),
			'desc'		=> __( 'Enter a width for single post featured image.', 'newsplus' ),
			'id'		=> 'sng_width',
			'std'		=> '800',
			'type'		=> 'text'
		),

		array(
			'name'		=> __( 'Height', 'newsplus' ),
			'desc'		=> __( 'Enter a height for single post featured image.', 'newsplus' ),
			'id'		=> 'sng_height',
			'std'		=> '9999',
			'type'		=> 'text'
		),

		array(
			'name'		=> __( 'Hard Crop', 'newsplus' ),
			'desc'		=> __( 'Check to enable hard cropping mode.', 'newsplus' ),
			'id'		=> 'sng_crop',
			'type'		=> 'checkbox',
			'std'		=> false
		),

		array( 'type'	=> 'tabbed_end' ),

		array( 'type' 	=> 'wrap_end' )
);

function newsplus_add_admin() {
	global $shortname, $options;
	if ( isset( $_GET['page'] ) && ( $_GET['page'] == basename(__FILE__) ) ) {
		if ( isset( $_REQUEST['action'] ) && ( 'save' == $_REQUEST['action'] ) ) {
			foreach ( $options as $value ) {
				if( isset( $_REQUEST[ $value['id'] ] ) ) {
					update_option( $value['id'], $_REQUEST[ $value['id'] ] );
				}
				else {
					delete_option( $value['id'] );
				}
			}
			header( 'Location:themes.php?page=theme-admin-options.php&saved=true' );
			die;
		}
		elseif ( isset( $_REQUEST['action'] ) && ( 'reset' == $_REQUEST['action'] ) ) {
			foreach ( $options as $value ) {
				delete_option( $value['id'] );
			}
			header( 'Location:themes.php?page=theme-admin-options.php&reset=true' );
			die;
		}
	}
	$hookname = add_theme_page( __( 'Theme Options', 'newsplus' ), __( 'Theme Options', 'newsplus' ), 'edit_theme_options', basename( __FILE__ ), 'newsplus_admin' );
	add_action( 'admin_print_scripts-' . $hookname, 'newsplus_admin_scripts' );
}
function newsplus_admin_scripts() {
	global $shortname, $options;

	// Load scripts required by Theme Options page
	wp_enqueue_style( 'theme-admin-css', get_template_directory_uri() . '/css/admin.css', false, '', 'all' );
	wp_enqueue_script( 'theme-admin-js', get_template_directory_uri() . '/js/admin.js', false, '' );
}
function newsplus_admin() {
    global $shortname, $options;
    if ( isset( $_REQUEST['saved'] ) && $_REQUEST['saved'] ) { ?>
		<div id="message" class="updated fade">
            <p><?php _e( 'Theme settings saved.', 'newsplus' ); ?></p>
        </div>
	<?php }
    if ( isset( $_REQUEST['reset'] ) && $_REQUEST['reset'] ) { ?>
		<div id="message" class="updated fade">
            <p><?php _e( 'Theme settings reset.', 'newsplus' ); ?></p>
        </div>
	<?php } ?>
    <div class="wrap">
    <div id="icon-themes" class="icon32"></div>
        <h2 class="settings-title"><?php _e( 'Theme Options', 'newsplus' ); ?></h2>
        <form method="post">
		<?php foreach ( $options as $value ) {
                switch ( $value['type'] ) {

                    case 'wrap_start': ?>
                    <div class="ss_wrap">
                    <?php break;

                    case 'wrap_end': ?>
                    </div>
                    <?php break;

                    case 'tabs_start': ?>
                    <ul class="tabs clear">
                    <?php break;

                    case 'tabs_end': ?>
                    </ul>
                    <?php break;

                    case 'tabbed_start': ?>
                    <div class="tabbed" id="<?php echo $value['id']; ?>">
                    <?php break;

                    case 'tabbed_end': ?>
                    </div>
                    <?php break;

                    case 'heading': ?>
                    <li><a href="#<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a></li>
                    <?php break;

                    case 'subheading': ?>
                    <div class="subheading"><?php echo $value['name']; ?></div>
                    <?php break;

                    case 'subdescription': ?>
                    <p><?php echo $value['desc']; ?></p>
                    <?php break;

                    case 'select': ?>
                    <ul class="item_row">
                        <li class="left_col"><?php echo $value['name']; ?></li>
                        <li class="mid_col">
                            <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                                <?php foreach ( $value['options'] as $option ) { ?>
                                <option <?php if ( get_option( $value['id'] ) == $option ) { echo ' selected="selected"'; } elseif ( $option == $value['std'] ) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
                                <?php } ?>
                            </select>
                        </li>
                        <li class="right_col">
                            <small><?php echo $value['desc']; ?></small>
                        </li>
                    </ul>
                    <?php break;

                    case 'text':
                    ?>
                    <ul class="item_row">
                        <li class="left_col"><?php echo $value['name']; ?></li>
                        <li class="mid_col">
                            <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != '' ) { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
                        </li>
                        <li class="right_col">
                            <small><?php echo $value['desc']; ?></small>
                        </li>
                    </ul>
                    <?php break;

                    case 'textarea':
                    ?>
                    <ul class="item_row">
                        <li class="left_col"><?php echo $value['name']; ?></li>
                        <li class="mid_col">
                            <textarea class="code" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="30" rows="6"><?php if ( get_option( $value['id'] ) != '' ) { echo stripslashes( get_option( $value['id'] ) ); } else { echo $value['std']; } ?></textarea>
                        </li>
                        <li class="right_col">
                            <small><?php echo $value['desc']; ?></small>
                        </li>
                    </ul>
                    <?php break;

                    case "checkbox":
                    ?>
                    <ul class="item_row">
                        <li class="left_col"><?php echo $value['name']; ?></li>
                        <li class="mid_col">
                            <?php if( get_option( $value['id'] ) ){ $checked = 'checked="checked"'; } else { $checked = ''; } ?>
                            <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                        </li>
                        <li class="right_col">
                            <small><?php echo $value['desc']; ?></small>
                        </li>
                    </ul>
                    <?php break;
                    }
                }
                ?>
                <p class="submit">
                    <input class="button button-primary" name="save" type="submit" value="<?php _e( 'Save Settings', 'newsplus' ); ?>" />
                    <input type="hidden" name="action" value="save" />
                </p>
        </form>
        <form method="post">
            <p class="submit">
            <input class="button" name="reset" type="submit" value="<?php _e( 'Reset all Settings', 'newsplus' ); ?>" />
            <input class="button button-primary" type="hidden" name="action" value="reset" />
            </p>
        </form>
    </div> <!-- .wrap -->
<?php }
add_action( 'admin_menu', 'newsplus_add_admin' ); ?>