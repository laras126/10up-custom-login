<?php

/**
 * Plugin Name: 10up Custom Login
 * Description: Customizations to the 10up WordPress login screen.
 * Version: 1.0
 * Author: Lara Schenck
 * Author URI: https://notlaura.com
 */




function tcl_fonts() {
  echo '<script src="https://use.typekit.net/thk4mzv.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>';
}
add_action('login_head', 'tcl_fonts');

function tcl_styles() {
  wp_enqueue_style( 'custom-login', plugin_dir_url( __FILE__) . 'assets/css/main.css' );
}
add_action( 'login_enqueue_scripts', 'tcl_styles' );


?>
