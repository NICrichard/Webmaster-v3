<?php
add_shortcode('iframe', 'idaho_iframe_func');
function idaho_iframe_func($atts, $content = '') {
	$video = (string) '';
	$params = (array) shortcode_atts(array(
		'url' 		=> 'https://www.youtube.com/watch?v=DPBU2SOSC5c',
		'aspect' 	=> '16by9',
	), $atts);

	$video .= sprintf('<iframe src="%2$s" allowfullscreen class="iframe"></iframe>',
		esc_attr($params['aspect']),
		esc_url($params['url'])
	);
	return $video;
};