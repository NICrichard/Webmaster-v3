<?php
/**
 * Import shorcode files from the shortcodes folder.
 */

require get_template_directory() . '/inc/shortcodes/collapse.php';
require get_template_directory() . '/inc/shortcodes/panel.php';
require get_template_directory() . '/inc/shortcodes/youtube.php';
require get_template_directory() . '/inc/shortcodes/vimeo.php';
require get_template_directory() . '/inc/shortcodes/blog-panel.php';
require get_template_directory() . '/inc/shortcodes/recent-posts.php';
require get_template_directory() . '/inc/shortcodes/iframe.php';

if (!function_exists('idaho_webmaster_add_shortcode_button')) :
	function idaho_webmaster_add_shortcode_button() {
		if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
			return;
		}
		if ('true' === get_user_option('rich_editing')) {
			add_filter('mce_buttons', 'idaho_webmaster_register_mce_shortcode_button');
		}
	}
endif;
add_action('admin_head', 'idaho_webmaster_add_shortcode_button', 20);

if (!function_exists('idaho_webmaster_add_tinymce_shortcode_plugin')) :
	function idaho_webmaster_add_tinymce_shortcode_plugin($plugin_array) {
		$plugin_array['idaho_mce_shortcode_button'] = get_template_directory_uri() . '/js/mce-shortcode-button.js';
		return $plugin_array;
	}
endif;
add_filter('mce_external_plugins', 'idaho_webmaster_add_tinymce_shortcode_plugin');

function idaho_webmaster_register_mce_shortcode_button($buttons) {
	array_push($buttons, 'idaho_mce_shortcode_button');
	return $buttons;
}
?>
