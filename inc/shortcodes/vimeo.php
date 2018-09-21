<?php
/**
 * Shortcode for displaying YouTube videos.
 *
 */

add_shortcode('vimeo', 'idaho_vimeo_func');
function idaho_vimeo_func($atts, $content = '') {
	$video = (string) '';

	$params = (array) shortcode_atts( array(
		'url' 		=> 'https://www.youtube.com/watch?v=DPBU2SOSC5c',
		'aspect' 	=> '16by9',
	), $atts);

	preg_match("/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/", $params['url'], $matches);

  if (count($matches) === 6) {
    $video .= sprintf('<div class="embed-responsive embed-responsive-%1$s"><iframe class="embed-responsive-item" src="%2$s" allowfullscreen></iframe></div>',
  		esc_attr($params['aspect']),
  		esc_url('https://player.vimeo.com/video/' . $matches[5])
  	);
  }
	return $video;
};
