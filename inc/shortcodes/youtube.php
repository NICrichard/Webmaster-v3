<?php
/**
 * Shortcode for displaying YouTube videos.
 */

add_shortcode('youtube', 'idaho_youtube_func');
function idaho_youtube_func($atts, $content = '') {
	$video = (string) '';
	$params = (array) shortcode_atts(array(
		'url' 		=> 'https://www.youtube.com/watch?v=DPBU2SOSC5c',
		'aspect' 	=> '16by9',
	), $atts);

	preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $params['url'], $matches);

	$video .= sprintf('<div class="embed-responsive embed-responsive-%1$s"><iframe class="embed-responsive-item" src="%2$s" allowfullscreen></iframe></div>',
		esc_attr($params['aspect']),
		esc_url('https://www.youtube.com/embed/' . $matches[0])
	);
	return $video;
};
