<?php get_header();

// This Swich to page builder.
// If this page is Active builder, run the code.
$get_meta = get_post_custom( $post->ID );
if( !empty( $get_meta['silo_builder_active'] )){
    if( !empty( $get_meta['silo_hero'] )){
        get_template_part( 'views/loop/hero' );
        if( !empty( get_option('ads_home') )){
            echo '<div class="container">';
            print( get_option('ads_home'));
            echo '</div>';
        }
    }

    echo '<div class="container">';
        get_template_part( 'views/run', 'builder' );
        if( !empty( $get_meta['silo_last'] )){
            get_template_part( 'views/loop/recent' );
        }
    echo '</div>';
} else{
    // This Normal Page. ?>

    <div class="container silo_pages">
        <div class="this_page">
            <div class="this_top">
                <?php the_title('<h2 class="page_titles">', '</h2>'); ?>
            </div>

            <div class="this_content">
                <?php the_content(); ?>
            </div>
        </div>

        <?php get_sidebar(); ?>
    </div>


<?php }


get_footer();