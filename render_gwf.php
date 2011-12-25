<?php
/*
Plugin Name: Google Web Fonts for WordPress
Plugin URI: http://jeffsebring.com/wordpress/plugins/google-web-fonts/
Description: Choose from any font in the Google Web Font Library for use in your theme's CSS.
Version: 2.0.1
Author: Jeff Sebring
Author URI: http://jeffsebring.com
License: GPLv2
*/

if ( ! is_admin() )	:
	
	# Enqueue active fonts
	include_once( 'includes/render_gwf_enqueue.php' );

elseif ( is_admin() )	:

	# Get options
	include( 'includes/render_gwf_get_options.php' );

	# Install / Uninstall actions
	include_once( 'includes/render_gwf_install.php' );
	register_activation_hook( __FILE__, 'render_gwf_activate' );
	register_deactivation_hook( __FILE__, 'render_gwf_activate' );

	# Enqueue fonts for preview on options page
	include_once( 'includes/render_gwf_admin_enqueue.php' );
	
	# Create options page in theme menu
	include_once( 'includes/render_gwf_menu.php' );

endif;

