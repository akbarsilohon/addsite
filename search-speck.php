<?php
/**
 * Template yang menampilkan hasil pencari post type speck
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

get_header(); ?>

<div class="container">
    <div class="dataSpeckAll">
        <?php if( have_posts() ) : ?>
            <div class="spc-heading">
                <span class="spcText">Hasil</span>
                <span class="spcKey">"<?php echo $s; ?>"</span>
            </div>

            <div class="loopingSpeckAll">
                <?php while( have_posts()) : the_post(); ?>
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
                <?php endwhile; ?>
            </div>

            <div class="add_paginate">
                <?php echo paginate_links( array(
                    'mid_size'      =>  2,
                    'show_all'      =>  false,
                    'prev_text'     =>  '<< Prev',
                    'next_text'     =>  'Next >>'
                )); ?>
            </div>
        <?php else : ?>
            <div class="spc-heading">
                <span class="spcText">Kata kunci </span>
                <span class="spcKey">"<?php echo $s; ?>" Tida ditemukan</span>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();