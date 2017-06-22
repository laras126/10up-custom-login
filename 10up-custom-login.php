<?php

/**
 * Plugin Name: 10up Custom Login
 * Description: Customizations to the WordPress login screen for 10.
 * Version: 1.0
 * Author: Lara Schenck
 * Author URI: https://notlaura.com
 */


// Add fonts with general head hook
function tcl_fonts() {
  echo '<script src="https://use.typekit.net/thk4mzv.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>';
}
add_action('login_head', 'tcl_fonts');


// Enqueue CSS and JS
function tcl_enqueue_assets() {
  wp_enqueue_style( 'custom-login', plugin_dir_url( __FILE__) . 'assets/css/main.css' );
  wp_enqueue_script( 'custom-login', plugin_dir_url( __FILE__) . 'assets/js/main.js' );
}
add_action( 'login_enqueue_scripts', 'tcl_enqueue_assets' );


// Change the logo link to the homepage
function tcl_login_logo_url() {
  return get_bloginfo( 'url' );
}
add_action( 'login_headerurl', 'tcl_login_logo_url' );


// Add SVG markup to header
function tcl_add_svg_loginheader() {
  echo '<div class="logo"><a href="' . get_bloginfo( 'url' ) . '"><svg xmlns="http://www.w3.org/2000/svg" width="103" height="140" viewBox="0 0 383 438.4">
  <path class="logo-1" d="M99 7.3L0 56l19.6 23.4v222.8L99 222.9V7.3z"/>
  <path class="logo-up" d="M190.8 350.5c0 12.2-8.3 17.5-17.5 17.5-12.2 0-15-7.4-15-15.5v-70h-.5l-39.2 39.2v40c0 22 11.8 41.5 39.1 41.5 12 0 24.2-5 33.2-13.3v10.7h39.7v-118h-39.7v67.9zM327.6 280c-13.5 0-24.6 4.8-33.6 13.5v-11.1h-39.9v156H294v-48.7c9 8.3 20.1 13.3 33.6 13.3 32.9 0 53.5-26.4 53.5-61.5 0-34.7-20.5-61.5-53.5-61.5zM317 369c-15.3 0-22.9-12.7-22.9-27.7s7.4-27.5 22.9-27.5c15.1 0 22 12.6 22 27.5 0 14.6-7 27.7-22 27.7z"/>
  <path class="logo-0" d="M255.1 0c-70.6 0-127.9 57.2-127.9 127.9 0 19.5 4.5 37.9 12.3 54.4l1.3 1.4 79-79L195 79.9h108.1V188l-24.8-24.8-79.4 79.5c17 8.4 36.1 13.2 56.3 13.2 70.6 0 127.9-57.2 127.9-127.9-.1-70.8-57.4-128-128-128z"/>
</svg></a></div>';
}
add_action( 'login_message', 'tcl_add_svg_loginheader' );


