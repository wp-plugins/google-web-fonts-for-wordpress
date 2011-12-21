<?php

# Set array var with font options data

$default_fonts = array( 1 => 'Six Caps', 2 => 'Oswald', 3 => 'Prociono' );
$num = 0;	

while ( $num < 3 )	{
	$num++;
	$gwf[ $num ] = array( 
		'id' => 'gwf_font_' . $num,
		'default' => $default_fonts[ $num ],
		'saved' => get_theme_mod( 'gwf_font_' . $num ),
		'active' => get_theme_mod( 'gwf_font_' . $num . '_activated' )
	);
	
	$gwf_saved[ 'gwf_font_' . $num ] = get_theme_mod( 'gwf_font_' . $num );
	$gwf_saved[ 'gwf_font_' . $num . '_activated' ] = get_theme_mod( 'gwf_font_' . $num . '_activated' );
}
