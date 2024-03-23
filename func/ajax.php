<?php
/**
 * Fungsi tombol load more
 * Menambahkan jumlah postingan
 * yang di injek kedalam class add_post-list
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */


// Load more homepage ======================
// =========================================
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
                        $spekDefImage = ADD_URI . '/asset/image/no-image.jpg';
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


// Loda more post type speck in speck archive =========
// ====================================================
add_action( 'wp_ajax_nopriv_add_call_more_post_speck', 'add_call_more_post_speck' );
add_action( 'wp_ajax_add_call_more_post_speck', 'add_call_more_post_speck' );
function add_call_more_post_speck(){
    $pages = $_POST[ 'page' ] + 1;

    $speckLoad = new WP_Query( array(
        'post_type'         =>  'speck',
        'post_status'       =>  'publish',
        'paged'             =>  $pages
    ));

    if( $speckLoad->have_posts()){
        while( $speckLoad->have_posts()){
            $speckLoad->the_post(); ?>

            <article id="post-<?php the_ID(); ?>" class="allSpeck-post">
                <a href="<?php the_permalink(); ?>" class="allSpeck-a">
                    <?php if( has_post_thumbnail()){
                        the_post_thumbnail( 'full', array(
                            'class'         =>  'allSpeck-img',
                            'loading'       =>  'lazy'
                        ));
                    } else{
                        $spekDefImage = ADD_URI . '/asset/image/no-img-spek.jpg';
                        echo '<img class="allSpeck-img" src="'. $spekDefImage .'">';
                    } ?>

                    <div class="allSpeck-data">
                        <?php the_title( '<h2 class="allSpeck-title">', '</h2>' ); ?>
                        <span class="allSpeck-price">
                            <span class="allSpeck-idr">IDR</span>
                            <?php 
                            $harga = get_post_meta( get_the_ID(), 'harga', true );
                            if( !empty( $harga )){
                                echo $harga;
                            } else{
                                echo ' -';
                            }
                            ?>
                        </span>

                        <span class="allSpeck-price">
                            <span class="allSpeck-idr">Stok</span>
                            <?php 
                                $affiliateLazada = get_post_meta( get_the_ID(), 'lazada', true );
                                $affiliateShopee = get_post_meta( get_the_ID(), 'shopee', true );
                                $affiliateBlibli = get_post_meta( get_the_ID(), 'blibli', true );
                                $affiliateTokped = get_post_meta( get_the_ID(), 'tokopedia', true );

                                if( empty( $affiliateLazada ) && empty( $affiliateShopee ) && empty( $affiliateBlibli ) && empty( $affiliateTokped )){
                                    echo '<span class="spanMerah">Habis</span>';
                                } else{
                                    echo '<span class="spanHijau">Ada</span>';
                                }
                            ?>
                        </span>
                    </div>
                </a>
            </article>

            <?php
        }
    } else{ ?>
        <script>
            document.querySelector( '.allSpeck-btn' ).style.display = 'none';
        </script>
    <?php
    }

    wp_reset_postdata();

    die();
}