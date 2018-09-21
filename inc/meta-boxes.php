<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 */

require_once 'cmb-field-gallery/cmb-field-gallery.php';

function idaho_webmaster_page_metabox() {
	$prefix = '_idaho_';
	$menu_options = array(
		'none' => 'None'
	);
	$menus = wp_get_nav_menus();
	foreach($menus as $menu){
		$menu_options[$menu->slug] = $menu->name;
	} 
	
	$idaho_meta_box = new_cmb2_box(array(
		'id'            => $prefix . 'metabox',
		'title'         => __('Page Options', 'webmaster-bs4'),
		'object_types'  => array('page'),
	));

	$idaho_meta_box->add_field(array(
		'name' => __('Menu Override', 'webmaster-bs4' ),
		'desc' => __( 'Select a menu you wish to display.', 'webmaster-bs4' ),
		'id'   => $prefix . 'override_nav',
		'type' => 'select',
		'options' => $menu_options
	) );
	
	$idaho_meta_box->add_field( array(
		'name' => __( 'Description', 'webmaster-bs4' ),
		'desc' => __( 'Type a custom description for the page.', 'webmaster-bs4' ),
		'id'   => $prefix . 'description',
		'type' => 'textarea',
	) );

	$idaho_meta_box->add_field( array(
		'name' => __( 'Page Title', 'webmaster-bs4' ),
		'desc' => __( 'Disable the title on page.', 'webmaster-bs4' ),
		'id'   => $prefix . 'page_title',
		'type' => 'checkbox',
	) );

	$idaho_meta_box->add_field( array(
		'name' => __( 'Breadcrumbs', 'webmaster-bs4' ),
		'desc' => __( 'Disable breadcrumbs on page.', 'webmaster-bs4' ),
		'id'   => $prefix . 'breadcrumbs',
		'type' => 'checkbox',
	) );

	/*
	$idaho_meta_box->add_field( array(
		'name' => __( 'Carousel', 'webmaster-bs4' ),
		'desc' => __( 'Enable carousel on this page.', 'webmaster-bs4' ),
		'id'   => $prefix . 'enable_carousel',
		'type' => 'checkbox',
	) );

	$idaho_meta_box->add_field( array(
		'name' => 'Carousel Images',
		'desc' => 'Upload and manage carousel images',
		'button' => 'Manage carousel',
		'id'   => $prefix . 'carousel_images',
		'type' => 'pw_gallery',
		'sanitization_cb' => 'pw_gallery_field_sanitise',
	) );
	*/

}
add_action('cmb2_admin_init', 'idaho_webmaster_page_metabox');
?>
