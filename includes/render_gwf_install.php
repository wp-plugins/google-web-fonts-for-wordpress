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
