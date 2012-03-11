<?php

# Set array var with font options data

$default_fonts = array( 1 => 'Six Caps', 2 => 'Oswald', 3 => 'Prociono' );


for ( $i = 1; $i <= 3; $i++ )	{
	$gwf[ $i ] = array( 
		'id' => 'gwf_font_' . $i,
		'default' => $default_fonts[ $i ],
		'saved' => get_theme_mod( 'gwf_font_' . $i ),
		'active' => get_theme_mod( 'gwf_font_' . $i . '_activated' )
	);
	
	$gwf_saved[ 'gwf_font_' . $i ] = get_theme_mod( 'gwf_font_' . $i );
	$gwf_saved[ 'gwf_font_' . $i . '_activated' ] = get_theme_mod( 'gwf_font_' . $i . '_activated' );
}
