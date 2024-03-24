<?php
/**
 * Hanlder untuk pengaturan insert header & footer
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

function add_simpan_opsi_insert(){
    add_settings_section( 'add-insert-section', null, null, 'add_insert' );

    // Insert header --------------------
    register_setting( 'add-insert-settings-group', 'add_header_code' );
    add_settings_field( 'add-header-code', 'Insert to Header', 'add_insert_to_header', 'add_insert', 'add-insert-section' );

    // Insert footer ---------------------
    register_setting( 'add-insert-settings-group', 'add_footer_code' );
    add_settings_field( 'add-footer-code', 'Insert to Footer', 'add_insert_to_footer', 'add_insert', 'add-insert-section' );
}

function add_insert_to_header(){
$headerHtml = get_option( 'add_header_code' ); ?>
<textarea class="add_texarea_iklan" name="add_header_code" id="add_header_code" cols="80" rows="7"><?php echo esc_attr( $headerHtml ); ?></textarea>
<?php
}

function add_insert_to_footer(){
$footerHtml = get_option( 'add_footer_code' ); ?>
<textarea class="add_texarea_iklan" name="add_footer_code" id="add_footer_code" cols="80" rows="7"><?php echo esc_attr( $footerHtml ); ?></textarea>
<?php
}