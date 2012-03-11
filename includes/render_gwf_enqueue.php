<?php

# Enqueue Selected and Enabled Fonts

if ( ! function_exists( 'render_gwf_enqueue' ) )	:

add_action( 'init', 'render_gwf_enqueue' );
function render_gwf_enqueue()	{

   $gwf_import = '';
   # Get options
   include( 'render_gwf_get_options.php' );

   # Loop through options and add only active fonts to string var.

   for ( $i = 1; $i <= 3; $i++ )	{

      if ( $gwf[ $i ][ 'active' ] == 'checked' )	:
         $gwf_import .= $gwf[ $i ][ 'saved' ] . '|';
      endif;

   }

   $gwf_import = rtrim( $gwf_import, '|' );
   if ( ! empty( $gwf_import ) )	:

      wp_register_style( 'google-web-fonts-front', 'http://fonts.googleapis.com/css?family=' . $gwf_import );
      wp_enqueue_style( 'google-web-fonts-front' );

   endif;
}

endif;

