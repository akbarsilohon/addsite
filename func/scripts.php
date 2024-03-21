<?php
/**
 * Fungsi pemanggilan script dan css pada tema
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

add_action( 'wp_enqueue_scripts', 'add_enqueue_scripts' );
function add_enqueue_scripts(){
    
    // Main css -----------------------------------
    wp_enqueue_style( 'add-style', get_stylesheet_uri(), array(), fileatime( ADD_DIR . '/style.css' ), 'all' );

    // Main js
    wp_enqueue_script( 'add-script', ADD_URI . '/asset/js/main.js', array(), fileatime( ADD_DIR . '/asset/js/main.js' ), true );

}