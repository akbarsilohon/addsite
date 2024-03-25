<?php
/**
 * Halaman 404
 * Theme Name: 404
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

get_header(); ?>

<div class="container">
    <div class="add_404-page">
        <div class="add_404-box">
            <h1 class="add_404-title">404</h1>
            <p class="add_404-text">Silahkan lihat smartphone lain, halaman yang Anda cari tidak di temukan. Atau kunjungi url ini lagi di lain waktu!</p>
        </div>

        <div class="add_404-newpost">

            <?php 
            
            $related404 = new WP_Query( array(
                'posts_per_page'        =>  8,
                'post_type'             =>  'speck',
                'post_status'           =>  'publish'
            ));

            if( $related404->have_posts()){ ?>
                <div class="add_section">
                    <span class="add_span">Smartphone Terbaru</span>
                </div>

                <div class="add_404-loop">
                    <?php while( $related404->have_posts()){
                        $related404->the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" class="add_404-post">
                            <a href="<?php the_permalink(); ?>" class="add_404-a">
                                <?php if( has_post_thumbnail()){
                                    the_post_thumbnail( 'full', array(
                                        'loading'       =>  'lazy',
                                        'class'         =>  'add_404-thumbnail'
                                    ));
                                } ?>

                                <?php the_title( '<h2 class="add_404-art-title">', '</h2>' ); ?>
                                <span class="add_404-price">
                                    <span class="add_404-idr">IDR</span>
                                    <?php $harga = get_post_meta( get_the_ID(), 'harga', true );
                                    if( !empty( $harga )){
                                        echo $harga;
                                    } else{
                                        echo '-';
                                    } ?>
                                </span>
                            </a>
                        </article>

                        <?php
                    } ?>
                </div>
                <?php
            }


            wp_reset_postdata();

            ?>
        </div>
    </div>
</div>

<?php
get_footer();