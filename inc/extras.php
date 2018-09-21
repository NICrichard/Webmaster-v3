<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Adds custom classes to the array of body classes.
 *
 */
function idaho_webmaster_body_classes($classes) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if (is_multi_author()) {
		$classes[] = 'group-blog';
	}
	return $classes;
}
add_filter('body_class', 'idaho_webmaster_body_classes');

function idaho_upload_mimes ($existing_mimes=array()) {
	$existing_mimes['svg'] = 'image/svg+xml';
	return $existing_mimes;
}
add_filter('upload_mimes', 'idaho_upload_mimes');