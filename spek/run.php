<?php
/**
 * Add Custom Post
 * Post Type Spek
 * @package silohon
 * @link https://github.com/silohon/silohon
 */
add_action( 'init', 'silo_new_spek_post_type' );
function silo_new_spek_post_type(){
    $labels = array(
        'name'                  =>  'Speck Phone',
        'singular_name'         =>  'Speck Phone',
        'add_new'               =>  'New Phone',
        'add_new_item'          =>  'New Phone',
        'view_item'             =>  'View Phone',
        'search_items'          =>  'Find Phone',
        'not_found'             =>  'Phone Not Found',
        'not_found_in_trash'    =>  'Phone Not Found in Trash'
    );

    $args = array(
        'labels'                =>  $labels,
        'public'                =>  true,
        'has_archive'           =>  true,
        'publicly_queryable'    =>  true,
        'query_var'             =>  true,
        'show_in_rest'          =>  true,
        'rewrite'               =>  array( 'slug' => 'spek' ),
        'capability_type'       =>  'post',
        'supports'              =>  array( 'title', 'editor', 'thumbnail' ),
        'menu_position'         =>  6,
        'menu_icon'             =>  'dashicons-smartphone'
    );

    $category_labels = array(
        'name'              => _x('Phone Brands', 'taxonomy general name'),
        'singular_name'     => _x('Phone Brand', 'taxonomy singular name'),
        'search_items'      => __('Find Phone Brands'),
        'all_items'         => __('All Phone Brands'),
        'parent_item'       => __('Parent Phone Brand'),
        'parent_item_colon' => __('Parent Phone Brand'),
        'edit_item'         => __('Edit Phone Brand'),
        'update_item'       => __('Update Phone Brand'),
        'add_new_item'      => __('Add New Brand'),
        'new_item_name'     => __('New Brand Name'),
        'menu_name'         => __('Phone Brands'),
    );

    $category_args = array(
        'hierarchical'          =>  true,
        'labels'                =>  $category_labels,
        'show_ui'               =>  true,
        'show_admin_column'     =>  true,
        'query_var'             =>  true,
        'rewrite'               =>  array( 'slug' => 'brand' ),
        'show_in_menu'          =>  true
    );

    register_post_type( 'spek', $args );
    register_taxonomy( 'brand', array('spek'), $category_args );
}


function template_chooser($template)   
{    
    global $wp_query;   
    $post_type = get_query_var('post_type');   
    if( $wp_query->is_search && $post_type == 'spek' )   
    {
        return locate_template('search-spek.php');
    }   
    return $template; 
}
add_filter('template_include', 'template_chooser');