<?php
/**
 * David VG Theme Customizer
 *
 * @package David VG
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function david_vg_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'david_vg_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function david_vg_customize_preview_js() {
	wp_enqueue_script( 'david_vg_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'david_vg_customize_preview_js' );

// Add customizer features
add_action( 'customize_register', 'dvg_customize_register' );

function dvg_customize_register( WP_Customize_Manager $wp_customize ) {
	$wp_customize->add_section( 'head_element', array(
		'title' => __( '<head>', 'david-vg' ),
	) );
	$wp_customize->add_setting( 'add_to_head_element', array(
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'add_to_head_element_control',
		array(
			'label'    => __( 'Add content to <head> element', 'david-vg' ),
			'section'  => 'head_element',
			'settings' => 'add_to_head_element',
			'type'     => 'textarea',
		)
	) );
}