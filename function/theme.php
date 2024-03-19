<?php

// ------------------------------------------------
// Theme Support ----------------------------------
// ------------------------------------------------
add_action( 'after_setup_theme', 'silo_setup' );
function silo_setup(){
    add_theme_support( 'title-tag' );
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'html5', array(
        'comment-list', 'comment-form',
        'search-form',
        'gallery', 'caption',
        'style', 'script' ) );

    register_nav_menus( array(
        'header' => __('Menu Header', 'silohon'),
        'footer' => __('Menu Footer', 'silohon')
    ) );
}

/**=====================================
 * The Sidebar =========================
=======================================*/
add_action('widgets_init', 'silo_sidebar');
function silo_sidebar(){

    // If Is Home
    register_sidebar( array(
        'id' => 'home',
        'name' => esc_html__( 'Home Front Page, and Page Sidebar', 'silo' ),
    ) );

    // If Is Singular
    register_sidebar( array(
        'id' => 'single',
        'name' => esc_html__( 'Single Post sidebar', 'silo' ),
    ) );

    // Archive Sidebar
    register_sidebar( array(
        'id' => 'archive',
        'name' => esc_html__('Archive Sidebar', 'silo' ),
    ) );

    register_widget( 'Silo_Search' );
    register_widget( 'Silo_Recent_post' );
    register_widget( 'Silo_Popular_Post' );
}


/**=====================================
 * The Excerpt Length ==================
=======================================*/
add_filter( 'excerpt_length', 'silohon_excerpt' );
function silohon_excerpt( $length ){
    if( !empty( get_option('silo_excerpt') ) ) :
        return get_option('silo_excerpt');
    else :
        return 25;
    endif;
}
add_filter( 'excerpt_more', 'silo_excerpt_more' );
function silo_excerpt_more(){
    return '...';
}

/**=====================================
 * The Meta ============================
=======================================*/
// Time Format
function silo_the_time(){
    $times = human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) );
    echo $times . ' Ago';
}
// The Category no Links
function silo_cats(){
    $categories = get_the_category();
    $sparator = ', ';
    $output = '';
    $i=1;
    if( !empty($categories) ) :
        foreach( $categories as $category ) :
            if($i > 1 ) : $output .= $sparator; endif;
            $output = $category->name;
            $i++;
        endforeach;
    endif;
    echo $output;
}

// The Category With Links
function silo_cat__(){
    $categories = get_the_category();
    $sparator = ', ';
    $output = '';
    $i=1;
    if( !empty($categories) ) :
        foreach( $categories as $category ) :
            if($i > 1 ) : $output .= $sparator; endif;
            $output = '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( 'Post On%s', $category->name ) . '">' . esc_html( $category->name ) . '</a>';
            $i++;
        endforeach;
    endif;
    echo $output;
}

// ---------------------------------------
// Default Favicon -----------------------
// ---------------------------------------
if( ! has_site_icon() ){
    add_action( 'admin_head', 'silo_default_favicon' );
    add_action( 'wp_head', 'silo_default_favicon' );
}
function silo_default_favicon(){
    $deFfav = SILO_URI . '/img/favicon.png';
    echo '<link rel="shortcut icon" href="'.$deFfav.'" type="image/x-icon">';
    echo '<link rel="apple-touch-icon" href="'.$deFfav.'">';
}


// ---------------------------------------
// Login Logo ----------------------------
// ---------------------------------------
add_action( 'login_enqueue_scripts', 'silo_login_logo' );
function silo_login_logo(){
    $deFfav = has_site_icon() ? get_site_icon_url() : SILO_URI . '/img/favicon.png';
    echo '<link rel="shortcut icon" href="'.$deFfav.'" type="image/x-icon">';
    echo '<link rel="apple-touch-icon" href="'.$deFfav.'">';
    if( !empty( get_option( 'silo_logo' ) )){
        echo '<style type="text/css">
                #login h1 a, .login h1 a {
                    background-image: url('.get_option( 'silo_logo' ).');
                    height:60px;
                    width:285px;
                    background-size: 285px 60px;
                    background-repeat: no-repeat;
                }
            </style>';
    } else{
        echo '<style type="text/css">
                #login h1 a, .login h1 a {
                    background-image: url('.get_stylesheet_directory_uri().'/img/logo.png);
                    height:60px;
                    width:285px;
                    background-size: 285px 60px;
                    background-repeat: no-repeat;
                }
            </style>';
    }
}


// -------------------------------------------
// The Comments Pagination -------------------
// -------------------------------------------
function silo_get_comments_nav(){
    require( SILO_DIR . '/views/aside/comments-nav.php' );
}


// -------------------------------------------
// Lazy Load Img -----------------------------
// -------------------------------------------
if( !is_admin()){
    add_filter( 'the_content', 'lazy_load_conten_img' );
    add_filter( 'widget_text', 'lazy_load_conten_img' );

    function lazy_load_conten_img( $content ){
        $content = preg_replace( '/(<img.+)(src)/Ui', '$1data-$2', $content );
        return $content;
    }

    add_filter( 'wp_get_attachment_image_attributes', 'silo_img_attchment_attributes', 10, 2 );
    function silo_img_attchment_attributes( $atts, $attachment ){
        $atts[ 'data-src' ] = $atts[ 'src' ];
        $atts[ 'src' ] = SILO_URI . '/img/lazy.jpg';

        if( !empty( $atts[ 'srcset' ] )){
            unset( $atts[ 'srcset' ] );
        }

        return $atts;
    }
}

// ----------------------------------------
// Custom Robots Head ---------------------
// ----------------------------------------
add_filter( 'wp_robots', 'silo_robots_new' );
function silo_robots_new( $robots ){
    $robots = array(
        'index'             =>  true,
        'follow'            =>  true,
        'max-image-preview' =>  'large',
        'max-snippet'       =>  '-1',
        'max-video-preview' =>  '-1'
    );

    return $robots;
}