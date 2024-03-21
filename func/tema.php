<?php
/**
 * Fungsi support pada tema
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

add_action( 'after_setup_theme', 'add_after_setup_theme' );
function add_after_setup_theme(){
    add_theme_support( 'title-tag' );
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'html5', array(
        'comment-list', 'comment-form',
        'search-form',
        'gallery', 'caption',
        'style', 'script' ) );
}

register_nav_menus( array(
    'header-menu'       =>  __( 'Menu Header', 'silohon-add-site' ),
    'footer-menu'       =>  __( 'Menu Footer', 'silohon-add-site' ),
));


// Custom meta tag robot ===============================
// =====================================================
add_filter( 'wp_robots', 'add_robots' );
function add_robots( $robots ){

    $robots = array(
        'index'             =>  true,
        'follow'            =>  true,
        'max-image-preview' =>  'large',
        'max-snippet'       =>  '-1',
        'max-video-preview' =>  '-1'
    );

    return $robots;
}