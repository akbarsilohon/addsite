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



// Replace tag Image =======================
// =========================================
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
        $atts[ 'src' ] = ADD_URI . '/asset/image/no-image.jpg';
        if( isset( $atts[ 'srcset' ])){
            unset( $atts[ 'srcset' ] );
        }

        return $atts;
    }
}

// Mengambil data category postingan =================
// ===================================================
// Tanpa url ----------------
function add_cats(){
    $categories = get_the_category();
    $sparator = ', ';
    $output = '';
    $i=1;

    if( !empty( $categories )){
        foreach( $categories as $category ){
            if( $i > 1 ){
                $output .= $sparator;
            }

            $output = $category->name;
            $i++;
        }
    }

    echo $output;
}

// Dengan url ---------------
function add_cat__(){
    $categories = get_the_category();
    $sparator = ', ';
    $output = '';
    $i = 1;

    if( !empty($categories)){
        foreach( $categories as $category ){
            if( $i > 1 ){
                $output .= $sparator;
            }

            $output = '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';

            $i++;
        }
    }

    echo $output;
}


// Exerpt postingan =============================
// ==============================================
add_filter( 'excerpt_more', 'add_excerpt_more_replace' );
function add_excerpt_more_replace(){
    return '...';
}

add_filter( 'excerpt_length', 'add_excerpt_length_replace' );
function add_excerpt_length_replace(){
    $ExerptLength = get_option( 'add_panjang_exerpt' );
    $fixExerpt = !empty( $ExerptLength ) ? $ExerptLength : 25;

    return $fixExerpt;
}



// Proteksi kontent =============================
// ==============================================
add_action( 'wp_head', 'add_lindungi_kontent_saya' );
function add_lindungi_kontent_saya(){
    $protextCheck = get_option( 'add_lindungi_konten' );
    if( !empty( $protextCheck ) && $protextCheck === 'true' ){
        if( is_single()){ ?>

            <style>
                body {
                    -webkit-touch-callout: none;
                    -webkit-user-select: none;
                    -khtml-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                    user-select: none;
                }
                ::selection {
                    background-color: #EFEFEF;
                    color: #333;
                }
            </style>

            <script>
                document.ondragstart = function(){
                    return false;
                }

                document.oncontextmenu = function(event) {
                    event.preventDefault();
                    var pesan = "Mau ngapain?";
                    var alertBox = document.createElement("div");
                    alertBox.innerHTML = pesan;
                    alertBox.style.position = "fixed";
                    alertBox.style.backgroundColor = "#cc3300";
                    alertBox.style.color = "white";
                    alertBox.style.border = "1px solid #ccc";
                    alertBox.style.padding = "10px";
                    alertBox.style.left = (event.clientX + 5) + "px";
                    alertBox.style.top = (event.clientY + 5) + "px";
                    document.body.appendChild(alertBox);
                    
                    setTimeout(function() {
                        document.body.removeChild(alertBox);
                    }, 2000);
                };
            </script>

            <?php
        }
    }
}


// Data Shcema navigator ===============================
// =====================================================
add_action( 'wp_footer', 'add_site_navigator' );
function add_site_navigator(){
    $menu_locations = get_nav_menu_locations();
    if( isset($menu_locations['header-menu'])){
        $menu_id = $menu_locations['header-menu'];
        $menu_items = wp_get_nav_menu_items($menu_id);

        if( $menu_items ){
            $schema_actions = [];
            foreach( $menu_items as $item ){
                $schema_actions[] = array(
                    '@type' => 'Action',
                    'name' => $item->title,
                    'url' => $item->url,
                );
            }

            $schema = array(
                '@context' => 'http://schema.org',
                '@type' => 'SiteNavigationElement',
                'potentialAction' => $schema_actions,
            );

            echo '
                <script type="application/ld+json">
                    ' . json_encode($schema, JSON_PRETTY_PRINT) . '
                </script>
            ';
        }
    }
}