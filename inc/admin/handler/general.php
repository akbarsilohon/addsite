<?php
/**
 * Hanlder untuk pengaturan umum pada admin panel
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

function add_simpan_opsi_umum(){

    // Logo --------------
    register_setting( 'add-general-settings-group', 'add_logo' );
    add_settings_section( 'add-general', null, null, 'add_general' );
    add_settings_field( 'add-logo', 'Logo Blog:', 'logo_blog', 'add_general', 'add-general' );

    // Tombol backtop ---------
    register_setting( 'add-general-settings-group', 'add_back_top' );
    add_settings_field( 'add-back-top', 'Tombol Backtop', 'tombol_backtop', 'add_general', 'add-general' );
}

// Logo ---------------
function logo_blog(){
$logo = get_option( 'add_logo' ); ?>
<input type="url" name="add_logo" id="add_logo" value="<?php echo esc_url( $logo ); ?>" placeholder="Ukuran 380px x 80px">
<input id="add_upload_logo" type="button" class="button button-primary" value="Upload">
<?php
}

// Tombol kembali keatas blog ----------
function tombol_backtop(){
    $backTop = get_option( 'add_back_top' ); ?>
    <div class="add_checkbox_counter <?php if( $backTop === 'true') echo 'checked'; ?>" id="add_checkbox_counter">
        <input type="checkbox" name="add_back_top" id="add_back_top" value="true" <?php if( $backTop === 'true') echo 'checked'; ?>>
    </div>
    <?php
}