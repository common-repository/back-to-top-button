<?php
/*
* Plugin Name: Back To Top Button
* Plugin URI: https://seosthemes.com/wp-back-to-top-button/
* Description: Simple WordPress Back To Top Plugin.
* Contributors: seosbg
* Author: seosbg
* Author URI: https://seosthemes.com/
* Version: 1.5
* License: GPL2
*/

add_action('admin_menu', 'seos_back_to_top_menu');
function seos_back_to_top_menu() {
    add_menu_page('Back To Top Button', 'Back To Top Button', 'administrator', 'seos-back-to-top-settings', 'seos_back_to_top_settings_page', plugins_url('back-to-top-button/images/icon.png')
    );

    add_action('admin_init', 'seos_register_back_to_top_settings');
}

add_action('admin_enqueue_scripts', 'seos_load_back_to_top_admin_scripts');

function seos_load_back_to_top_admin_scripts(){
 
    wp_enqueue_script('jquery');

	wp_enqueue_media();
	
	wp_enqueue_style( 'farbtastic' );
	
    wp_enqueue_script( 'farbtastic' );
	
	wp_register_style('back_to_top_style', plugin_dir_url(__FILE__) . '/css/style.css');
	wp_enqueue_style('back_to_top_style');
	
	wp_register_script('back_to_top_script_load', plugin_dir_url(__FILE__) . '/js/admin.js', array(), '', true );
	wp_enqueue_script('back_to_top_script_load');
}


function seos_register_back_to_top_settings() {
    register_setting('seos-back-to-top-settings', 'back_to_top_background_color');
    register_setting('seos-back-to-top-settings', 'back_to_top_button_color');
    register_setting('seos-back-to-top-settings', 'back_to_top_button_speed');
    register_setting('seos-back-to-top-settings', 'back_to_top_button_radius');
    register_setting('seos-back-to-top-settings', 'back_to_top_option_position');
    register_setting('seos-back-to-top-settings', 'back_to_top_button_load1');
    register_setting('seos-back-to-top-settings', 'back_to_top_button_opacity');
    register_setting('seos-back-to-top-settings', 'back_to_top_button_width');
    register_setting('seos-back-to-top-settings', 'back_to_top_button_height');
    register_setting('seos-back-to-top-settings', 'back_to_top_button_font_size');
    register_setting('seos-back-to-top-settings', 'back_to_top_button_position_right');
    register_setting('seos-back-to-top-settings', 'back_to_top_button_position_left');
    register_setting('seos-back-to-top-settings', 'back_to_top_button_position_bottom');
}
add_action('wp_enqueue_scripts', 'seos_load_back_to_top_wp_scripts');

function seos_load_back_to_top_wp_scripts(){
 
    wp_enqueue_script('jquery');


		wp_register_style('seosslider-fontawesome', plugin_dir_url(__FILE__) . '/css/font-awesome.min.css');
		wp_enqueue_style('seosslider-fontawesome');
}

function seos_back_to_top_settings_page() {
?>

    <div class="wrap back-to-top-botton">

        <form action="options.php" method="post" role="form" name="back-to-top-botton-form">
		
			<?php settings_fields( 'seos-back-to-top-settings' ); ?>
			<?php do_settings_sections( 'seos-back-to-top-settings' ); ?>
		
			<div>
				<a target="_blank" href="http://seosthemes.com/">
					<div class="btn s-red">
						 <?php _e('SEOS', 'back-to-top-button'); echo ' <img class="ss-logo" src="' . plugins_url( 'images/logo.png' , __FILE__ ) . '" alt="logo" />';  _e(' THEMES', 'back-to-top-button'); ?>
					</div>
				</a>
			</div>
			<a target="_blank" href="https://seosthemes.com/wp-back-to-top-button/">Help us to create free plugins. <img style="margin-top:20px;" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif"></a>		
			<h1><?php _e('Back To Top Button', 'back-to-top-button'); ?></h1>
			<?php for ($i = 1; $i < 3; $i++) { ?>
				<script>
					jQuery(document).ready(function($) {
						$('#colorpicker<?php echo $i; ?>').hide();
						$('#colorpicker<?php echo $i; ?>').farbtastic('#color<?php echo $i; ?>');

						$('#color<?php echo $i; ?>').click(function() {
							$('#colorpicker<?php echo $i; ?>').fadeIn();
						});

						$(document).mousedown(function() {
							$('#colorpicker<?php echo $i; ?>').each(function() {
								var display = $(this).css('display');
								if ( display == 'block' )
									$(this).fadeOut();
							});
						});
					});
				</script>
			<?php } ?>
			
			<!-- ------------------- Activate Speed ------------------ -->
										
			<div class="form-group">
				<label><?php _e('Activate: ', 'back-to-top-button'); ?></label>
				<?php $button_round = get_option( 'back_to_top_button_speed' ); ?>
				<select name="back_to_top_button_speed">
					<option value="" selected="selected"> </option>
					<option value="100" <?php if ( $button_round == "100" ) echo 'selected="selected"'; ?>>Speed 100</option>
					<option value="150" <?php if ( $button_round == "150" ) echo 'selected="selected"'; ?>>Speed 150</option>
					<option value="200" <?php if ( $button_round == "200" ) echo 'selected="selected"'; ?>>Speed 200</option>
					<option value="250" <?php if ( $button_round == "250" ) echo 'selected="selected"'; ?>>Speed 250</option>
					<option value="300" <?php if ( $button_round == "300" ) echo 'selected="selected"'; ?>>Speed 300</option>
					<option value="350" <?php if ( $button_round == "350" ) echo 'selected="selected"'; ?>>Speed 350</option>
					<option value="400" <?php if ( $button_round == "400" ) echo 'selected="selected"'; ?>>Speed 400</option>
					<option value="450" <?php if ( $button_round == "450" ) echo 'selected="selected"'; ?>>Speed 450</option>
					<option value="500" <?php if ( $button_round == "500" ) echo 'selected="selected"'; ?>>Speed 500</option>
					<option value="550" <?php if ( $button_round == "550" ) echo 'selected="selected"'; ?>>Speed 550</option>
					<option value="600" <?php if ( $button_round == "600" ) echo 'selected="selected"'; ?>>Speed 600</option>
					<option value="650" <?php if ( $button_round == "650" ) echo 'selected="selected"'; ?>>Speed 650</option>
					<option value="700" <?php if ( $button_round == "700" ) echo 'selected="selected"'; ?>>Speed 700</option>
					<option value="750" <?php if ( $button_round == "750" ) echo 'selected="selected"'; ?>>Speed 750</option>
					<option value="800" <?php if ( $button_round == "800" ) echo 'selected="selected"'; ?>>Speed 800</option>
					<option value="850" <?php if ( $button_round == "850" ) echo 'selected="selected"'; ?>>Speed 850</option>
					<option value="900" <?php if ( $button_round == "900" ) echo 'selected="selected"'; ?>>Speed 900</option>
					<option value="950" <?php if ( $button_round == "900" ) echo 'selected="selected"'; ?>>Speed 950</option>
					<option value="1000" <?php if ( $button_round == "1000" ) echo 'selected="selected"'; ?>>Speed 1000</option>
					<option value="2000" <?php if ( $button_round == "2000" ) echo 'selected="selected"'; ?>>Speed 2000</option>
					<option value="3000" <?php if ( $button_round == "3000" ) echo 'selected="selected"'; ?>>Speed 3000</option>
					<option value="4000" <?php if ( $button_round == "4000" ) echo 'selected="selected"'; ?>>Speed 4000</option>
					<option value="5000" <?php if ( $button_round == "5000" ) echo 'selected="selected"'; ?>>Speed 5000</option>
					<option value="6000" <?php if ( $button_round == "6000" ) echo 'selected="selected"'; ?>>Speed 6000</option>
					<option value="7000" <?php if ( $button_round == "7000" ) echo 'selected="selected"'; ?>>Speed 7000</option>
					<option value="8000" <?php if ( $button_round == "8000" ) echo 'selected="selected"'; ?>>Speed 8000</option>
					<option value="9000" <?php if ( $button_round == "9000" ) echo 'selected="selected"'; ?>>Speed 9000</option>
					<option value="10000" <?php if ( $button_round == "10000" ) echo 'selected="selected"'; ?>>Speed 10000</option>
				</select>
			</div>
			<hr />				
			<!-- ------------------- Position  ------------------ -->
										
			<div class="form-group">
				<span class="inline">
					<p><?php _e('Position Left:', 'back-to-top-button'); ?> <input name="back_to_top_option_position" type="radio" value="1" <?php checked( '1', get_option( 'back_to_top_option_position' ) ); ?> /></p>
				</span>				
				<span class="inline">
					<p><?php _e('Position Right:', 'back-to-top-button'); ?> <input name="back_to_top_option_position" type="radio" value="2" <?php checked( '2', get_option( 'back_to_top_option_position' ) ); ?> /></p>
				</span>
				<span class="inline">
					<p><?php _e('Position Center:', 'back-to-top-button'); ?> <input name="back_to_top_option_position" type="radio" value="3" <?php checked( '3', get_option( 'back_to_top_option_position' ) ); ?> /></p>
				</span>
			</div>	
			<br />
			<hr />			
		
			<!-- ------------------- Border Radius ------------------ -->
										
			<div class="form-group">
				<label><?php _e('Border Radius: ', 'back-to-top-button'); ?></label>
					<input style="width: 50px; "type="text" name="back_to_top_button_radius"value="<?php echo esc_html(get_option( 'back_to_top_button_radius')); ?>"/>px
			</div>
			<hr />
			<!-- ------------------- Opacity ------------------ -->
										
			<div class="form-group">
				<label><?php _e('Transparent : ', 'back-to-top-button'); ?></label>
				<?php $opacity = get_option( 'back_to_top_button_opacity' ); ?>
				<select name="back_to_top_button_opacity">
					<option value="" selected="selected"> none</option>
					<option value="0.1" <?php if ( $opacity == "0.1" ) echo 'selected="selected"'; ?>><?php _e('0.1', 'back-to-top-button'); ?></option>
					<option value="0.2" <?php if ( $opacity == "0.2" ) echo 'selected="selected"'; ?>><?php _e('0.2', 'back-to-top-button'); ?></option>
					<option value="0.3" <?php if ( $opacity == "0.3" ) echo 'selected="selected"'; ?>><?php _e('0.3', 'back-to-top-button'); ?></option>
					<option value="0.4" <?php if ( $opacity == "0.4" ) echo 'selected="selected"'; ?>><?php _e('0.4', 'back-to-top-button'); ?></option>
					<option value="0.5" <?php if ( $opacity == "0.5" ) echo 'selected="selected"'; ?>><?php _e('0.5', 'back-to-top-button'); ?></option>
					<option value="0.6" <?php if ( $opacity == "0.6" ) echo 'selected="selected"'; ?>><?php _e('0.6', 'back-to-top-button'); ?></option>
					<option value="0.7" <?php if ( $opacity == "0.7" ) echo 'selected="selected"'; ?>><?php _e('0.7', 'back-to-top-button'); ?></option>
					<option value="0.8" <?php if ( $opacity == "0.8" ) echo 'selected="selected"'; ?>><?php _e('0.8', 'back-to-top-button'); ?></option>
					<option value="0.9" <?php if ( $opacity == "0.9" ) echo 'selected="selected"'; ?>><?php _e('0.9', 'back-to-top-button'); ?></option>
				</select>
			</div>
			<hr />				
						
			<!-- ------------------- Background Color ------------------ -->
										
			<div class="form-group">
				<label><?php _e('Background Color: ', 'back-to-top-button'); ?></label>
				<div class="color-picker" style="position: relative;">
					<input placeholder="Set Color" class="form-control" style="width: 100px;" type="text" name="back_to_top_background_color" id="color1" value="<?php if (esc_html(get_option( 'back_to_top_background_color'))) : echo esc_html(get_option( 'back_to_top_background_color')); else : echo "Set Color"; endif; ?>"/>
					<div style="position: absolute; z-index: 999; background: #fff; border: 1px solid #C0C0C0;" id="colorpicker1"></div>
				</div>
			</div>
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />			
			<br />			
			<hr />				
			<!-- ------------------- Button Color ------------------ -->
										
			<div class="form-group">
				<label><?php _e('Button Color: ', 'back-to-top-button'); ?></label>
				<div class="color-picker" style="position: relative;">
					<input placeholder="Set Color" class="form-control" style="width: 100px;" type="text" name="back_to_top_button_color" id="color2" value="<?php if (esc_html(get_option( 'back_to_top_button_color'))) : echo esc_html(get_option( 'back_to_top_button_color')); else : echo "Set Color"; endif; ?>"/>
					<div style="position: absolute; z-index: 999; background: #fff; border: 1px solid #C0C0C0;" id="colorpicker2"></div>
				</div>
			</div>			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />			
			<br />	
			<hr />

			<!-- ------------------- Button Width ------------------ -->
										
			<div class="form-group">
				<label><?php _e('Button Width: ', 'back-to-top-button'); ?></label>
					<input style="width: 50px;" type="text" name="back_to_top_button_width" value="<?php echo esc_html(get_option( 'back_to_top_button_width')); ?>"/>px
			</div>
			<!-- ------------------- Button Height ------------------ -->
										
			<div class="form-group">
				<label><?php _e('Button Height: ', 'back-to-top-button'); ?></label>
					<input style="width: 50px;" type="text" name="back_to_top_button_height" value="<?php echo esc_html(get_option( 'back_to_top_button_height')); ?>"/>px
			</div>
			<!-- ------------------- Font Size ------------------ -->
										
			<div class="form-group">
				<label><?php _e('Font Size: ', 'back-to-top-button'); ?></label>
					<input style="width: 50px;" type="text" name="back_to_top_button_font_size" value="<?php echo esc_html(get_option( 'back_to_top_button_font_size')); ?>"/>px
			</div>
			
			<!-- ------------------- Margin Left ------------------ -->
										
			<div class="form-group">
				<label><?php _e('Margin Left : ', 'back-to-top-button'); ?></label>
				<input style="width: 50px;" type="text" name="back_to_top_button_position_left" value="<?php echo esc_html(get_option( 'back_to_top_button_position_left')); ?>"/>px
			</div>		

			<!-- ------------------- Margin Right ------------------ -->
										
			<div class="form-group">
				<label><?php _e('Margin Right : ', 'back-to-top-button'); ?></label>
					<input style="width: 50px;" type="text" name="back_to_top_button_position_right" value="<?php echo esc_html(get_option( 'back_to_top_button_position_right')); ?>"/>px
			</div>
			
			<!-- ------------------- Margin Bottom ------------------ -->
										
			<div class="form-group">
				<label><?php _e('Margin Bottom : ', 'back-to-top-button'); ?></label>
					<input style="width: 50px;" type="text" name="back_to_top_button_position_bottom" value="<?php echo esc_html(get_option( 'back_to_top_button_position_bottom')); ?>"/>px
			</div>
			<br />
			<br />
			<br />
			<br />
			<br />
		    <div style="margin-top: 20px;"><?php submit_button(); ?></div>	
			<hr />		
									
			<!-- ------------------- Load Icon ------------------ -->
										
			<div class="form-group">
				<label><?php _e('Load Icon width 45px: ', 'back-to-top-button'); ?></label>
				
					<input type="text" name="back_to_top_button_load1" size="50" value="<?php echo esc_html(get_option( 'back_to_top_button_load1' )); ?>" />
					<a class="upload_image_button" data-id="1" href="#" title="Select image" style="text-decoration: none;">
						<img src="<?php echo plugin_dir_url(__FILE__) . '/images/find-img.png' ?>" style="width:20px;height:20px;">
					</a>
					<a class="slider_remove_img" data-id="1" href="#" title="Remove image" <?php if(!esc_html(get_option( 'back_to_top_button_load1' ))){ echo 'style="display:none;text-decoration:none;"'; } ?>>
						<img src="<?php echo plugin_dir_url(__FILE__) . '/images/remove.png' ?>" style="width:20px;height:20px;">
					</a>
					<!--<input type="file" name="slider_file_img1" class="slider_file_img" />-->
				<img id="load_img1" src="<?php echo esc_html(get_option( 'back_to_top_button_load1' )) ; ?>" alt="Slider1" <?php if(!esc_html(get_option( 'back_to_top_button_load1' ))){ echo 'style="display:none;"'; } ?>>
				
			
			</div>
			<div class="form-group bttb-images">
			
			<p class="bttb-radio">
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/1btb.png'; ?>" <?php checked( '1', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/1btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 1) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
			
			<p class="bttb-radio">		
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/2btb.png'; ?>" <?php checked( '2', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/2btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 2) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
			
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/3btb.png'; ?>" <?php checked( '3', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/3btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 3) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
						
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/4btb.png'; ?>" <?php checked( '4', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/4btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 4) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
									
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/5btb.png'; ?>" <?php checked( '5', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/5btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 5) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
									
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/6btb.png'; ?>" <?php checked( '6', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/6btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 6) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
									
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/7btb.png'; ?>" <?php checked( '7', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/7btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 7) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
									
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/8btb.png'; ?>" <?php checked( '8', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/8btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 8) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
									
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/9btb.png'; ?>" <?php checked( '9', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/9btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 9) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
									
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/10btb.png'; ?>" <?php checked( '10', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/10btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 10) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/11btb.png'; ?>" <?php checked( '11', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/11btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 11) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/12btb.png'; ?>" <?php checked( '12', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/12btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 12) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/13btb.png'; ?>" <?php checked( '13', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/13btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 13) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/14btb.png'; ?>" <?php checked( '14', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/14btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 14) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/15btb.png'; ?>" <?php checked( '15', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/15btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 15) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/16btb.png'; ?>" <?php checked( '16', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/16btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 16) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/17btb.png'; ?>" <?php checked( '17', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/17btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 17) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/18btb.png'; ?>" <?php checked( '18', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/18btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 18) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/19btb.png'; ?>" <?php checked( '19', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/19btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 19) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/20btb.png'; ?>" <?php checked( '20', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/20btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 20) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/21btb.png'; ?>" <?php checked( '21', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/21btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 21) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/22btb.png'; ?>" <?php checked( '22', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/22btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 22) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/23btb.png'; ?>" <?php checked( '23', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/23btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 23) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/24btb.png'; ?>" <?php checked( '24', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/24btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 24) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/25btb.png'; ?>" <?php checked( '25', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/25btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 25) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/26btb.png'; ?>" <?php checked( '26', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/26btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 26) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/27btb.png'; ?>" <?php checked( '27', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/27btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 27) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/28btb.png'; ?>" <?php checked( '28', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/28btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 28) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/29btb.png'; ?>" <?php checked( '29', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/29btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 29) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/30btb.png'; ?>" <?php checked( '30', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/30btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 30) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/31btb.png'; ?>" <?php checked( '31', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/31btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 31) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/32btb.png'; ?>" <?php checked( '32', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/32btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 32) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/33btb.png'; ?>" <?php checked( '33', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/33btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 33) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/34btb.png'; ?>" <?php checked( '34', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/34btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 34) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/35btb.png'; ?>" <?php checked( '35', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/35btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 35) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/36btb.png'; ?>" <?php checked( '36', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/36btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 36) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/37btb.png'; ?>" <?php checked( '37', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/37btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 37) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/38btb.png'; ?>" <?php checked( '38', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/38btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 38) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/39btb.png'; ?>" <?php checked( '39', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/39btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 39) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/40btb.png'; ?>" <?php checked( '40', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/40btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 40) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/41btb.png'; ?>" <?php checked( '41', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/41btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 41) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/42btb.png'; ?>" <?php checked( '42', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/42btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 42) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/43btb.png'; ?>" <?php checked( '43', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/43btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 43) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/44btb.png'; ?>" <?php checked( '44', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/44btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 44) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/45btb.png'; ?>" <?php checked( '45', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/45btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 45) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/46btb.png'; ?>" <?php checked( '46', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/46btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 46) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/47btb.png'; ?>" <?php checked( '47', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/47btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 47) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/48btb.png'; ?>" <?php checked( '48', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/48btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 48) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/49btb.png'; ?>" <?php checked( '49', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/49btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 49) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/50btb.png'; ?>" <?php checked( '50', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/50btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 50) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/51btb.png'; ?>" <?php checked( '51', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/51btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 51) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/52btb.png'; ?>" <?php checked( '52', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/52btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 52) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/53btb.png'; ?>" <?php checked( '53', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/53btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 53) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/54btb.png'; ?>" <?php checked( '54', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/54btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 54) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/55btb.png'; ?>" <?php checked( '55', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/55btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 55) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/56btb.png'; ?>" <?php checked( '56', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/56btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 56) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/57btb.png'; ?>" <?php checked( '57', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/57btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 57) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/58btb.png'; ?>" <?php checked( '58', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/58btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 58) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/59btb.png'; ?>" <?php checked( '59', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/59btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 59) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/60btb.png'; ?>" <?php checked( '60', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/60btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 60) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/61btb.png'; ?>" <?php checked( '61', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/61btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 61) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/62btb.png'; ?>" <?php checked( '62', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/62btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 62) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/63btb.png'; ?>" <?php checked( '63', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/63btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 63) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/64btb.png'; ?>" <?php checked( '64', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/64btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 64) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/65btb.png'; ?>" <?php checked( '65', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/65btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 65) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/66btb.png'; ?>" <?php checked( '66', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/66btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 66) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/67btb.png'; ?>" <?php checked( '67', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/67btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 67) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/68btb.png'; ?>" <?php checked( '68', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/68btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 68) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/69btb.png'; ?>" <?php checked( '69', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/69btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 69) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/70btb.png'; ?>" <?php checked( '70', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/70btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 70) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/71btb.png'; ?>" <?php checked( '71', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/71btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 71) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/72btb.png'; ?>" <?php checked( '72', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/72btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 72) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/73btb.png'; ?>" <?php checked( '73', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/73btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 73) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/74btb.png'; ?>" <?php checked( '74', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/74btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 74) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/75btb.png'; ?>" <?php checked( '75', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/75btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 75) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/76btb.png'; ?>" <?php checked( '76', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/76btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 76) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/77btb.png'; ?>" <?php checked( '77', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/77btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 77) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/78btb.png'; ?>" <?php checked( '78', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/78btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 78) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/79btb.png'; ?>" <?php checked( '79', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/79btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 79) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/80btb.png'; ?>" <?php checked( '80', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/80btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 80) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/81btb.png'; ?>" <?php checked( '81', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/81btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 81) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/82btb.png'; ?>" <?php checked( '82', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/82btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 82) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/83btb.png'; ?>" <?php checked( '83', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/83btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 83) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/84btb.png'; ?>" <?php checked( '84', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/84btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 84) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/85btb.png'; ?>" <?php checked( '85', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/85btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 85) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/86btb.png'; ?>" <?php checked( '86', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/86btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 86) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/87btb.png'; ?>" <?php checked( '87', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/87btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 87) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/88btb.png'; ?>" <?php checked( '88', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/88btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 88) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/89btb.png'; ?>" <?php checked( '89', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/89btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 89) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/90btb.png'; ?>" <?php checked( '90', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/90btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 90) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/91btb.png'; ?>" <?php checked( '91', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/91btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 91) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/92btb.png'; ?>" <?php checked( '92', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/92btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 92) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/93btb.png'; ?>" <?php checked( '93', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/93btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 93) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/94btb.png'; ?>" <?php checked( '94', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/94btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 94) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/95btb.png'; ?>" <?php checked( '95', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/95btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 95) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/96btb.png'; ?>" <?php checked( '96', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/96btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 96) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/97btb.png'; ?>" <?php checked( '97', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/97btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 97) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/98btb.png'; ?>" <?php checked( '98', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/98btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 98) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/99btb.png'; ?>" <?php checked( '99', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/99btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 99) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/100btb.png'; ?>" <?php checked( '100', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/100btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 100) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/101btb.png'; ?>" <?php checked( '101', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/101btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 101) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
									
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/102btb.png'; ?>" <?php checked( '102', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/102btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 102) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/103btb.png'; ?>" <?php checked( '103', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/103btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 103) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/104btb.png'; ?>" <?php checked( '104', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/104btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 104) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/105btb.png'; ?>" <?php checked( '105', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/105btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 105) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/106btb.png'; ?>" <?php checked( '106', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/106btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 106) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/107btb.png'; ?>" <?php checked( '107', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/107btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 107) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/108btb.png'; ?>" <?php checked( '108', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/108btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 108) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/109btb.png'; ?>" <?php checked( '109', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/109btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 109) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/110btb.png'; ?>" <?php checked( '110', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/110btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 110) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/111btb.png'; ?>" <?php checked( '111', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/111btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 111) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/112btb.png'; ?>" <?php checked( '112', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/112btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 112) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/113btb.png'; ?>" <?php checked( '113', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/113btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 113) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/114btb.png'; ?>" <?php checked( '114', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/114btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 114) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/115btb.png'; ?>" <?php checked( '115', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/115btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 115) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/116btb.png'; ?>" <?php checked( '116', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/116btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 116) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/117btb.png'; ?>" <?php checked( '117', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/117btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 117) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/118btb.png'; ?>" <?php checked( '118', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/118btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 118) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/119btb.png'; ?>" <?php checked( '119', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/119btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 119) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/120btb.png'; ?>" <?php checked( '120', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/120btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 120) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/121btb.png'; ?>" <?php checked( '121', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/121btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 121) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/122btb.png'; ?>" <?php checked( '122', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/122btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 122) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/123btb.png'; ?>" <?php checked( '123', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/123btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 123) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/124btb.png'; ?>" <?php checked( '124', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/124btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 124) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/125btb.png'; ?>" <?php checked( '125', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/125btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 125) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/126btb.png'; ?>" <?php checked( '126', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/126btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 126) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/127btb.png'; ?>" <?php checked( '127', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/127btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 127) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/128btb.png'; ?>" <?php checked( '128', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/128btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 128) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/129btb.png'; ?>" <?php checked( '129', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/129btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 129) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/130btb.png'; ?>" <?php checked( '130', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/130btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 130) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/131btb.png'; ?>" <?php checked( '131', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/131btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 131) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/132btb.png'; ?>" <?php checked( '132', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/132btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 132) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/133btb.png'; ?>" <?php checked( '133', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/133btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 133) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/134btb.png'; ?>" <?php checked( '134', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/134btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 134) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/135btb.png'; ?>" <?php checked( '135', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/135btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 135) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/136btb.png'; ?>" <?php checked( '136', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/136btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 136) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/137btb.png'; ?>" <?php checked( '137', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/137btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 137) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/138btb.png'; ?>" <?php checked( '138', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/138btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 138) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/139btb.png'; ?>" <?php checked( '139', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/139btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 139) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/140btb.png'; ?>" <?php checked( '140', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/140btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 140) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/141btb.png'; ?>" <?php checked( '141', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/141btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 141) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/142btb.png'; ?>" <?php checked( '142', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/142btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 142) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/143btb.png'; ?>" <?php checked( '143', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/143btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 143) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/144btb.png'; ?>" <?php checked( '144', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/144btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 144) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/145btb.png'; ?>" <?php checked( '145', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/145btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 145) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/146btb.png'; ?>" <?php checked( '146', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/146btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 146) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/147btb.png'; ?>" <?php checked( '147', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/147btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 147) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/148btb.png'; ?>" <?php checked( '148', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/148btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 148) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/149btb.png'; ?>" <?php checked( '149', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/149btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 149) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/150btb.png'; ?>" <?php checked( '150', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/150btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 150) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/151btb.png'; ?>" <?php checked( '151', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/151btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 151) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/152btb.png'; ?>" <?php checked( '152', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/152btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 152) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/153btb.png'; ?>" <?php checked( '153', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/153btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 153) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/154btb.png'; ?>" <?php checked( '154', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/154btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 154) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/155btb.png'; ?>" <?php checked( '155', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/155btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 155) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/156btb.png'; ?>" <?php checked( '156', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/156btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 156) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/157btb.png'; ?>" <?php checked( '157', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/157btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 157) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/158btb.png'; ?>" <?php checked( '158', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/158btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 158) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/159btb.png'; ?>" <?php checked( '159', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/159btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 159) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
													
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/160btb.png'; ?>" <?php checked( '160', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/160btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 160) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/161btb.png'; ?>" <?php checked( '161', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/161btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 161) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/162btb.png'; ?>" <?php checked( '162', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/162btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 162) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/163btb.png'; ?>" <?php checked( '163', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/163btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 163) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/164btb.png'; ?>" <?php checked( '164', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/164btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 164) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/165btb.png'; ?>" <?php checked( '165', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/165btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 165) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/166btb.png'; ?>" <?php checked( '166', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/166btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 166) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/167btb.png'; ?>" <?php checked( '167', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/167btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 167) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/168btb.png'; ?>" <?php checked( '168', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/168btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 168) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/169btb.png'; ?>" <?php checked( '169', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/169btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 169) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/170btb.png'; ?>" <?php checked( '170', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/170btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 170) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
												
			<p class="bttb-radio">			
				<input name="back_to_top_button_load1" type="radio" value="<?php echo plugin_dir_url(__FILE__) . '/images/171btb.png'; ?>" <?php checked( '171', get_option( 'back_to_top_button_load1' ) ); ?> />
				<img src="<?php echo plugin_dir_url(__FILE__) . '/images/171btb.png'; ?>">
				<?php if(get_option('back_to_top_button_load1') == 171) : ?><img src="<?php echo get_option( 'back_to_top_button_load1' ); ?>"> <?php endif; ?>
			</p>
																																																																																																																																																		
			</div>
			<hr />	
		<div class="back_to_top"></div>
		<div style="margin-top: 20px;"><?php submit_button(); ?></div>
			
		</form>	
	</div>
	
	<?php } 
	
	function seos_back_to_top_button_language_load() {
	  load_plugin_textdomain('seos_back_to_top_button_language_load', FALSE, basename(dirname(__FILE__)) . '/languages');
	}
	add_action('init', 'seos_back_to_top_button_language_load');
	
	/************************** CSS Code ****************************/

	function seos_back_to_top_button_options_css() { ?>
			<style type="text/css">
			
				<?php if(esc_html(get_option( 'back_to_top_background_color' ))) : ?> #totop { background: <?php echo esc_html(get_option( 'back_to_top_background_color' )); ?> !important;}<?php endif; ?>
				<?php if(esc_html(get_option( 'back_to_top_button_color' ))) : ?> #totop { color: <?php echo esc_html(get_option( 'back_to_top_button_color' )); ?> !important;}<?php endif; ?>

			</style>
		<?php
		}

	add_action('wp_head', 'seos_back_to_top_button_options_css'); 
	
	function admin_seos_back_to_top_button_options_css() { ?>	
			<style type="text/css">
				.back_to_top {
					width: 100%;
					display: block;
					clear: both;
				}
				
			</style>
	<?php } add_action('admin_head', 'admin_seos_back_to_top_button_options_css'); 

/*****************  Position ******************/

	if (get_option( "back_to_top_option_position" ) == 1) : 
	function back_to_top_position() { ?>	
			<style type="text/css">
				#totop {
					left: 40px !important;
				}
				
			</style>
	<?php } add_action('wp_head', 'back_to_top_position'); 	endif;

	if (get_option( "back_to_top_option_position" ) == 2) : 
	function back_to_top_position() { ?>	
			<style type="text/css">
				#totop {
					right: 40px !important;
				}
				
			</style>
	<?php } add_action('wp_head', 'back_to_top_position'); 	endif;
	
	if (get_option( "back_to_top_option_position" ) == 3) : 
	function back_to_top_position() { ?>	
			<style type="text/css">
				#totop {
					right: 48.23% !important;
					left: 48.23% !important;
				}
				
			</style>
	<?php } add_action('wp_head', 'back_to_top_position'); 	endif;

/*****************  Back to Top Function ******************/


    add_action( 'wp_footer', 'seos_to_top_button' );		
function seos_to_top_button() { ?>
    <?php if(!get_option( 'back_to_top_button_load1')): ?>
		<a id="totop" href="#">
			<i class="fa fa-chevron-up"></i>
		</a>
		<?php else : ?>
		<a id="totop" href="#">^</a>		
		<?php endif;?>
    <?php }

    add_action( 'wp_head', 'seos_back_to_top_style' );
    function seos_back_to_top_style() {
    echo '<style type="text/css">
    #totop {
		border-radius: ' . get_option( 'back_to_top_button_radius') . 'px;
		opacity: ' . get_option( 'back_to_top_button_opacity') . ';
		position: fixed;
		right: 40px;
	    z-index: 999999;
		bottom: 45px;
		outline: none;
		display: none;
		background: #0094FF;
		text-align: center;
		color: #FFFFFF;
		width: 45px;
		line-height: 45px;
		font-size: 20px;
		box-sizing: border-box;
		-webkit-transition: all 0.1s linear 0s;
		-moz-transition: all 0.1s linear 0s;
		-o-transition: all 0.1s linear 0s;
		transition: all 0.1s linear 0s;
		font-family: \'Tahoma\', sans-serif;
		z-index: 99999;
    }
		#totop:hover {
			opacity: 0.8;
	}
		
    </style>';
    }

    add_action( 'wp_footer', 'seos_to_top_button_script' );
    function seos_to_top_button_script() {
    echo '<script type="text/javascript">
    jQuery(document).ready(function($){
    $(window).scroll(function () {
    if ( $(this).scrollTop() > 500 )
    $("#totop").fadeIn();
    else
    $("#totop").fadeOut();
    });

    $("#totop").click(function () {
    $("body,html").animate({ scrollTop: 0 }, ' . get_option( 'back_to_top_button_speed') . ' );
    return false;
    });
    });
    </script>';
    }

function bttb_width () {	
	if (get_option( 'back_to_top_button_width')) : ?>
		<style>
		#totop {
				width: <?php echo get_option( 'back_to_top_button_width'); ?>px !important;
		}
		</style>
		<?php endif;
	}
	add_action('wp_head','bttb_width');

function bttb_height () {	
	if (get_option( 'back_to_top_button_height')) : ?>
		<style>
		#totop {
				line-height: <?php echo get_option( 'back_to_top_button_height'); ?>px !important;
		}
		</style>
		<?php endif;
	}
	add_action('wp_head','bttb_height');

function bttb_size() {	
	if (get_option( 'back_to_top_button_font_size')) : ?>
		<style>
		#totop {
				font-size: <?php echo get_option( 'back_to_top_button_font_size'); ?>px !important;
		}
		</style>
		<?php endif;
	}
	add_action('wp_head','bttb_size');

function bttb_left() {	
	if (get_option( 'back_to_top_button_position_left')) : ?>
		<style>
		#totop {
				left: <?php echo get_option( 'back_to_top_button_position_left'); ?>px !important;
		}
		</style>
		<?php endif;
	}
	add_action('wp_head','bttb_left');

function bttb_right() {	
	if (get_option( 'back_to_top_button_position_right')) : ?>
		<style>
		#totop {
				right: <?php echo get_option( 'back_to_top_button_position_right'); ?>px !important;
		}
		</style>
		<?php endif;
	}
	add_action('wp_head','bttb_right');
	
	function bttb_bottom() {	
	if (get_option( 'back_to_top_button_position_bottom')) : ?>
		<style>
		#totop {
				bottom: <?php echo get_option( 'back_to_top_button_position_bottom'); ?>px !important;
		}
		</style>
		<?php endif;
	}
	add_action('wp_head','bttb_bottom');
	
function bttb_image () {	
	if (get_option( 'back_to_top_button_load1')) : ?>
		<style>
		#totop {
				background: url(<?php echo get_option( 'back_to_top_button_load1'); ?>) center center no-repeat !important; 
				font-size: 0 !important;
		}
		</style>
		<?php endif;
	}
	add_action('wp_head','bttb_image');
