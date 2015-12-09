<?php

/*
Plugin Name: Disable Right Click
Plugin URI: http://masterblogster.com/plugins/disable-right-click
Description: Disable right click plugin prevents right click which avoids copying website content and source code up to some extent.
Author: Shrinivas Naik
Version: 1.0
Author URI: http://www.masterblogster.com
*/

/* ----------------------------------------------------------------------------------------------*/
/*  Main plugin code */
function mb_no_right_click_code()
{

?>
  <div id="dialog-message" title="Sorry.." style="display:none">
  <p>
    Sorry!.. Right click has been disabled for <?php echo get_bloginfo('name');?>.
  </p>

</div>
    
    <?php
    }

add_action('wp_footer','mb_no_right_click_code');

add_action('wp_enqueue_scripts', 'load_jquery_for_mb_no_right_click');
function load_jquery_for_mb_no_right_click() {
	
    wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-dialog');
	
	wp_register_script('mb_no_right_click_js',plugins_url( 'disable-right-click-js.js' , __FILE__ ),array( 'jquery' ));
    wp_enqueue_script('mb_no_right_click_js');
	
	wp_register_style( 'mb_jquery_ui_modal_box', plugins_url('jquery-ui.css', __FILE__) );
	wp_enqueue_style( 'mb_jquery_ui_modal_box' );
}

?>