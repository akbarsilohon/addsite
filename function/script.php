<?php

// -------------------------------------
// View Script -------------------------
// -------------------------------------
add_action( 'wp_enqueue_scripts', 'silo_scripts' );
function silo_scripts(){
    global $post;
    // Main Style
    wp_enqueue_style(
        'main-style',
        get_stylesheet_uri(),
        array(),
        fileatime( SILO_DIR . '/style.css'),
        'all'
    );

    // Home Script ---------------------------
    // ---------------------------------------
    if( is_archive() && ! is_post_type_archive( 'spek' ) && !is_tax('spek_category') ){
        wp_enqueue_style(
            'home-style',
            SILO_URI . '/css/home.css',
            array(),
            fileatime( SILO_DIR . '/css/home.css'),
            'all'
        );
    }

    // Spek Archive PHP -------------------------
    // ------------------------------------------
    if( is_post_type_archive( 'spek' ) || is_tax('brand') ){
        wp_enqueue_style( 
            'archive-spek', 
            SILO_URI . '/css/spek-archive.css', 
            array(), 
            fileatime( SILO_DIR . '/css/spek-archive.css' ), 
            'all' 
        );
    }

    // Spek Home -------------------------------
    // =========================================
    if( is_home()){
        wp_enqueue_style( 
            'home-spek', 
            SILO_URI . '/css/spek-home.css', 
            array(), 
            fileatime( SILO_DIR . '/css/spek-home.css' ), 
            'all'
        );
    }

    // Search Css ------------------------------
    // -----------------------------------------
    if( is_search() && !is_singular('spek') ){
        wp_enqueue_style(
            'search-style',
            SILO_URI . '/css/search.css',
            array(),
            fileatime( SILO_DIR . '/css/search.css'),
            'all'
        );
    }

    // Single Post Css -----------------------
    // ---------------------------------------
    if( is_single() ){
        $single_post_type = get_post_type();
        if( $single_post_type === 'post' ){
            wp_enqueue_style(
                'single-style',
                SILO_URI . '/css/single.css',
                array(),
                fileatime( SILO_DIR . '/css/single.css'),
                'all'
            );
        } elseif( $single_post_type === 'spek' ){
            wp_enqueue_style( 
                'spek-css', 
                SILO_URI . '/css/spek.css', 
                array(), 
                fileatime( SILO_DIR . '/css/spek.css' ), 
                'all' 
            );
        }
    }

    // Page Css -------------------------
    // ----------------------------------
    if( is_page() ){
        wp_enqueue_style(
            'page-style',
            SILO_URI . '/css/page.css',
            array(),
            fileatime( SILO_DIR . '/css/page.css'),
            'all'
        );
    }

    // Main Js
    wp_enqueue_script(
        'main-js',
        SILO_URI . '/js/main.js',
        array(),
        fileatime( SILO_DIR . '/js/main.js'),
        true
    );
}



// -------------------------------------
// Admin Script ------------------------
// -------------------------------------
add_action( 'admin_enqueue_scripts', 'silo_admin_sctipts' );
function silo_admin_sctipts(){
    // Admin Panel -------------------------
    // -------------------------------------
    wp_enqueue_style(
        'admin-panel',
        SILO_URI . '/admin/css/panel.css',
        array(),
        fileatime( SILO_DIR . '/admin/css/panel.css'),
        'all'
    );

    wp_enqueue_media();

    wp_enqueue_script(
        'panel-js',
        SILO_URI . '/admin/js/panel.js',
        array(),
        fileatime( SILO_DIR . '/admin/js/panel.js' ),
        true
    );

    // Mce Buttons -------------------------
    // -------------------------------------
    wp_enqueue_style(
        'mce-style',
        SILO_URI . '/mce_buttons/css/mce.css',
        array(),
        fileatime( SILO_DIR . '/mce_buttons/css/mce.css'),
        'all'
    );

    // Spek Panel --------------------------
    // -------------------------------------
    if (get_post_type() === 'spek') {
        wp_enqueue_style(
            'panel-id',
            SILO_URI . '/spek/css/spek-panel.css',
            array(),
            fileatime(SILO_DIR . '/spek/css/spek-panel.css'),
            'all'
        );
    }
}