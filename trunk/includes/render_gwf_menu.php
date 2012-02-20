<?php

# Create font selection page in themes menu

function render_gwf_menu()	{
	
	function render_saved_message()	{
		echo '<div class="updated fade"><p>Font options updated</p></div>';
	}
	
	global $gwf;
	global $gwf_saved;
   
   $render_fonts[ 1 ] = 'Logo';
   $render_fonts[ 2 ] = 'Headings';
   $render_fonts[ 3 ] = 'Text';

	include_once( 'render_gwf_api.php' );
	$font_list = get_google_fonts( 'alpha', 'AIzaSyCP1Zewk9Ba3XboLIjPWdzh6yXcxxxoNRE');
   $gwf_import = '';


   for ( $i = 1; $i <= 3; $i++ )	{
		$gwf_import .= $gwf[ $i ][ 'saved' ] . '|';
		$gwf_save[] = $gwf[ $i ][ 'id' ];
		$gwf_save[] = 'gwf_font_' . $i . '_activated';
	}
	$gwf_import = rtrim( $gwf_import, '|' );
   

	if ( $_GET['page'] == 'render_gwf' ) :
		if ( ! isset( $_REQUEST['submit'] ) || ( $_REQUEST['submit'] != 'Save Changes' ) )	:
         $submitted = null;
      else  :
			$submitted = $_REQUEST['submit'];
			check_admin_referer( 'render_gwf_admin' );
			add_action('render_updated', 'render_saved_message');
			foreach ( $gwf_save as $save )	{
				if ( empty( $_REQUEST[ $save ] ) )	:
					$_REQUEST[ $save ] = 'off';
				endif;
				$clean_save = esc_attr( $_REQUEST[ $save ] );
				set_theme_mod( $save, $clean_save ) ;
				
			}
		endif;
	endif;
?>
	
	<style>
	
		#gwf-logo	{
			background: transparent url( '<?php echo plugins_url(); ?>/google-web-fonts-for-wordpress/images/font_api-32.gif' ) no-repeat;
		}	
		
		.widefat th	{
			font-size: 1.5em;
			padding: .5em 1em;
			text-align: left;
		}
		
		.widefat td	{
			font-size: 1.5em;
			padding: 1em;
		}
		
		.gwf_enabled, .gwf_disabled	{
			right: 1.9em;
			position: absolute;
			float: right;
		}
		
		.gwf_enabled:before, .gwf_disabled:before	{
			font-size: 2em;
			right: 1.3em;
			position: absolute;
			float: left;
		}
		
		.gwf_enabled:before, .gwf_enabled:checked:hover:before, .gwf_disabled:hover:before	{
			color: #00af00;
			content: "\2714 ";
		}
		
		.gwf_disabled:before, .gwf_disabled:checked:hover:before, .gwf_enabled:hover:before 	{
			color: #af0000;
			content: "\2718 ";
		}
		
		.widefat .check-column label {
			float: right;
			padding: .5em 1em;
		}
		
		code	{
			display: block;
			font-size: .9em;
			background: #fff;
			padding: .4em;
			margin-top: .4em;
		}
		
		.widefat	{
		
			margin-top: 2em;
		
		}
	
	</style>

	<div class="wrap">
	<div class="icon32" id="gwf-logo"></div>
	<h2><?php echo __( 'Google Web Fonts Settings' ); ?></h2>
<?php do_action( 'render_updated' ); ?>	
	<form method="post">
		<legend><p>Import up to three of over 350 free fonts available from the <a target="_blank" href="http://www.google.com/webfonts">Google Web Font Directory</a>.</p><p>After saving your font selections, add the supplied properties to the desired elements in your theme's stylesheet.</p><?php if ( get_theme_mod( 'framework' ) == 'render' ) : echo '<strong style="color: #093EA2;">OOOhhh, You\'re using the <a style="color: #f00;" href="http://renderwp.com">Render Theme Framework</a>. We\'ll add your fonts automagically.</strong>'; endif; ?></legend>
		<?php wp_nonce_field( 'render_gwf_admin' ); ?>
		<table class="widefat" width="840px">
		  <col style="text-align:left" width="200px" />
		  <col style="text-align:left" width="200px" />
		  <col style="text-align:left" width="300px" />
		  <col style="text-align: left" width="115px" />
	  <thead>
		  <tr>
			  	<th><?php echo __( 'Select Fonts<br /><small>( save for preview )</small>' ); ?></th>
	  			<th><?php echo __( 'Saved Font Preview<br /><small>( click font for info )</small>' ); ?></th>
	  			<th><?php echo __( 'CSS Styles<br /><small>( add in theme stylesheet )</small>' ); ?></th>
				<th scope="row" class="check-column"><label><?php echo __( 'Enabled' ); ?> <input type="checkbox" name="check-all" /></label></th>
		  </tr>
	  </thead>
	  <tbody>
	  <?php
	  	
	  	for ( $num = 1; $num <= 3; $num++ )	{

	  		if ( 'Save Changes' == $submitted )	:
	  		
	  			$display_active = $_REQUEST[ 'gwf_font_' . $num . '_activated' ];
	  			$display_saved_font = $_REQUEST[ $gwf[ $num ][ 'id' ] ];
	  		
	  		else	:
	  			
	  			$display_active = $gwf[ $num ][ 'active' ];
	  			$display_saved_font = $gwf[ $num ][ 'saved' ];
	  		endif; 
	  		?>
	  		<tr>
	  		<td><?php if ( get_theme_mod( 'framework' ) == 'render' ) : echo '<strong style="display: block; margin-bottom: .5em;">' . $render_fonts[ $num ] . " Font</strong>"; endif; ?>
				<select name="<?php echo $gwf[ $num ][ 'id' ]; ?>" id="<?php echo $gwf[ $num ][ 'id' ]; ?>">
					<?php foreach ( $font_list as $font ) { ?>
						<option value="<?php echo $font; ?>"<?php if ( $display_saved_font === $font ) : echo ' selected'; endif; ?>><?php echo $font ; ?></option>
					<?php } ?>
				</select>
			</td>
	  		<td style="font-size: 2.5em; font-family: '<?php echo $display_saved_font; ?>'"><a target="_blank" title="Click for more info about <?php echo $display_saved_font; ?>" href="http://www.google.com/webfonts/specimen/<?php echo $display_saved_font; ?>"><?php echo $display_saved_font; ?></a></td>
			<td><code>font-family: '<?php echo $display_saved_font; ?>';</code></td>
	  		<td scope="row" class="check-column"><label><input class="<?php if ( $display_active == 'checked' ) : echo 'gwf_enabled'; else : echo 'gwf_disabled'; endif; ?>" type="checkbox" name="gwf_font_<?php echo $num; ?>_activated" value="checked"<?php if ( $display_active == 'checked' ) : echo ' checked'; endif; ?> /></label></td>
	  	</tr>
	  	<?php }
	  ?>
	  </tbody>
</table>
	<?php submit_button(); ?>
	</form>
	</div>
<?php
}

add_action( 'admin_menu', 'render_gwf_menu_page' );
function render_gwf_menu_page()	{

	add_theme_page( 'Google Web Fonts', 'Fonts', 'switch_themes', 'render_gwf', 'render_gwf_menu' );

}

