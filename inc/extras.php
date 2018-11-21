<?php
function idaho_webmaster_body_classes($classes) {
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