<?php
/**
 * Shorcode tema silohon add site
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

// Shortcode ads 1 ============================
// ============================================
add_shortcode( 'shortcode-ads-1', 'add_call_shorcode_ads_1' );
function add_call_shorcode_ads_1(){
    $shorCodeAds1 = get_option( 'add_ads_sc1' );

    $ads1Output = '<div class="add_ads">';
    $ads1Output .= $shorCodeAds1;
    $ads1Output .= '</div>';

    return $ads1Output;
}

// Shortcode ads 2 ============================
// ============================================
add_shortcode( 'shortcode-ads-2', 'add_call_shorcode_ads_2' );
function add_call_shorcode_ads_2(){
    $shorCodeAds2 = get_option( 'add_ads_sc2' );

    $ads2Output = '<div class="add_ads">';
    $ads2Output .= $shorCodeAds2;
    $ads2Output .= '</div>';

    return $ads2Output;
}