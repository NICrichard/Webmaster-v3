<?php
/**
 * Shortcode for displaying collapsable accordions.
 *
 */

$idaho_collapse_group_ID = (string) '';
add_shortcode('collapse', 'idaho_collapse_func');
/**
 * [collapse type="alert" title="Title" open="y || n"]
 */
function idaho_collapse_func($atts, $content = '') {
	global $idaho_collapse_group_ID;
	$collapse = (string) '';
	$params = (array) shortcode_atts(array(
		'type' 	=> 'default',
		'title' => 'Collapse',
		'open' 	=> 'false',
	), $atts);

	$uniqueID = (string) uniqid();
	$collapse .= sprintf('<div id="accordian"><div class="card %1$s" id="%2$s"><div class="card-header" role="tab" id="heading-%2$s"><h4 class="card-title"><button data-toggle="collapse" data-target="#collapse-%2$s" aria-expanded="%6$s" aria-controls="collapse-%2$s" class="btn btn-link no-icon-link">%4$s</button></h4></div><div id="collapse-%2$s" class="collapse %7$s" aria-labelledby="heading-%2$s" data-parent="#accordian"><div class="card-body">%5$s</div></div></div></div>',
		esc_attr('bg-'.$params['type']),
		esc_attr(sanitize_title($params['title'])),
		esc_attr($idaho_collapse_group_ID),
		esc_attr($params['title']),
		$content,
		esc_attr($params['open']),
		('true' === $params['open']) ? 'in' : ''
	);
	return $collapse;
};

add_shortcode('accordion', 'idaho_accordion_func');
/**
 * [collapse_group]
 */
function idaho_accordion_func($atts, $content) {
	global $idaho_collapse_group_ID;
	$idaho_collapse_group_ID = (string) 'accordion-'.uniqid();
	$group = (string) '';
	$group .= sprintf('<div class="card-group" id="%1$s" role="tablist" aria-multiselectable="true">%2$s</div>', esc_attr($idaho_collapse_group_ID), do_shortcode(remove_empty_p(shortcode_unautop($content))));
	return $group;
};
?>
