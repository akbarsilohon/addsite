<?php 

// Insert header and Footer -------------
// --------------------------------------
register_setting( 'silo-header-footer-group', 'insert_header' );
add_settings_section( 'header-and-footer', null, null, 'header_and_footer' );
add_settings_field(
    'inser-to-header',
    'Header',
    'insert_to_header',
    'header_and_footer',
    'header-and-footer'
);

function insert_to_header(){
$inset_header = get_option('insert_header');
echo '<textarea name="insert_header" id="insert_header" placeholder="Kode header disini..." cols="100" rows="10">'.$inset_header.'</textarea>';
}

// Footer Code -------------------
// -------------------------------
register_setting( 'silo-header-footer-group', 'insert_footer' );
add_settings_field(
    'inser-to-footer',
    'Footer',
    'insert_to_footer',
    'header_and_footer',
    'header-and-footer'
);


function insert_to_footer(){
$insert_footer = get_option('insert_footer');
echo '<textarea name="insert_footer" placeholder="Kode footer disini..." id="insert_footer" cols="100" rows="10">'.$insert_footer.'</textarea>';
}