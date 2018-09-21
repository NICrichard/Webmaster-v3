<?php
/**
 * Adds in style formats to tinyMCE.
 *
 */

if (!function_exists('idaho_webmaster_mce_styleselect')) :
	function idaho_webmaster_mce_styleselect( $buttons ) {
		array_unshift( $buttons, 'styleselect' );
		return $buttons;
	}
endif;
add_filter( 'mce_buttons_2', 'idaho_webmaster_mce_styleselect');

if (!function_exists('idaho_webmaster_mce_style_formats')) :
	function idaho_webmaster_mce_style_formats( $init_array ) {
		// Define the style_formats array.
		$style_formats = array(
			// Each array child is a format with it's own settings.
			array(
				'title' => 'Notice',
				'block' => 'div',
				'classes' => 'alert',
				'wrapper' => true,
			),
			array(
				'title' => 'Notice (Info)',
				'block' => 'div',
				'classes' => 'alert alert-info',
				'wrapper' => true,
			),
			array(
				'title' => 'Notice (Success)',
				'block' => 'div',
				'classes' => 'alert alert-success',
				'wrapper' => true,
			),
			array(
				'title' => 'Notice (Danger)',
				'block' => 'div',
				'classes' => 'alert alert-danger',
				'wrapper' => true,
			),
			array(
				'title' => 'Notice (Warning)',
				'block' => 'div',
				'classes' => 'alert alert-warning',
				'wrapper' => true,
			),
			array(
				'title' => 'Button (Default)',
				'selector' => 'a',
				'attributes' => array(
					'class' => 'btn btn-secondary',
				),
			),
			array(
				'title' => 'Button (Primary)',
				'selector' => 'a',
				'attributes' => array(
					'class' => 'btn btn-primary',
				),
			),
			array(
				'title' => 'Button (Info)',
				'selector' => 'a',
				'attributes' => array(
					'class' => 'btn btn-info',
				),
			),
			array(
				'title' => 'Button (Success)',
				'selector' => 'a',
				'attributes' => array(
					'class' => 'btn btn-success',
				),
			),
			array(
				'title' => 'Button (Danger)',
				'selector' => 'a',
				'attributes' => array(
					'class' => 'btn btn-danger',
				),
			),
			array(
				'title' => 'Button (Large)',
				'selector' => 'a',
				'classes' => 'btn btn-lg',
			),
			array(
				'title' => 'Button (Block)',
				'selector' => 'a',
				'classes' => 'btn btn-block',
			),
			array(
				'title' => 'List Group',
				'block' => 'div',
				'classes' => 'list-group',
				'wrapper' => true,
			),
			array(
				'title' => 'List Group Item',
				'selector' => 'a',
				'classes' => 'list-group-item-action',
			),
		);

		$init_array['style_formats'] = wp_json_encode( $style_formats );
		return $init_array;
	}
endif;
add_filter( 'tiny_mce_before_init', 'idaho_webmaster_mce_style_formats' );
?>
