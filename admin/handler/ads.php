<?php

// --------------------------------------
// Panel Ads Settings -------------------
// --------------------------------------
// Lazyload Ads Toggle
register_setting( 'silo-ads-group', 'silo_lazy_load_ads' );
add_settings_section( 'silohon-ads', null, null, 'silo_ads' );
add_settings_field(
    'lazy-load-ads',
    'Lazy Load Ads',
    'lazy_load_ads',
    'silo_ads',
    'silohon-ads'
);

function lazy_load_ads(){ ?>
<div id="thi_lazy_ads" class="thi_lazy_ads <?php if( get_option('silo_lazy_load_ads') != 'true' ) echo 'disabled'; ?>">
    <input <?php if( get_option('silo_lazy_load_ads') == 'true' ) echo 'checked'; ?> value="true" type="checkbox" name="silo_lazy_load_ads" id="silo_lazy_load_ads">
</div>
<?php }

// Input Ca-pub Code -------------------
// -------------------------------------
register_setting( 'silo-ads-group', 'ca_pub' );
add_settings_field(
    'ca-pub',
    '<span id="ca_pob_code_toggle">Ca-pub Code</span>',
    'ca_pub_code',
    'silo_ads',
    'silohon-ads'
);

function ca_pub_code(){ ?>
<textarea name="ca_pub" id="ca_pub" cols="3" rows="1"><?php echo get_option('ca_pub'); ?></textarea>
<?php }


// Home Page ------------------------------
// ----------------------------------------
register_setting( 'silo-ads-group', 'ads_home' );
add_settings_field(
    'ads-home',
    'After Hero Home Page',
    'after_hero_home_page',
    'silo_ads',
    'silohon-ads'
);

function after_hero_home_page(){
$ads_home = get_option( 'ads_home' );
echo '<textarea name="ads_home" id="ads_home" cols="70" rows="10">'.$ads_home.'</textarea>';
}


// Single Post After Post Thumbnail ------------
// ---------------------------------------------
register_setting( 'silo-ads-group', 'ads_single_top' );
add_settings_field(
    'single-top',
    'Single Post Top',
    'single_top_ads',
    'silo_ads',
    'silohon-ads'
);

function single_top_ads(){
$ads_single_top = get_option( 'ads_single_top' );
echo '<textarea name="ads_single_top" id="ads_single_top" cols="70" rows="10">'.$ads_single_top.'</textarea>';
}


// Single Post After Post. --------------------
// --------------------------------------------
register_setting( 'silo-ads-group', 'ads_single_bot' );
add_settings_field(
    'single-bot',
    'After Post',
    'single_after_post',
    'silo_ads',
    'silohon-ads'
);
function single_after_post(){
$ads_single_bot = get_option( 'ads_single_bot' );
echo '<textarea name="ads_single_bot" id="ads_single_bot" cols="70" rows="10">'.$ads_single_bot.'</textarea>';
}


// Short Code Ads 1. ------------------
// ------------------------------------
register_setting( 'silo-ads-group', 'shortcode_ads1' );
add_settings_field(
    'shortcode-ads1',
    'Shortcode 1',
    'shortcode_1',
    'silo_ads',
    'silohon-ads'
);
function shortcode_1(){
$ads1 = get_option( 'shortcode_ads1' );
echo '<textarea name="shortcode_ads1" id="shortcode_ads1" cols="70" rows="10">
'.$ads1.'</textarea>';
}


// Short Code Ads 2. ------------------
// ------------------------------------
register_setting( 'silo-ads-group', 'shortcode_ads2' );
add_settings_field(
    'shortcode-ads2',
    'Shortcode 2',
    'shortcode_2',
    'silo_ads',
    'silohon-ads'
);
function shortcode_2(){
$ads2 = get_option( 'shortcode_ads2' );
echo '<textarea name="shortcode_ads2" id="shortcode_ads2" cols="70" rows="10">
'.$ads2.'</textarea>';
}