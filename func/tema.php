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


// Default favicon ======================
// ======================================
$siteIcon = get_site_icon_url();
if( empty( $siteIcon )){
    add_action( 'admin_head', 'add_default_site_icon' );
    add_action( 'wp_head', 'add_default_site_icon' );

    function add_default_site_icon(){
        $defIcon = ADD_URI . '/asset/image/favicon.jpg'; ?>

        <link rel="shortcut icon" href="<?php echo $defIcon; ?>" type="image/x-icon">
        <link rel="apple-touch-icon" href="<?php echo $defIcon; ?>">

        <?php
    }
}


// Default logo login Wordpress ====================
// =================================================
add_action( 'login_enqueue_scripts', 'add_login_enqueue_logo' );
function add_login_enqueue_logo(){

    // login favicon --------------
    $getSiteIcon = get_site_icon_url();
    $defLoginIcon = ADD_URI . '/asset/image/favicon.jpg';
    $fixIconLogin = !empty( $getSiteIcon ) ? $getSiteIcon : $defLoginIcon; ?>

    <link rel="shortcut icon" href="<?php echo $fixIconLogin; ?>" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo $fixIconLogin; ?>">

    <?php

    $logo = get_option( 'add_logo' );
    $defLogo = ADD_URI . '/asset/image/logo.png';
    $fixLogo = !empty( $logo ) ? $logo : $defLogo; ?>

    <style type="text/css">
        #login h1 a, .login h1 a{
            background-image: url(<?php echo $fixLogo; ?>);
            height:60px;
            width:285px;
            background-size: 285px 60px;
            background-repeat: no-repeat;
        }
    </style>

<?php
}