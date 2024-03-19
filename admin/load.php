<?php

// ------------------------------------
// Admin Page -------------------------
// ------------------------------------
add_action( 'admin_menu', 'silo_admin_menu' );
function silo_admin_menu(){
    $icon = SILO_URI . '/img/icon.png';
    add_menu_page(
        THEME_NAME,
        THEME_NAME,
        'manage_options',
        'silo_general',
        'silo_general',
        $icon
    );

    // General Setting Sub Menu
    add_submenu_page(
        'silo_general',
        THEME_NAME,
        'General',
        'manage_options',
        'silo_general',
        'silo_general'
    );

    // Single Post
    add_submenu_page(
        'silo_general',
        'Single Post',
        'Single Post',
        'manage_options',
        'post_setting',
        'post_setting'
    );

    // Ads Setting
    add_submenu_page(
        'silo_general',
        'Setting Ads Silohon Theme',
        'Ads',
        'manage_options',
        'silo_ads',
        'silo_ads'
    );

    // Insert Header & Footer
    add_submenu_page(
        'silo_general',
        'Insert Code to Header & Footer',
        'Insert Code',
        'manage_options',
        'header_and_footer',
        'header_and_footer'
    );

    // Spin Article
    add_submenu_page( 
        'silo_general', 
        'Spin Article by Silohon', 
        'Spin Artcile', 
        'manage_options', 
        'spin_article', 
        'spin_article'
    );

    // Require Function ----------------
    // ---------------------------------
    add_action( 'admin_init', 'silo_admin_init' );
    function silo_admin_init(){
        require SILO_DIR . '/admin/handler/general.php';
        require SILO_DIR . '/admin/handler/single.php';
        require SILO_DIR . '/admin/handler/ads.php';
        require SILO_DIR . '/admin/handler/header-footer.php';
    }
}


// Admin Function Callback -----------
// -----------------------------------
function silo_general(){
    get_template_part( 'admin/panel/general' );
}

function post_setting(){
    get_template_part( 'admin/panel/single', 'post' );
}

function silo_ads(){
    get_template_part( 'admin/panel/ads' );
}

function header_and_footer(){
    get_template_part( 'admin/panel/header', 'footer' );
}

function spin_article(){
    get_template_part( 'admin/panel/spin', 'article' );
}