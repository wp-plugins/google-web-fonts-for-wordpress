<?php

# Set default settings with theme mods on plugin activation

if ( ! function_exists( 'render_gwf_activate' ) )	:

function render_gwf_activate()	{
	
	global $gwf;
	$num = 0;
  	while ( $num < 4 )	{
  		$num++;

		set_theme_mod( $gwf[ $num ][ 'id' ], $gwf[ $num ][ 'default' ] );
		set_theme_mod( $gwf[ $num ][ 'id' ] . '_activated', 'off' );

	}
}

endif;

# Remove default settings from theme mods on plugin deactivation

if ( ! function_exists( 'render_gwf_deactivate' ) )	:

function render_gwf_deactivate()	{
	
	global $gwf;
	$num = 0;
  	while ( $num < 4 )	{
  		$num++;

		remove_theme_mod( $gwf[ $num ][ 'id' ] );
		remove_theme_mod( $gwf[ $num ][ 'id' ] . '_activated' );

	}
}

endif;
