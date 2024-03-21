<?php
/**
 * Root function tema wordpress silohon add site
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */



// Define Theme =================================
// ==============================================
define( 'ADD_NAME', 'SILOHON' );
define( 'ADD_VER', '1.7.4' );
define( 'ADD_URI', get_template_directory_uri());
define( 'ADD_DIR', get_template_directory());

function ADD_PART( $filename ){
    get_template_part( $filename );
}

// Streaming function pada file lain =============
// ===============================================
require ADD_DIR . '/func/tema.php';
require ADD_DIR . '/func/remove.php';
require ADD_DIR . '/func/scripts.php';