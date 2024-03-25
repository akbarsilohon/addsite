<?php
/**
 * Fungsi pemanggilan script dan css pada tema
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

// css dan javascript untuk tampilan user ===============
// ======================================================
add_action( 'wp_enqueue_scripts', 'add_enqueue_scripts' );
function add_enqueue_scripts(){
    
    // Main css
    wp_enqueue_style( 'add-style', get_stylesheet_uri(), array(), fileatime( ADD_DIR . '/style.css' ), 'all' );
    if( is_home()){
        wp_enqueue_style( 'add-home', ADD_URI . '/asset/css/home.css', array(), fileatime( ADD_DIR . '/asset/css/home.css'), 'all' );
    }

    // Speck archive css
    if( is_tax( 'speck_category' )){
        wp_enqueue_style( 'tax-speck', ADD_URI . '/asset/css/tax-speck.css', array(), fileatime( ADD_DIR . '/asset/css/tax-speck.css' ), 'all' );
    } else if( is_post_type_archive( 'speck' )){
        wp_enqueue_style( 'archive-speck', ADD_URI . '/asset/css/archive-speck.css', array(), fileatime( ADD_DIR . '/asset/css/archive-speck.css' ), 'all' );
    } else if( is_archive() && !is_post_type_archive( 'speck' )){
        wp_enqueue_style( 'archive', ADD_URI . '/asset/css/archive.css', array(), fileatime( ADD_DIR . '/asset/css/archive.css' ), 'all' );
    }

    // single post ----------------
    if( is_single()){
        if( get_post_type() === 'speck' ){
            wp_enqueue_style( 'single-speck', ADD_URI . '/asset/css/single-speck.css', array(), fileatime( ADD_DIR . '/asset/css/single-speck.css' ), 'all' );
        } else{
            wp_enqueue_style( 'single-css', ADD_URI . '/asset/css/single.css', array(), fileatime( ADD_DIR . '/asset/css/single.css' ), 'all' );
        }
    }

    // Page css ------------
    if( is_page()){
        wp_enqueue_style( 'page-css', ADD_URI . '/asset/css/page.css', array(), fileatime( ADD_DIR . '/asset/css/page.css' ), 'all' );
    }

    // 404 -------------------
    if( is_404()){
        wp_enqueue_style( 'page-404', ADD_URI . '/asset/css/404.css', array(), fileatime( ADD_DIR . '/asset/css/404.css' ), 'all' );
    }

    // hasil pencarian -------------------------
    if( is_search()){
        wp_enqueue_style( 'hasil', ADD_URI . '/asset/css/hasil.css', array(), fileatime( ADD_DIR . '/asset/css/hasil.css' ), 'all' );
    }

    // Main js
    wp_enqueue_script( 'add-call-jquery', ADD_URI . '/asset/js/jquery.min.js', array(), null, true );
    wp_enqueue_script( 'add-script', ADD_URI . '/asset/js/main.js', array(), fileatime( ADD_DIR . '/asset/js/main.js' ), true );

}


// Css dan Javascript untuk Admin panel =================
// ======================================================
add_action( 'admin_enqueue_scripts', 'add_panggil_css_js_admin' );
function add_panggil_css_js_admin(){

    wp_enqueue_media();

    // Custom postingan speck ------------
    wp_enqueue_style( 'panggil-css-speck-admin', ADD_URI . '/inc/custom-post/css/speck-admin.css', array(), fileatime( ADD_DIR . '/inc/custom-post/css/speck-admin.css' ), 'all' );

    // Admin css --------------------------
    wp_enqueue_style( 'panggil-css-admin', ADD_URI . '/inc/admin/css/admin.css', array(), fileatime( ADD_DIR . '/inc/admin/css/admin.css'), 'all' );

    // Jquery untuk admin panel -----------
    wp_enqueue_script( 'add-admin-jquery', ADD_URI . '/inc/admin/js/admin.js', array(), fileatime( ADD_DIR . '/inc/admin/js/admin.js'), true );
}