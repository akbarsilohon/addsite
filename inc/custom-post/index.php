<?php
/**
 * Custom postingan tipe speck
 * Tema wordpress Silohon Add Site
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

add_action( 'init', 'add_new_post_type_speck' );
function add_new_post_type_speck(){

    $label = array(
        'name'                  =>  'Ponsel',
        'singular_name'         =>  'Ponsel',
        'add_new'               =>  'Tambah Ponsel',
        'add_new_item'          =>  'Tambah Ponsel',
        'view_item'             =>  'Lihat Ponsel',
        'search_items'          =>  'Cari Ponsel',
        'not_found'             =>  'Ponsel tidak ditemukan',
        'not_found_in_trash'    =>  'Tidak ada ponsel di tong sampah'
    );

    $args = array(
        'labels'                =>  $label,
        'public'                =>  true,
        'has_archive'           =>  true,
        'publicly_queryable'    =>  true,
        'query_var'             =>  true,
        'show_in_rest'          =>  true,
        'rewrite'               =>  array( 'slug' => 'speck' ),
        'capability_type'       =>  'post',
        'supports'              =>  array( 'title', 'thumbnail', 'editor' ),
        'menu_position'         =>  6,
        'menu_icon'             =>  'dashicons-smartphone'
    );

    $cat_label = array(
        'name'                  =>  _x( 'Merk Ponsel', 'taxonomy general name' ),
        'singular_name'         =>  _x( 'Merk Ponsel', 'taxonomy singular name' ),
        'search_items'          =>  __( 'Cari merk Ponsel' ),
        'all_items'             =>  __( 'Semua merk Ponsel' ),
        'parent_item'           =>  __( 'Merk' ),
        'parent_item_colon'     =>  __( 'Merk' ),
        'edit_item'             =>  __( 'Edit merk Ponsel' ),
        'update_item'           =>  __( 'Update merk Ponsel' ),
        'add_new_item'          =>  __( 'Tambah merk Ponsel' ),
        'new_item_name'         =>  __( 'Merk ponsel baru' ),
        'menu_name'             =>  __( 'Merk Ponsel' )
    );

    $cat_args = array(
        'hierarchical'          =>  true,
        'labels'                =>  $cat_label,
        'show_ui'               =>  true,
        'show_admin_column'     =>  true,
        'query_var'             =>  true,
        'rewrite'               =>  array( 'slug' => 'merk' )
    );

    register_post_type( 'speck', $args );
    register_taxonomy( 'speck_category', array( 'speck' ), $cat_args );
}