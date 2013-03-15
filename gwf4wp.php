<?php
/*
Plugin Name: Google Web Fonts for WordPress
Plugin URI: http://jeffsebring.com/wordpress/plugins/google-web-fonts/
Description: Select Google Web Fonts from the Theme Customizer to be available for use in CSS
Version: 3.0
Author: Jeff Sebring
Author URI: http://jeffsebring.com
License: GPLv3
*/

$gwf4wp = new GWF4WP;
class GWF4WP
{

	/**
	 * Theme Mods
	 *
	 * @since 	qwf4wp 3.0
	 * @access	public
	 */
	public $mods = array();

	/**
	 * Saved Fonts
	 *
	 * @since 	qwf4wp 3.0
	 * @access	public
	 */
	public $fonts = array();

	public function __construct()
	{

		register_activation_hook( __FILE__, array( $this, 'activate' ) );

		$this->mods = get_theme_mods();

		if ( is_admin() ) add_action( 'customize_register', array( $this, 'customize' ) );
		else add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_fonts' ) );

	}

	/**
	 * Plugin Activation
	 *
	 * @since 	qwf4wp 3.0
	 * @access	public
	 */
	public function activate()
	{

		for ( $num = 1; $num <= 3; $num++ )
			remove_theme_mod( 'gwf_' . $num . '_activated' );

		remove_theme_mod( '_activated' ); #wtfwit

	}

	/**
	 * Enqueue fonts stylesheet
	 *
	 * @since 	qwf4wp 3.0
	 * @access	public
	 */
	public function enqueue_fonts()
	{

		$fonts= array();

		for ( $num = 1; $num <= 5; $num++ )
			if ( isset( $this->mods[ 'gwf_font_' . $num ] ) 
			&& $this->mods[ 'gwf_font_' . $num ] 
			&& $this->mods[ 'gwf_font_' . $num ] !== 'none' )
				$fonts[] = $this->mods[ 'gwf_font_' . $num ];

		empty( $fonts ) || wp_enqueue_style( 'gwf', 'http://fonts.googleapis.com/css?family=' . join( '%7C', $fonts ), '', '3.0' );

	}

	/**
	 * Customizer Settings
	 *
	 * @since 	qwf4wp 3.0
	 * @access	public
	 * @param 	object, wp_customizer
	 */
	public function customize( $wp_customize )
	{

		$font_list = get_transient( 'gwf4wp_list_' );

		if ( ! is_array( $font_list ) )
		 	$font_list = $this->_get_fonts();

		$wp_customize->add_section( 'gwf4wp', array(
			'title' => 'Google Fonts',
			'priority' => 35,
		) );

		for ( $num = 1; $num <= 5; $num++ ) :

			// Text color default
			$wp_customize->add_setting( 'gwf_font_' . $num, array(
				'default' => 'none',
				'transport' => 'postMessage',
				'capability' => 'edit_theme_options'
			) );

			// Text color control
			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'gwf_font_' . $num, array(
				'label' => 'Font ' . $num,
				'section' => 'gwf4wp',
				'type' => 'select',
				'choices' => $font_list,
				'settings' => 'gwf_font_' . $num,
				'priority' => $num
			) ) );

			$wp_customize->get_setting( 'gwf_font_' . $num )->transport = 'postMessage';

		endfor;

	}

	/**
	 * Get fonts and save transient
	 *
	 * @since 	qwf4wp 3.0
	 * @access	private
	 * @param 	mixed, array or null
	 */
	private function _get_fonts()
	{

		// $font_list = get_transient( 'gwf4wp_array_' );

		// if ( $font_list ) return $font_list;

		$raw = @wp_remote_get( 'https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyCP1Zewk9Ba3XboLIjPWdzh6yXcxxxoNRE&sort=alpha' );

		if ( ! isset( $raw ) ) return;

		$clean = @json_decode( $raw[ 'body' ] );

		$font_list[ 'none' ] = 'none';

		if ( is_object( $clean ) )
			foreach ( $clean->items as $item )
				$font_list[ str_replace( ' ',  '+', $item->family ) ] = $item->family;

		set_transient( 'gwf4wp_list_', $font_list, 60 * 60 * 24 );

		return $font_list;
	
	}

}