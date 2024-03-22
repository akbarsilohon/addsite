<?php
/**
 * Fungsi tombol load more
 * Menambahkan jumlah postingan
 * yang di injek kedalam class add_post-list
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

add_action( 'wp_ajax_nopriv_add_post_load_more', 'add_post_load_more' );
add_action( 'wp_ajax_add_post_load_more', 'add_post_load_more' );
function add_post_load_more(){
    $paged = $_POST[ 'page' ] + 1;

    $loadMore = new WP_Query( array(
        'post_type'         =>  'post',
        'post_status'       =>  'publish',
        'paged'             =>  $paged
    ));

    if( $loadMore->have_posts()){
        while( $loadMore->have_posts()){
            $loadMore->the_post(); ?>

            <article id="post-<?php get_the_ID(); ?>" class="add_post-loop">
                <a href="<?php the_permalink(); ?>" class="add_post-link">
                    <?php if( has_post_thumbnail()){
                        the_post_thumbnail( 'full', array(
                            'class'         =>  'add_post-thumb',
                            'loading'       =>  'lazy'
                        ));
                    } else{
                        $spekDefImage = ADD_URI . '/asset/image/favicon.jpg';
                        echo '<img class="add_post-thumb" src="'. $spekDefImage .'">';
                    } ?>

                    <?php the_title( '<h2 class="add_post-title">', '</h2>' ); ?>
                </a>
            </article>

            <?php
        }
    } else{ ?>

        <script>
            document.querySelector( '.add_load_more' ).style.display = 'none';
        </script>

    <?php
    }

    wp_reset_postdata();

    die();
}