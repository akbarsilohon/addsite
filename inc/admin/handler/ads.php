<?php
/**
 * Fungsi untuk mengangai opsi iklan
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

function add_simpan_opsi_ads(){
    add_settings_section( 'add-iklan-section', null, null, 'add_ads' );

    // lazy load iklan google ----------------------
    register_setting( 'add-ads-settings-group', 'tunda_iklan' );
    add_settings_field( 'tunda-iklan', 'Lazy load iklan Google', 'lazy_load_iklan', 'add_ads', 'add-iklan-section' );

    // Kode capub -------------------------------
    register_setting( 'add-ads-settings-group', 'capub_iklan' );
    add_settings_field( 'capub-iklan', '<span class="kodeCaPubIklanGoogle">Kode ca-pub Iklan</span>', 'kode_capub_iklan', 'add_ads', 'add-iklan-section' );

    // Setelah header ---------------------------
    register_setting( 'add-ads-settings-group', 'add_ads_header' );
    add_settings_field( 'header-iklan', 'Setelah Header', 'header_iklan', 'add_ads', 'add-iklan-section' );

    // Diatas footer ----------------------------
    register_setting( 'add-ads-settings-group', 'add_ads_footer' );
    add_settings_field( 'footer-iklan', 'Diatas Footer', 'footer_iklan', 'add_ads', 'add-iklan-section' );

    // Setelah thumbnail single post ------------
    register_setting( 'add-ads-settings-group', 'add_single_top' );
    add_settings_field( 'sing-top-iklan', 'Sebelum Artikel', 'add_single_top_iklan', 'add_ads', 'add-iklan-section' );

    // Setelah artikel --------------------------
    register_setting( 'add-ads-settings-group', 'add_ads_setelah_artikel' );
    add_settings_field( 'sing-bot-iklan', 'Setelah Artikel', 'add_single_bot_iklan', 'add_ads', 'add-iklan-section' );

    // Shortcode 1 ------------------------------
    register_setting( 'add-ads-settings-group', 'add_ads_sc1' );
    add_settings_field( 'sc1-iklan', 'Shortcode ads 1', 'add_ads_sc1', 'add_ads', 'add-iklan-section' );

    // Shortcode 2 ------------------------------
    register_setting( 'add-ads-settings-group', 'add_ads_sc2' );
    add_settings_field( 'sc2-iklan', 'Shortcode ads 2', 'add_ads_sc2', 'add_ads', 'add-iklan-section' );
}

function lazy_load_iklan(){
    $LoazyLoad = get_option( 'tunda_iklan' ); ?>
    <div class="CaPubIklan <?php if( $LoazyLoad === 'true') echo 'checked'; ?>" id="CaPubIklan">
        <input type="checkbox" name="tunda_iklan" id="tunda_iklan" value="true" <?php if( $LoazyLoad === 'true') echo 'checked'; ?>>
    </div>
    <?php
}

function kode_capub_iklan(){
    $LoazyLoad = get_option( 'capub_iklan' ); ?>
    <input type="text" name="capub_iklan" id="capub_iklan" placeholder="Contoh 123445667888" value="<?php echo esc_attr( $LoazyLoad ); ?>">
    <?php
}

function header_iklan(){
$adsHeader = get_option( 'add_ads_header' ); ?>
<textarea class="add_texarea_iklan" name="add_ads_header" id="add_ads_header" cols="80" rows="7"><?php echo $adsHeader; ?></textarea>
<?php
}

function footer_iklan(){
$adsFooter = get_option( 'add_ads_footer' ); ?>
<textarea class="add_texarea_iklan" name="add_ads_footer" id="add_ads_footer" cols="80" rows="7"><?php echo $adsFooter; ?></textarea>
<?php
}

function add_single_top_iklan(){
$singleTop = get_option( 'add_single_top' ); ?>
<textarea class="add_texarea_iklan" name="add_single_top" id="add_single_top" cols="80" rows="7"><?php echo $singleTop; ?></textarea>
<?php
}

function add_single_bot_iklan(){
$singleBot = get_option( 'add_ads_setelah_artikel' ); ?>
<textarea class="add_texarea_iklan" name="add_ads_setelah_artikel" id="add_ads_setelah_artikel" cols="80" rows="7"><?php echo $singleBot; ?></textarea>
<?php
}

function add_ads_sc1(){
$sc1 = get_option( 'add_ads_sc1' ); ?>
<textarea class="add_texarea_iklan" name="add_ads_sc1" id="add_ads_sc1" cols="80" rows="7"><?php echo $sc1; ?></textarea>
<?php
}

function add_ads_sc2(){
$sc2 = get_option( 'add_ads_sc2' ); ?>
<textarea class="add_texarea_iklan" name="add_ads_sc2" id="add_ads_sc2" cols="80" rows="7"><?php echo $sc2; ?></textarea>
<?php
}