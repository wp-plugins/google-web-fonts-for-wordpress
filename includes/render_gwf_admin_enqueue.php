<?php

# Enqueue fonts for admin preview

if ( ! function_exists( 'render_gwf_admin_enqueue' ) )	:

add_action( 'admin_init', 'render_gwf_admin_enqueue' );
function render_gwf_admin_enqueue()	{
	
	# Get global options var
	global $gwf;
   $gwf_import = '';
	
	# Loop through saved fonts and add to string var
   for ( $i = 1; $i <= 3; $i++ )	{
		$gwf_import .= $gwf[ $i ][ 'saved' ] . '|';
	}
	$gwf_import = rtrim( $gwf_import, '|' );
	if ( ! empty( $gwf_import ) )	:
	
		wp_register_style( 'google-web-fonts-admin', 'http://fonts.googleapis.com/css?family=' . $gwf_import );
		wp_enqueue_style( 'google-web-fonts-admin' );
		
	endif;

}

endif;

