<?php
include_once('color.php');

function idaho_webmaster_customize_register($wp_customize) {
	$theme_dir = get_template_directory_uri() . '/img/social-img.jpg';
	$color_scheme = idaho_webmaster_get_color_scheme();
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
	$wp_customize->remove_control('background_repeat');
	$wp_customize->remove_control('background_attachment');

	$wp_customize->add_section('idaho_logo_section', array(
		'title'       	=> __('Logo', 'webmaster-bs4'),
		'priority'    	=> 30,
		'capability' 	=> 'edit_theme_options',
		'description' 	=> 'Upload a logo to replace the default.',
	));

	$wp_customize->add_setting('idaho_logo', array(
		'default' 			=> get_template_directory_uri() . '/img/logo.svg',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'idaho_logo', array(
		'label'    		=> __('Logo', 'webmaster-bs4'),
		'section'  		=> 'idaho_logo_section',
		'capability' 	=> 'edit_theme_options',
		'settings' 		=> 'idaho_logo',
	)));

	$wp_customize->add_setting('idaho_logo_retina', array(
		'default' 			=> get_template_directory_uri() . '/img/logo.svg',
		'capability' 		=> 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'idaho_logo_retina', array(
		'label'    => __('Retina Logo', 'webmaster-bs4'),
		'section'  => 'idaho_logo_section',
		'settings' => 'idaho_logo_retina',
	)));

	$wp_customize->add_section('idaho_social_media', array(
		'title'	=> __('Social Media', 'webmaster-bs4'),
		'description' => __('Leaving a field empty will disable the social media icon on your website.', 'webmaster-bs4'),
	));

	$wp_customize->add_setting('idaho_fb', array(
		'default'		=> '',
		'capability'	=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_text_field',
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'idaho_fb', array(
		'label'			=> __('Facebook ID', 'webmaster-bs4'),
		'description'	=> __('Your Facebook ID is the part following https://facebook.com/', 'webmaster-bs4'),
		'section'		=> 'idaho_social_media',
		'settings'		=> 'idaho_fb',
		'type'			=> 'text',
	)));

	$wp_customize->add_setting('idaho_twitter', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_text_field',
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'idaho_twitter', array(
		'label'			=> __('Twitter Handle', 'webmaster-bs4'),
		'description'	=> __('Your Twitter handle is the part begining with an @ symbol', 'webmaster-bs4'),
		'section'		=> 'idaho_social_media',
		'settings'		=> 'idaho_twitter',
		'type'			=> 'text',
	)));

	$wp_customize->add_setting('idaho_instagram', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_text_field',
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'idaho_instagram', array(
		'label'			=> __('Instagram User ID', 'webmaster-bs4'),
		'description'	=> __('Your Instagram User ID is the part following https://instagram.com/', 'webmaster-bs4'),
		'section'		=> 'idaho_social_media',
		'settings'		=> 'idaho_instagram',
		'type'			=> 'text',
	)));

	$wp_customize->add_setting('idaho_flickr', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_text_field',
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'idaho_flickr', array(
		'label'			=> __('Flickr ID', 'webmaster-bs4'),
		'description'	=> __('Your Flickr ID is the part following https://flickr.com/photos/', 'webmaster-bs4'),
		'section'		=> 'idaho_social_media',
		'settings'		=> 'idaho_flickr',
		'type'			=> 'text',
	)));

	/* 
	$wp_customize->add_setting('idaho_googleplus', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_text_field',
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'idaho_googleplus', array(
		'label'			=> __('Google+ Username', 'webmaster-bs4'),
		'description'	=> __('Your Google+ username is the part beginning with the + symbol.', 'webmaster-bs4'),
		'section'		=> 'idaho_social_media',
		'settings'		=> 'idaho_googleplus',
		'type'			=> 'text',
	)));
*/
	$wp_customize->add_setting('idaho_youtube', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_text_field',
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'idaho_youtube', array(
		'label'			=> __('YouTube ID', 'webmaster-bs4'),
		'section'		=> 'idaho_social_media',
		'settings'		=> 'idaho_youtube',
		'type'			=> 'text',
	)));

	$wp_customize->add_setting('idaho_feed', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'idaho_feed', array(
		'label'			=> __('RSS Feed', 'webmaster-bs4'),
		'description'	=> __('Tick the box to turn on RSS feed availability.', 'webmaster-bs4'),
		'section'		=> 'idaho_social_media',
		'settings'		=> 'idaho_feed',
		'type'			=> 'checkbox',
	)));

	$wp_customize->add_setting('idaho_email', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_text_field',
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'idaho_email', array(
		'label'			=> __('Contact eMail Icon', 'webmaster-bs4'),
		'description'	=> __('Enter the eMail address that is the main contact for your agency.', 'webmaster-bs4'),
		'section'		=> 'idaho_social_media',
		'settings'		=> 'idaho_email',
		'type'			=> 'text',
	)));

	$wp_customize->add_setting('idaho_site_desc', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_text_field',
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'idaho_site_desc', array(
		'label'			=> __('Website Summary Description', 'webmaster-bs4'),
		'description'	=> __('This summary text will help showcase your website accurately to social media.', 'webmaster-bs4'),
		'section'		=> 'idaho_social_media',
		'settings'		=> 'idaho_site_desc',
		'type'			=> 'textarea',
	)));

	$wp_customize->add_setting('idaho_site_img', array(
		'default'		=> $theme_dir,
		'capability'	=> 'edit_theme_options',
	));

	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'idaho_site_img', array(
		'label'			=> __('Social Media Image', 'webmaster-bs4'),
		'description'	=> __('A visual image that is shown with your social media share. Max size is 1200 x 900.', 'webmaster-bs4'),
		'section'		=> 'idaho_social_media',
		'settings'		=> 'idaho_site_img',
		'context'		=> 'my-custom-social-media-image',
		'flex_height'	=> false,
		'width'			=> 1200,
		'height'		=> 900,
	)));

	$wp_customize->add_section('idaho_settings', array(
		'title' => __('Settings', 'webmaster-bs4'),
	));

  	$wp_customize->add_setting('idaho_google_analytics', array(
		'default' 			=> '',
		'capability'  		=> 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'idaho_google_analytics', array(
		'label'       	=> __('Google Analytics ID', 'webmaster-bs4'),
		'description'	=> __('Helps track your site\'s visitors using Google Analytics', 'webmaster-bs4' ),
		'section'     	=> 'idaho_settings',
		'settings'    	=> 'idaho_google_analytics',
		'type'        	=> 'text',
	)));

	$wp_customize->add_setting('idaho_gcs_id', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_text_field',
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'idaho_gcs_id', array(
		'label'			=> __('Google Custom Search ID', 'webmaster-bs4'),
		'description'	=> __('For search box to work you need a GCS ID', 'webmaster-bs4'),
		'section'		=> 'idaho_settings',
		'settings'		=> 'idaho_gcs_id',
		'type'			=> 'text',
	)));

	/*
	$wp_customize->add_setting('idaho_header_layout', array(
		'default'        	=> 'overmedium',
		'capability'     	=> 'update_core',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('idaho_header_layout', array(
		'settings' 		=> 'idaho_header_layout',
		'label'   		=> __('Header Layout', 'webmaster-bs4' ),
		'description' 	=> __('There are 4 options for headers. Each one goes alongside the IDAHO Logo', 'webmaster-bs4'),
		'section' 		=> 'idaho_settings',
		'type'    		=> 'select',
		'choices'    	=> array(
			'large' 		=> 'One Large Line',
			'overmedium' 	=> 'Small line over a medium line',
			'oversmall' 	=> 'Medium line over a small line',
			'medium' 		=> 'Two medium lines',
		),
	));
*/

	$wp_customize->add_setting('idaho_footer_layout', array(
		'default'       	=> '5col',
		'capability'     	=> 'update_core',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('idaho_footer_layout', array(
		'settings' 		=> 'idaho_footer_layout',
		'label'   		=> __('Footer Layout', 'webmaster-bs4'),
		'description' 	=> __('This determines the footer layout at the bottom of the page', 'webmaster-bs4' ),
		'section' 		=> 'idaho_settings',
		'type'    		=> 'select',
		'choices'    	=> array(
			'5col' 	=> 'Three column footer',
			'2col'	=> 'Two column footer',
		),
	));

	$wp_customize->add_setting('idaho_black_logo', array(
		'default'   		=> false,
		'capability'  		=> 'update_core',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('idaho_black_logo', array(
		'settings' 		=> 'idaho_black_logo',
		'label'    		=> __('Use Black Logo', 'webmaster-bs4'),
		'description' 	=> __('Switches the idaho logo from white to black.', 'webmaster-bs4'),
		'section'  		=> 'idaho_settings',
		'type'     		=> 'checkbox',
	));

	$wp_customize->add_setting('idaho_search_header', array(
    	'default'   		=> false,
		'capability'  		=> 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('idaho_search_header', array(
    	'settings' 		=> 'idaho_search_header',
		'label'    		=> __('Disable search field', 'webmaster-bs4'),
		'description' 	=> __('This will hide the search field in the header on every page.', 'webmaster-bs4'),
    	'section'  		=> 'idaho_settings',
		'type'     		=> 'checkbox',
	));

	$wp_customize->add_setting('color_scheme', array(
		'default'           => 'default',
		'sanitize_callback' => 'idaho_webmaster_sanitize_color_scheme',
		'capability'		=> 'update_core',
		'transport'         => 'postMessage',
	));

	$wp_customize->add_control('color_scheme', array(
		'label'    => __('Base Color Scheme', 'webmaster-bs4'),
		'section'  => 'colors',
		'type'     => 'select',
		'choices'  => idaho_webmaster_get_color_scheme_choices(),
		'priority' => 1,
	));

	$wp_customize->add_setting('idaho_color_link', array(
		'default' 			=> $color_scheme[0], 
		'capability'  		=> 'update_core',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'   		=> 'postMessage',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'idaho_color_link', array(
		'label' 	=> __('Link Color', 'webmaster-bs4' ),
		'section' 	=> 'colors',
		'settings' 	=> 'idaho_color_link',
	)));

	$wp_customize->add_setting('idaho_color_light_blue', array(
		'default' 			=> $color_scheme[1], 
		'capability'  		=> 'update_core',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'   		=> 'postMessage',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'idaho_color_light_blue', array(
		'label' 	=> __('U.S. Map Color', 'webmaster-bs4'),
		'section' 	=> 'colors',
		'settings' 	=> 'idaho_color_light_blue',
	)));

	$wp_customize->add_setting('idaho_color_ui_blue', array(
		'default' 			=> $color_scheme[2], 
		'capability'  		=> 'update_core',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'   		=> 'postMessage',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'idaho_color_ui_blue', array(
		'label' 	=> __('Footer Background Color', 'webmaster-bs4'),
		'section' 	=> 'colors',
		'settings' 	=> 'idaho_color_ui_blue',
	)));

	$wp_customize->add_setting('idaho_color_secondary', array(
		'default' 			=> $color_scheme[3], 
		'capability'  		=> 'update_core',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'   		=> 'postMessage',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'idaho_color_secondary', array(
		'label' 	=> __('Page Heading Color', 'webmaster-bs4'),
		'section' 	=> 'colors',
		'settings' 	=> 'idaho_color_secondary',
	)));

	$wp_customize->add_setting('idaho_color_home_panel', array(
		'default' 			=> $color_scheme[4], 
		'capability'  		=> 'update_core',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'   		=> 'postMessage',
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'idaho_color_home_panel', array(
		'label' 	=> __('Home Panel Color', 'webmaster-bs4'),
		'section' 	=> 'colors',
		'settings' 	=> 'idaho_color_home_panel',
	)));
}
add_action('customize_register', 'idaho_webmaster_customize_register');

function idaho_webmaster_get_color_schemes() {
	return apply_filters('idaho_webmaster_color_schemes', array(
		'default' => array(
			'label'  => __('Classic', 'webmaster-bs4'),
			'colors' => array(
				'#007ea7', // Link
				'#789dbf', // USA Map
				'#003459', // Footer Background
				'#000000', // Heading 2
				'#a9a9a9', // Home Panel
			),
		),
		'modern' => array(
			'label'  => __('Modern', 'webmaster-bs4'),
			'colors' => array(
				'#0c7e97', // Link
				'#f9f9f9', // USA Map
				'#0c7e97', // Footer Background
				'#fe924c', // Heading 2
				'#a9a9a9', // Home Panel
			),
		),
		'nature' => array(
			'label'  => __('Nature', 'webmaster-bs4'),
			'colors' => array(
				'#0c7e97', // Link
				'#a9c8b8', // USA Map
				'#31865c', // Footer 
				'#000000', // Heading 2
				'#b1cdd3', // Home Panel
			),
		),
	));
}

if (!function_exists('idaho_webmaster_get_color_scheme')) {
	function idaho_webmaster_get_color_scheme() {
		$color_scheme_option = get_theme_mod('color_scheme', 'default');
		$color_schemes       = idaho_webmaster_get_color_schemes();
		if (array_key_exists($color_scheme_option, $color_schemes)) {
			return $color_schemes[$color_scheme_option]['colors'];
		}
		return $color_schemes['default']['colors'];
	}
}

if (!function_exists('idaho_webmaster_get_color_scheme_choices')) {
	function idaho_webmaster_get_color_scheme_choices() {
		$color_schemes = idaho_webmaster_get_color_schemes();
		$color_scheme_control_options = array();
		foreach ($color_schemes as $color_scheme => $value) {
			$color_scheme_control_options[$color_scheme] = $value['label'];
		}
		return $color_scheme_control_options;
	}
}

if (!function_exists('idaho_webmaster_sanitize_color_scheme')) {
	function idaho_webmaster_sanitize_color_scheme($value) {
		$color_schemes = idaho_webmaster_get_color_scheme_choices();
		if (!array_key_exists($value, $color_schemes)) {
			return 'default';
		}
		return $value;
	}
}

function idaho_webmaster_color_scheme_css() {
	$color_scheme_option = get_theme_mod('color_scheme', 'default');
	if ('default' === $color_scheme_option) {
		return;
	}
	$color_scheme = idaho_webmaster_get_color_scheme();
	$colors = array(
		'idaho_color_link'      	=> $color_scheme[0], 
		'idaho_color_light_blue'  	=> $color_scheme[1], 
		'idaho_color_ui_blue'  		=> $color_scheme[2], 
		'idaho_color_secondary'  	=> $color_scheme[3], 
		'idaho_color_home_panel'  	=> $color_scheme[4],
	);
	$color_scheme_css = idaho_webmaster_get_color_scheme_css($colors);
	wp_add_inline_style('webmaster-bs4-style', $color_scheme_css);
}
add_action('wp_enqueue_scripts', 'idaho_webmaster_color_scheme_css');

function idaho_webmaster_customize_control_js() {
	wp_enqueue_script('color-scheme-control', get_template_directory_uri() . '/js/color-scheme-control.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util'));
	wp_localize_script('color-scheme-control', 'colorScheme', idaho_webmaster_get_color_schemes());
}
add_action('customize_controls_enqueue_scripts', 'idaho_webmaster_customize_control_js');

function idaho_webmaster_customize_preview_js() {
	wp_enqueue_script('idaho_webmaster_customizer_jss', get_template_directory_uri() . '/js/jss.min.js');
	wp_enqueue_script('idaho_webmaster_customizer_tinycolor', get_template_directory_uri() . '/js/tinycolor-min.js');
	wp_enqueue_script('idaho_webmaster_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'idaho_webmaster_customizer_jss', 'customize-preview'));
}
add_action('customize_preview_init', 'idaho_webmaster_customize_preview_js');

function idaho_webmaster_shift_hsl_to($color, $original) {
	$color_hsl = Color::hexToHsl($color);
	$original_hsl = Color::hexToHsl($original);
	$color_hsl['S'] = $original_hsl['S'];
	$color_hsl['L'] = $original_hsl['L'];
	return '#' . Color::hslToHex($color_hsl);
}

function idaho_webmaster_get_color_scheme_css($colors) {
	$colors = wp_parse_args($colors, array(
		'idaho_color_link'      	=> '',
		'idaho_color_light_blue'  	=> '',
		'idaho_color_ui_blue'  		=> '',
		'idaho_color_secondary'  	=> '',
		'idaho_color_home_panel'  	=> '',
	));
	
	$colors['idaho_color_ui_blue_shadow'] 	= idaho_webmaster_adjust_brightness($colors['idaho_color_ui_blue'], -50);

	return "/* Color Scheme */
	.pagination>li>a, a:hover, .pagination>li>a, .link, a {
		color: {$colors['idaho_color_link']};
	}
	.site-footer {
		background: {$colors['idaho_color_ui_blue']};
	}
	.site-footer h3 {
		border-bottom: 1px solid {$font_colors['idaho_color_ui_blue']};
		/* box-shadow: 0 1px 0 {$colors['idaho_color_ui_blue_shadow']}; */
		color: {$font_colors['idaho_color_ui_blue']};
	}
	.site-footer a {
		color: {$footer_links};
	}
	.site-footer a:hover {
		color: {$font_colors['idaho_color_ui_blue']};
	}
	h1.entry-title {
		color: {$colors['idaho_color_secondary']};
	}
	.panel.panel-default.alt .panel-heading {
		background: {$colors['idaho_color_home_panel']};
		border-color: {$colors['idaho_color_home_panel']};
		color: {$font_colors['idaho_color_home_panel']};
	}
	.panel.panel-default.alt {
		border-color: {$colors['idaho_color_home_panel']};
	}";
}

function idaho_webmaster_color_scheme_css_template() {
	$colors = array(
		'idaho_color_link'      	=> '{{ data.idaho_color_link }}',
		'idaho_color_light_blue'  	=> '{{ data.idaho_color_light_blue }}',
		'idaho_color_ui_blue'  		=> '{{ data.idaho_color_ui_blue }}',
		'idaho_color_secondary'  	=> '{{ data.idaho_color_secondary }}',
		'idaho_color_home_panel'  	=> '{{ data.idaho_color_home_panel }}',
	);
	?>
	<script type="text/html" id="tmpl-webmaster-bs4-color-scheme">
		<?php echo idaho_webmaster_get_color_scheme_css($colors); ?>
	</script>
	<?php
}
add_action('customize_controls_print_footer_scripts', 'idaho_webmaster_color_scheme_css_template');

function idaho_webmaster_check_color($color) {
	$color_index = array('idaho_color_link', 'idaho_color_light_blue', 'idaho_color_ui_blue', 'idaho_color_secondary', 'idaho_color_home_panel');
	$color_scheme    = idaho_webmaster_get_color_scheme();
	$default_color   = $color_scheme[array_search($color, $color_index)];
	$theme_color 	 = get_theme_mod($color, $default_color);

	if (strtolower($theme_color) === strtolower($default_color)) {
		return false;
	} else {
		return $theme_color;
	}
}

function idaho_webmaster_idaho_color_link_css() {
	$color = idaho_webmaster_check_color('idaho_color_link');
	if (!$color) {
		return;
	}
	$css = 'a,
		.navbar-default .navbar-nav>li>a,
		.pagination>li>a,
		a:hover,
		.pagination>li>a {
			color: %1$s;
		}
	';
	wp_add_inline_style('webmaster-bs4-style', sprintf($css,$color));
}
add_action('wp_enqueue_scripts', 'idaho_webmaster_idaho_color_link_css', 11);

function idaho_webmaster_idaho_color_ui_blue_css() {
	$color = idaho_webmaster_check_color('idaho_color_ui_blue');
	if (!$color) {
		return;
	}

	$css = '.site-footer {
			background: %1$s;
		}
		#masthead .site-branding {
			border-bottom-color: %1$s;
		}
		.site-footer h3 {
			border-bottom: 1px solid %3$s;
			box-shadow: 0 1px 0 %2$s;
			color: %3$s;
		}
		.site-footer a {
			color: %4$s;
		}
		.site-footer a:hover {
			color: %3$s;
		}';
	wp_add_inline_style('webmaster-bs4-style', sprintf($css, $color, idaho_webmaster_b_or_w($color), idaho_webmaster_b_or_w($color), $footer_links));
}
add_action('wp_enqueue_scripts', 'idaho_webmaster_idaho_color_ui_blue_css', 11);

function idaho_webmaster_idaho_color_light_blue_css() {
	$color = idaho_webmaster_check_color('idaho_color_light_blue');
	if (!$color) {
		return;
	}
	$css = '';
	wp_add_inline_style('webmaster-bs4-style', sprintf($css, $color, idaho_webmaster_b_or_w($color)));
}
add_action('wp_enqueue_scripts', 'idaho_webmaster_idaho_color_light_blue_css', 11);

function idaho_webmaster_idaho_color_secondary_css() {
	$color = idaho_webmaster_check_color('idaho_color_secondary');
	if (!$color) {
		return;
	}
	$css = 'h2,
		h1.entry-title {
			color: %1$s;
		}';
	wp_add_inline_style('webmaster-bs4-style', sprintf($css, $color));
}
add_action('wp_enqueue_scripts', 'idaho_webmaster_idaho_color_secondary_css', 11);

function idaho_webmaster_idaho_color_home_panel_css() {
	$color = idaho_webmaster_check_color('idaho_color_home_panel');
	if (!$color) {
		return;
	}
	$css = '.panel.panel-default.alt .panel-heading {
			background: %1$s;
			border-color: %1$s;
			color: %2$s;
		}

		.panel.panel-default.alt {
			border-color: %1$s;
		}';
	wp_add_inline_style('webmaster-bs4-style', sprintf($css, $color, idaho_webmaster_b_or_w($color)));
}
add_action('wp_enqueue_scripts', 'idaho_webmaster_idaho_color_home_panel_css', 11);
