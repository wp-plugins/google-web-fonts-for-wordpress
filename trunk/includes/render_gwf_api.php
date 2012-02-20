<?php
/**
 * Google Web Fonts
 * Get Google Web Fonts json object and save as transient.
 * @version 1.0.0
 */

# Include json functions
if ( ! function_exists( 'json_response' ) )
	require_once( 'json.php' );

if ( ! function_exists( 'get_google_fonts' ) )	:

function get_google_fonts( $sort, $api_key )	{
	
	# Store current font list from set transient			
	$font_list = get_transient( 'rwp_google_fonts_' . $sort );
	
	# Set the transient from the Developer API if it's empty
	if ( false === $font_list )	:
	
		$gwf_uri = "https://www.googleapis.com/webfonts/v1/webfonts?key=" . $api_key . "&sort=" . $sort;
		$gwf_raw = json_response( $gwf_uri );
		
		foreach ( $gwf_raw->items as $font ) {
	
			$font_list[] .= $font->family;
		
		}
		
		set_transient( 'gwf_raw_' . $sort, $font_list, 60 * 60 * 24 );

	endif;

	# Return the saved lit of Google Web Fonts
	return $font_list;

}

endif;
