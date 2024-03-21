<?php 
/**
 * File header tema wordpress silohon add site
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php echo bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php echo bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if(function_exists('wp_body_open')) : wp_body_open(); endif; ?>
<header class="add_head">
    <div class="container">
        <div class="add_hf">
            <div id="add_side" class="add_side">
                <svg width="35px" height="35px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M4 6H20M4 12H20M4 18H20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                </svg>
            </div>

            <!-- logo -->
            <div class="add_logo" itemscope itemtype="http://schema.org/Organization">
                <a itemprop="url" href="<?php echo bloginfo( 'url' ); ?>">
                    <?php
                    $logo = get_option( 'add_logo' );
                    $defLogo = ADD_URI . '/asset/image/logo.png';
                    $fixLogo = !empty( $logo ) ? $logo : $defLogo;
                    echo '<img src="'. $fixLogo .'" class="add_img" width="80" height="60">';
                    ?>
                </a>
            </div>

            <!-- Search desktop -->
            <form action="<?php echo home_url( '/' ); ?>" method="get" class="add_sdesk">
                <input type="text" name="s" id="add_search_desktop_device" placeholder="Cari disini...">
                <button type="submit" class="add_sdesk_btn">Cari</button>
            </form>
        </div>
    </div>
</header>

<div id="add_flexbox" class="add_flexbox flex100">
    <div class="flex_head">
        <h3 class="add_flxt"><?php echo bloginfo( 'name' ); ?></h3>
        <div id="add_close" class="add_close">
            <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                <g id="SVGRepo_iconCarrier">
                    <path d="M8.00386 9.41816C7.61333 9.02763 7.61334 8.39447 8.00386 8.00395C8.39438 7.61342 9.02755 7.61342 9.41807 8.00395L12.0057 10.5916L14.5907 8.00657C14.9813 7.61605 15.6144 7.61605 16.0049 8.00657C16.3955 8.3971 16.3955 9.03026 16.0049 9.42079L13.4199 12.0058L16.0039 14.5897C16.3944 14.9803 16.3944 15.6134 16.0039 16.0039C15.6133 16.3945 14.9802 16.3945 14.5896 16.0039L12.0057 13.42L9.42097 16.0048C9.03045 16.3953 8.39728 16.3953 8.00676 16.0048C7.61624 15.6142 7.61624 14.9811 8.00676 14.5905L10.5915 12.0058L8.00386 9.41816Z" fill="#0F0F0F"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12ZM3.00683 12C3.00683 16.9668 7.03321 20.9932 12 20.9932C16.9668 20.9932 20.9932 16.9668 20.9932 12C20.9932 7.03321 16.9668 3.00683 12 3.00683C7.03321 3.00683 3.00683 7.03321 3.00683 12Z" fill="#0F0F0F"/>
                </g>
            </svg>
        </div>
    </div>
    <form action="<?php echo home_url( '/' ); ?>" method="get" class="add_smob">
        <input type="text" name="s" id="add_search_mob_device" placeholder="Cari disini...">
        <button type="submit" class="add_smob_btn">Cari</button>
    </form>

    <?php 
        wp_nav_menu( array(
            'theme_location'        =>  'header-menu',
            'container'             =>  'ul',
            'menu_class'            =>  'add_head_menu',
            'menu_id'               =>  'add_head_menu',
            'fallback_cb'           =>  false
        ));
    ?>
</div>