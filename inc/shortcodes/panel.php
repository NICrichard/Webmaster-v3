<?php
/**
 * Shortcode for displaying panels.
 *
 */

add_shortcode('panel', 'idaho_panel_func');
function idaho_panel_func($atts, $content = '') {
	$panel = (string) '';
	$params = (array) shortcode_atts(array(
		'type' 	=> 'default',
		'title' => 'Panel',
	), $atts);
	$panel .= sprintf('<div class="card %1$s"><div class="card-header"><h4 class="card-title">%2$s</h4></div><div class="card-body">%3$s</div></div>',
		esc_attr('cardl-'.$params['type']),
		esc_attr($params['title']),
		do_shortcode(remove_empty_p(shortcode_unautop($content)))
	);
	return $panel;
};
