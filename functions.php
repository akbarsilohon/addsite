<?php

// ------------------------------------------
// Function Routing -------------------------
// ------------------------------------------
define( 'THEME_NAME', 'Silohon' );
define( 'THEME_URI', 'https://github.com/silohon' );
define( 'THEME_AUTHOR', 'Nur Akbar' );
define( 'SILO_DIR', get_template_directory() );
define( 'SILO_URI', get_template_directory_uri() );


// Require Function --------------------------
// -------------------------------------------
// require SILO_DIR . '/build/index.php';
require SILO_DIR . '/function/script.php';
require SILO_DIR . '/function/theme.php';
require SILO_DIR . '/admin/load.php';
require SILO_DIR . '/function/widgets.php';
require SILO_DIR . '/mce_buttons/app.php';
require SILO_DIR . '/function/remove-action.php';
require SILO_DIR . '/function/dont-copy.php';

// Add Custom Post Type Spek -------------------
// ---------------------------------------------
require SILO_DIR . '/spek/run.php';
require SILO_DIR . '/spek/meta-box.php';