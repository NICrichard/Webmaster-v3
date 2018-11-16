<?php
include_once(ABSPATH . 'wp-admin/includes/plugin.php');

if (function_exists('domain_mapping_post_content')) {
	add_filter('wp_get_attachment_url', 'domain_mapping_post_content');
}

remove_action('shutdown', 'wp_ob_end_flush_all', 1);

// Gutenberg stuff
add_theme_support('align-wide');
add_theme_support('disable-custom-colors');
add_theme_support('editor-font-sizes', array(
	array(
		'name'		=> __('small', 'webmaster-bs4'),
		'shortName'	=> __('S', 'webmaster-bs4'),
		'size'		=> 12,
		'slug'		=> 'small'
	),
	array(
		'name'		=> __('regular', 'webmaster-bs4'),
		'shortName'	=> __('M', 'webmaster-bs4'),
		'size'		=> 16,
		'slug'		=> 'regular'
	),
	array(
		'name'		=> __('large', 'webmaster-bs4'),
		'shortName'	=> __('L', 'webmaster-bs4'),
		'size'		=> 20,
		'slug'		=> 'large'
	)
));

function ai_gutenberg_scripts() {
	wp_enqueue_style('webmaster-bs4-guten', get_stylesheet_directory_uri() . '/assets/css/gutenberg.css', array(), filemtime(get_stylesheet_directory() . '/css/gutenberg.css'));
}
add_action('enqueue_block_editor_assets', 'ai_gutenberg_scripts');

add_action('add_meta_boxes', 'ai_add_custom_box');
add_action('save_post', 'ai_save_postdata');
function ai_add_custom_box() {
	add_meta_box(
		'ai_hidetitle',
		'Options',
		'ai_hide_title_box',
		'page',
		'side',
		'high'
	);
}
function ai_hide_title_box($post) {
	$ck = get_post_meta($post->ID, 'hide_title', true);
	echo '<input type="checkbox" name="hide_title" value="yes"';
	if ($ck === 'yes') {
		echo ' checked="checked"';
	}
	echo '> Hide the title';
}
function ai_save_postdata($post_id) {
	update_post_meta($post_id, 'hide_title', $_POST['hide_title']);
}

if (!function_exists('idaho_webmaster_setup')) :
	function idaho_webmaster_setup() {
	    add_theme_support('automatic-feed-links');
	    add_theme_support('title-tag');
	    add_theme_support('post-thumbnails');
		set_post_thumbnail_size(900, 400, true);
		add_image_size('card-img', 900, 350, true);
		add_image_size('gallery-thumbnail', 600, 600, true);
		register_nav_menus( array(
			'primary' 	=> __('Primary Menu', 'webmaster-bs4'),
			'top' 		=> __('Top Menu', 'webmaster-bs4'),
		));
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
		$color_scheme    = idaho_webmaster_get_color_scheme();
		$default_color	 = trim($color_scheme[1], '#');
	}
endif;
add_action('after_setup_theme', 'idaho_webmaster_setup');

if (!function_exists('idaho_webmaster_title_tag')) :
	function idaho_webmaster_title_tag() {
		$title = get_the_title() . ' | ';
		$title .= get_bloginfo('description', 'display');
		$title .= ' ' . get_bloginfo('name');
		return $title;
	}
endif;
add_filter('pre_get_document_title', 'idaho_webmaster_title_tag');

if (!function_exists('idaho_webmaster_widgets_init')) :
	function idaho_webmaster_widgets_init() {
		register_sidebar(array(
			'name' 			=> esc_html__('General Sidebar', 'webmaster-bs4'),
			'id' 			=> 'sidebar-1',
			'description' 	=> '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' 	=> '</aside>',
			'before_title' 	=> '<div class="card-heading"><h3 class="card-title">',
			'after_title' 	=> '</h3></div><div class="card-body">',
		));

		register_sidebar(array(
			'name' 			=> esc_html__('Home Sidebar', 'webmaster-bs4'),
			'id' 			=> 'sidebar-home',
			'description' 	=> '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' 	=> '</div></aside>',
			'before_title' 	=> '<div class="card-heading"><h3 class="card-title">',
			'after_title' 	=> '</h3></div><div class="card-body">',
		));

		register_sidebar(array(
			'name' 			=> esc_html__('Page Sidebar', 'webmaster-bs4'),
			'id' 			=> 'sidebar-page',
			'description' 	=> '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' 	=> '</aside>',
			'before_title' 	=> '<div class="card-heading"><h3 class="card-title">',
			'after_title' 	=> '</h3></div><div class="card-body">',
		));

		function footer_sidebar_register($index) {
			register_sidebar(array(
				'name' 			=> esc_html__('Footer Column ', 'webmaster-bs4') . $index,
				'id' 			=> 'footer-column-'.$index,
				'description' 	=> '',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' 	=> '</div>',
				'before_title' 	=> '<h3 class="widget-title">',
				'after_title' 	=> '</h3>',
			));
		};

		footer_sidebar_register(1);
		footer_sidebar_register(2);
		footer_sidebar_register(3);
	}
endif;
add_action('widgets_init', 'idaho_webmaster_widgets_init');

if (!function_exists('idaho_webmaster_scripts')) :
	function idaho_webmaster_scripts() {
		wp_enqueue_style('webmaster-bs4-font', 'https://fonts.googleapis.com/css?family=Montserrat|Lato');
		wp_enqueue_style('webmaster-bs4-fontawesome', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css');
		wp_enqueue_style('webmaster-bs4', get_theme_file_uri('/css/bootstrap.min.css'));
		wp_enqueue_style('webmaster-bs4', get_theme_file_uri('/css/gutenberg.css'));
		wp_enqueue_style('webmaster-bs4-style', get_stylesheet_uri());
		wp_enqueue_script('webmaster-bs4-jquery', get_theme_file_uri('/js/jquery.min.js'));
        wp_enqueue_script('webmaster-bs4-popper', get_template_directory_uri() . '/js/popper.min.js');
        wp_enqueue_script('webmaster-bs4-bootstrap', get_theme_file_uri('/js/bootstrap.min.js'));
		wp_enqueue_script('webmaster-bs4-theme', get_template_directory_uri() . '/js/theme.js', array('webmaster-bs4-bootstrap'), '1.2', true);
		wp_enqueue_script('webmaster-bs4-sizer', get_template_directory_uri() . '/js/resizer.js');
	}
endif;
add_action('wp_enqueue_scripts', 'idaho_webmaster_scripts');

if (!function_exists('idaho_webmaster_html_js_class')) :
	function idaho_webmaster_html_js_class() {
		echo '<script>document.documentElement.className = document.documentElement.className.replace("no-js","js");</script>'. "\n";
	}
endif;
add_action('wp_head', 'idaho_webmaster_html_js_class', 1);

/*
if (!function_exists('idaho_webmaster_external_link_style')) :
	function idaho_webmaster_external_link_style() {
		$siteURL = site_url();
		if (empty($siteURL)) {
			$siteURL = 'localhost';
		}
		echo '<script>FontAwesomeConfig={searchPseudoElements:true};</script><style>#content a:not([href*=".gov"]):not([href^="#"]):not([href^="/"]):not([href^="tel:"]):not(.no-icon-link):not([href*="localhost:8888"]):after{position:relative!important;top:0px;display:inline;font-family:"Font Awesome 5 Free" !important;font-weight:900;line-height:1;content:"\f35d";margin-left:3px;font-size:0.5em}</style>'. "\n";
	}
endif;
add_action('wp_head', 'idaho_webmaster_external_link_style', 1);
*/

if (!function_exists('idaho_webmaster_add_editor_styles')) :
	function idaho_webmaster_add_editor_styles() {
		add_editor_style();
	}
endif;
add_action('init', 'idaho_webmaster_add_editor_styles');

if (!function_exists('idaho_webmaster_unhide_kitchen_sink')) :
	function idaho_webmaster_unhide_kitchen_sink($args) {
		$args['wordpress_adv_hidden'] = false;
		return $args;
	}
endif;
add_filter('tiny_mce_before_init', 'idaho_webmaster_unhide_kitchen_sink');

if (!function_exists('remove_empty_p')) :
	function remove_empty_p($content) {
		$content = force_balance_tags($content);
		return preg_replace( '#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content );
	}
endif;

if (!function_exists('idaho_plugin_check')) :
	function idaho_plugin_check($plugin) {
		return (is_plugin_active($plugin));
	}
endif;

if (!function_exists('idaho_webmaster_logo_srcset')) :
	function idaho_webmaster_logo_srcset() {
		$logo = get_theme_mod('idaho_logo', false);
		$retina = get_theme_mod('idaho_logo_retina', false);
		if ($logo && $retina) {
			return sprintf('%1$s 1x, %2$s 2x', $logo, $retina);
		} else {
			return '';
		}
	}
endif;

if (!function_exists('idaho_webmaster_meta')) :
	function idaho_webmaster_meta($name, $default = '', $single = true) {
		$meta = get_post_meta(get_the_ID(), $name, $single);
		if (!empty($meta)) {
			return $meta;
		} else {
			return $default;
		}
	}
endif;

if (!function_exists('idaho_webmaster_comment_form_fields')) :
	function idaho_webmaster_comment_form_fields($fields) {
		$commenter = wp_get_current_commenter();
		$req       = get_option('require_name_email');
		$aria_req  = ($req ? " aria-required='true'" : '');
		$html5     = current_theme_supports('html5', 'comment-form') ? 1 : 0;
		$fields = array(
			'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' . '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
			'email'  => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' . '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
			'url'    => '<div class="form-group comment-form-url"><label for="url">' . __( 'Website' ) . '</label> ' . '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>'
		);
		return $fields;
	}
endif;
add_filter('comment_form_default_fields', 'idaho_webmaster_comment_form_fields');

if (!function_exists('idaho_webmaster_adjust_brightness')) :
	function idaho_webmaster_adjust_brightness($hex, $steps) {
		$steps = max(-255, min(255, $steps));
		$hex = str_replace('#', '', $hex);
		if (3 === strlen($hex)) {
			$hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
		}
		$color_parts = str_split($hex, 2);
		$return = '#';
		foreach ($color_parts as $color) {
			$color   = hexdec($color);
			$color   = max(0, min(255, $color + $steps));
			$return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT);
		}
		return $return;
	}
endif;

if (!function_exists('idaho_webmaster_b_or_w')) :
	function idaho_webmaster_b_or_w($hexcolor) {
		$r = hexdec(substr($hexcolor, 1, 2));
		$g = hexdec(substr($hexcolor, 3, 2));
		$b = hexdec(substr($hexcolor, 5, 2));
		$yiq = (($r * 299) + ($g * 587) + ($b * 114)) / 1000;
		return ($yiq >= 128) ? '#000000' : '#ffffff';
	}
endif;

if (!function_exists('idaho_webmaster_hex_2_rgba')) :
	function idaho_webmaster_hex_2_rgba($color, $opacity = false) {
		$default = 'rgb(0,0,0)';

		if (empty($color)) {
			return $default;
		}

		if ('#' === $color[0]) {
			$color = substr($color, 1);
		}

		if (6 === strlen($color)) {
			$hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
		} elseif (3 === strlen($color)) {
			$hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
		} else {
			return $default;
		}

		$rgb = array_map('hexdec', $hex);

		if ($opacity) {
			if (abs($opacity) > 1 ) {
				$opacity = 1.0;
			}
			$output = 'rgba('.implode(',' ,$rgb) . ',' . $opacity . ')';
		} else {
			$output = 'rgb('.implode(',' ,$rgb) . ')';
		}
		return $output;
	}
endif;

if (!function_exists('idaho_webmaster_find_twitter_handle')) :
	function idaho_webmaster_find_twitter_handle() {
		$re = '/(?:https?:\\/\\/)?(?:www\\.)?twitter\\.com\\/(?:#!\\/)?@?([^\\/\\?\\s]*)/';
		$url = get_theme_mod('idaho_social_twitter', 'https://twitter.com/@idahogov');
		preg_match_all($re, $url, $matches);
		if (isset($mathes[1][0])) {
			return '@' . $matches[1][0];
		} else {
			return '@';
		}
	}
endif;

if (!function_exists('idaho_webmaster_custom_wysiwyg')) :
	function idaho_webmaster_custom_wysiwyg($in) {
		$in['toolbar1'] = 'bold,italic,strikethrough,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink,spellchecker,wp_fullscreen,wp_adv,idaho_mce_shortcode_button';
		$in['toolbar2'] = 'styleselect,formatselect,alignjustify,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help';
		return $in;
	}
endif;
add_filter('tiny_mce_before_init', 'idaho_webmaster_custom_wysiwyg');

if (!function_exists('idaho_webmaster_disable_wp_emojicons')) :
	function idaho_webmaster_disable_wp_emojicons() {
		remove_action('admin_print_styles', 'print_emoji_styles');
		remove_action('wp_head', 'print_emoji_detection_script', 7);
		remove_action('admin_print_scripts', 'print_emoji_detection_script');
		remove_action('wp_print_styles', 'print_emoji_styles');
		remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
		remove_filter('the_content_feed', 'wp_staticize_emoji');
		remove_filter('comment_text_rss', 'wp_staticize_emoji');
	}
endif;
add_action('init', 'idaho_webmaster_disable_wp_emojicons');

if (!function_exists('idaho_webmaster_responsive_video_embeds')) :
	function idaho_webmaster_responsive_video_embeds($html, $data) {
		if (!is_object($data) || empty($data->type)) {
			return $html;
		}
		if ('video' !== $data->type) {
			return $html;
		}
		$ar = $data->width / $data->height;
		$ar_mod = (abs($ar - (4 / 3)) < abs($ar - (16 / 9)) ? 'embed-responsive-4by3' : 'embed-responsive-16by9');
		$html = preg_replace('/(width|height)="\d*"\s/', '', $html);
		return '<div class="embed-responsive ' . $ar_mod . '" data-aspectratio="' . number_format($ar, 5, '.', ',') . '">' . $html . '</div>';
	}
endif;
add_filter('oembed_dataparse', 'idaho_webmaster_responsive_video_embeds', 10, 2);

function idaho_webmaster_bootstrap_nav() {
	wp_nav_menu(array(
		'theme_location' 	=> 'primary',
		'depth' 			=> 2,
		'container' 		=> 'div',
		'container_id' 		=> 'main-navigation',
		'container_class'	=> 'collapse navbar-collapse justify-content-center',
		'menu_class' 		=> 'nav navbar-nav',
		'fallback_cb' 		=> 'WP_Bootstrap_Navwalker::fallback',
		'walker' 			=> new WP_Bootstrap_Navwalker()
	));
}

function idaho_webmaster_bs_nav_top() {
	wp_nav_menu(array(
		'theme_location'	=> 'top',
		'depth' 			=> 1,
		'container' 		=> 'div',
		'container_class' 	=> 'justify-content-end',
		'container_id' 		=> 'top-navigation',
		'menu_class' 		=> 'top-menu nav',
		'fallback_cb' 		=> 'WP_Bootstrap_Navwalker::fallback',
		'walker' 			=> new WP_Bootstrap_Navwalker()
	));
}

register_default_headers(array(
	'default-image' => array(
		'url'			=> get_stylesheet_directory_uri() . '/img/header.jpg',
		'thumbnail_url'	=> get_stylesheet_directory_uri() . '/img/header.jpg',
		'description'	=> __('Default header image', 'webmaster-bs4')
	),
));

function webmaster_login_logo() { ?>
	<style type="text/css">
	#login h1 a, .login h1 a {
		background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/logo.svg);
		height: 65px;
		width: 320px;
		background-size: 320px 65px;
		background-repeat: no-repeat;
		padding-bottom: 10px;
	}
	</style>
	<?php
}
add_action('login_enqueue_scripts', 'webmaster_login_logo');

function webmaster_login_logo_url() {
	return home_url();
}
add_filter('login_headerurl', 'webmaster_login_logo_url');

function webmaster_login_logo_url_title() {
	return 'State of Idaho';
}
add_filter('login_headertitle', 'webmaster_login_logo_url_title');

require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/bootstrap-navwalker.php';
require get_template_directory() . '/inc/bootstrap-breadcrumbs.php';
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/editor-formats.php';
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/meta-boxes.php';
require get_template_directory() . '/inc/shortcodes.php';
require get_template_directory() . '/inc/template-tags.php';

require_once dirname(__FILE__) . '/inc/class-tgm-plugin-activation.php';
add_action('tgmpa_register', 'webmaster_register_required_plugins');
function webmaster_register_required_plugins() {
    $plugins = array(
        array(
            'name'      			=> 'Max Mega Menu',
            'slug'      			=> 'megamenu',
            'required'  			=> true,
            'force_activation' 		=> true,
            'force_deactivation' 	=> true
		),
		array(
            'name'      			=> 'The Events Calendar',
            'slug'      			=> 'the-events-calendar',
            'required'  			=> true,
            'force_activation' 		=> true,
            'force_deactivation' 	=> true
		),
		array(
			'name'					=> 'Yoast SEO',
			'slug'					=> 'wordpress-seo',
			'required'				=> true,
			'force_activation'		=> true,
			'force_deactivation'	=> true,
			'is_callable'			=> 'wpseo_init'
		)
	);
    $config = array(
		'id'		   => 'ai_tgmpa',
        'default_path' => '',                      
		'menu'         => 'tgmpa-install-plugins',
		'capability'   => 'edit_theme_options',
        'has_notices'  => true,                    
        'dismissable'  => false,                    
        'dismiss_msg'  => 'Necessary required plugins for complete theme usage and configuration',                      
        'is_automatic' => true,                   
        'message'      => '',                      
        'strings'      => array(
            'page_title' => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title' => __( 'Install Plugins', 'tgmpa' ),
            'installing' => __( 'Installing Plugin: %s', 'tgmpa' ), 
            'oops' => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required' => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), 
            'notice_can_install_recommended' => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), 
            'notice_cannot_install' => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), 
            'notice_can_activate_required' => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), 
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), 
            'notice_cannot_activate' => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), 
            'notice_ask_to_update' => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), 
            'notice_cannot_update' => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ),
            'install_link' => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link' => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return' => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated' => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'  => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), 
            'nag_type'  => 'updated' 
        )
    );
    tgmpa($plugins, $config);
}

function megamenu_add_theme_idaho_webmaster($themes) {
    $themes["idaho_webmaster"] = array(
        'title' => 'Idaho Webmaster',
        'container_background_from' => 'rgb(238, 238, 238)',
        'container_background_to' => 'rgb(238, 238, 238)',
        'menu_item_align' => 'center',
        'menu_item_link_color' => 'rgb(34, 34, 34)',
        'panel_header_border_color' => '#555',
        'panel_font_size' => '14px',
        'panel_font_color' => '#666',
        'panel_font_family' => 'inherit',
        'panel_second_level_font_color' => '#555',
        'panel_second_level_font_color_hover' => '#555',
        'panel_second_level_text_transform' => 'uppercase',
        'panel_second_level_font' => 'inherit',
        'panel_second_level_font_size' => '16px',
        'panel_second_level_font_weight' => 'bold',
        'panel_second_level_font_weight_hover' => 'bold',
        'panel_second_level_text_decoration' => 'none',
        'panel_second_level_text_decoration_hover' => 'none',
        'panel_second_level_border_color' => '#555',
        'panel_third_level_font_color' => '#666',
        'panel_third_level_font_color_hover' => '#666',
        'panel_third_level_font' => 'inherit',
        'panel_third_level_font_size' => '14px',
        'flyout_link_size' => '14px',
        'flyout_link_color' => '#666',
        'flyout_link_color_hover' => '#666',
        'flyout_link_family' => 'inherit',
        'toggle_background_from' => '#222',
        'toggle_background_to' => '#222',
        'mobile_background_from' => '#222',
        'mobile_background_to' => '#222',
        'mobile_menu_item_link_font_size' => '14px',
        'mobile_menu_item_link_color' => '#ffffff',
        'mobile_menu_item_link_text_align' => 'left',
        'mobile_menu_item_link_color_hover' => '#ffffff',
        'mobile_menu_item_background_hover_from' => '#333',
        'mobile_menu_item_background_hover_to' => '#333',
        'custom_css' => '/** Push menu onto new line **/ 
#{$wrap} { 
    clear: both; 
}',
    );
    return $themes;
}
add_filter("megamenu_themes", "megamenu_add_theme_idaho_webmaster");

function megamenu_override_default_theme($value) {
	if ( !isset($value['primary']['theme']) ) {
	  $value['primary']['theme'] = 'idaho_webmaster';
	}
	return $value;
  }
add_filter('default_option_megamenu_settings', 'megamenu_override_default_theme');

function remove_footer_admin() {
	echo '<span id="footer-thankyou">Developed by <a href="https://accessidaho.org" target="_blank">Access Idaho</a></span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

function disable_default_dashboard_widgets() {
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['tribe_dashboard_widget']);
}
add_action('wp_dashboard_setup', 'disable_default_dashboard_widgets');

function ai_dashboard_widget($post, $callback_args) {
	echo "<strong>Helpful links for your WordPress website:</strong><ul><li><a href='https://webmaster.idaho.gov/training/wordpress/' target='_blank'>WordPress Training</a></li><li><a href='http://webmaster.idaho.gov/wp-content/uploads/sites/60/2018/09/WordPress-User-Guide-compressed.pdf' target='_blank'>WordPress User Guide</a></li><li><a href='https://webmaster.idaho.gov' target='_blank'>State of Idaho Webmaster Resources</a></li><li><a href='https://wave.webaim.org/' target='_blank'>Web Accessibility Evaluation Tool</a></li></ul><p><u>Contact Access Idaho</u>:<br>(208) 332 - 0102<br>ask for Ashly or Richard<br><a href='mailto:creative@accessidaho.org'>creative@accessidaho.org</a></p>";
}
function ai_add_dashboard_widgets() {
	wp_add_dashboard_widget('dashboard_widget', 'Help & Support Info', 'ai_dashboard_widget');
}
add_action('wp_dashboard_setup', 'ai_add_dashboard_widgets');

add_action('init', 'ai_bs4_slider');
function ai_bs4_slider() {
	$labels = array(
		'name'			=> _x('Slider', 'post type general name'),
		'singular_name'	=> _x('Slide', 'post type singular name'),
		'menu_name'		=> _x('Slider', 'admin menu'),
		'name_admin_bar'=> _x('Slide', 'add new on admin bar'),
		'add_new'		=> _x('Add New', 'Slide'),
		'add_new_item'	=> __('Name'),
		'new_item'		=> __('New Slide'),
		'edit_item'		=> __('Edit Slide'),
		'view_item'		=> __('View Slide'),
		'all_items'		=> __('All Slides'),
		'featured_image'=> __('Featured Image', 'webmaster-bs4'),
		'search_items'	=> __('Search Slide'),
		'parent_item_colon'=>__('Parent Slide:'),
		'not_found'		=> __('No Slide found'),
		'not_found_in_trash'=>__('No Slide found in trash')
	);
	$args = array(
		'labels'		=> $labels,
		'menu_icon'		=> 'dashicons-star-half',
		'description'	=> __('Description'),
		'public'		=> true,
		'publicly_queryable' => true,
		'show_ui'		=> true,
		'show_in_menu'	=> true,
		'query_var'		=> true,
		'rewrite'		=> true,
		'capability_type'=> 'post',
		'has_archive'	=> true,
		'hierarchical'	=> true,
		'menu_position'	=> null,
		'supports'		=> array('title', 'editor', 'thumbnail')
	);
	register_post_type('slide', $args);
}