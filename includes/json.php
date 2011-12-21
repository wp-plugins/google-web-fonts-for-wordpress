<?php
/**
 * Response JSON 	
 * Get json date from url and decode.
 */
 
# Get the WordPress json parser

if ( ! function_exists( 'json_parser' ) )	:
	
	# Get the WordPress json parser
	
	add_action('wp_print_scripts', 'json_parser');
	function json_parser()	{
		wp_enqueue_script('json2');
	}

endif;

// Return Parsed json from url
if ( ! function_exists( 'json_response' ) )	:

function json_response( $url )	{
	

	# Parse the given url
	$raw = file_get_contents( $url, 0, null, null );
	$decoded = json_decode( $raw );
	
	return $decoded;
	
}

endif;
