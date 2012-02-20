<?php

# Loop through Google Web Fonts list and return selection options

if ( ! function_exists( 'gwf_select_font' ) )	:

function gwf_select_font( $id )	{
	global $gwf_saved;
	$font_list = get_google_fonts( 'alpha', 'AIzaSyCP1Zewk9Ba3XboLIjPWdzh6yXcxxxoNRE');
 ?>
	<select name="<?php echo $id ?>" id="<?php echo $id ?>">
		<?php foreach ( $font_list as $font ) { ?>
			<option value="<?php echo $font; ?>"<?php if ( $gwf_saved[ $id ] === $font ) : echo ' selected'; endif; ?>><?php echo $font ; ?></option>
		<?php } ?>
	</select>	
<?php }

endif;
