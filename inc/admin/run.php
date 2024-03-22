<?php
/**
 * Root admin
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

add_action( 'admin_menu', 'add_add_admin_menu' );
function add_add_admin_menu(){
    add_menu_page( ADD_NAME, ADD_NAME, 'manage_options', 'add_general', 'add_general' );
    add_submenu_page( 'add_general', 'add_general', 'General', 'manage_options', 'add_general', 'add_general' );
    add_submenu_page( 'add_general', 'Single Post', 'Single Post', 'manage_options', 'add_single', 'add_single' );
    add_submenu_page( 'add_general', 'Ads', 'Ads', 'manage_options', 'add_ads', 'add_ads' );
    add_submenu_page( 'add_general', 'Header & Footer', 'Header & Footer', 'manage_options', 'add_insert', 'add_insert' );
}


// Fungsi menampilkan masing masing page menu dan sub menu =================
// =========================================================================
// General -------------
function add_general(){ ?>

<div class="add_admin-container">
    <h1 class="add_admin-title">Pengaturan Umum</h1>
    <?php settings_errors(); ?>

    <form action="options.php" method="post" class="add_admin-form">
        <?php settings_fields( 'add-general-settings-group' ); ?>
        <?php do_settings_sections( 'add_general' ); ?>
        <?php submit_button( 'Simpan' ); ?>
    </form>
</div>

<?php
}

// Single post ---------
function add_single(){

}

// Ads code ------------
function add_ads(){

}

// Header & Footer -----
function add_insert(){

}



// Inisiasi untuk menyimpan options ==================
// ===================================================
add_action( 'admin_init', 'add_simpan_opsi_umum' );