<?php
/**
 * File yang menampilkan list achrive post tipe speck
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

get_header();

if( have_posts()){
    while( have_posts()){
        the_post();
        the_title();
    }
}

get_footer();