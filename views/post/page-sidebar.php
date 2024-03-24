<?php
/**
 * Include sidebar pada halaman single page
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

$speckSidebar = new WP_Query( array(
    'post_type'         =>  'speck',
    'posts_per_page'    =>  6,
    'post_status'       =>  'publish'
));

if( $speckSidebar->have_posts()){ ?>

<div class="add_section ssmargin">
    <span class="add_span">Rekomendasi Smartphone</span>
</div>

<div class="add_side-smartphone">
    <?php while( $speckSidebar->have_posts()){
        $speckSidebar->the_post(); ?>
        <article id="post-<?php the_ID(); ?>" class="add_side-art">
            <a href="<?php the_permalink(); ?>" class="add_side-art-link">
                <?php if( has_post_thumbnail()){
                    the_post_thumbnail( 'full', array(
                        'class'         =>  'add_side-art-thumb',
                        'loading'       =>  'lazy'
                    ));
                } ?>

                <div class="add_side-art-data">
                    <?php the_title( '<h2 class="add_side-art-title">', '</h2>' ); ?>
                    <span class="side_art-span">
                        <div class="span_add-idr">IDR</div>
                        <?php $harga = get_post_meta( get_the_ID(), 'harga', true );
                        if( !empty( $harga )){
                            echo $harga;
                        } else{
                            echo '-';
                        } ?>
                    </span>
                </div>
            </a>
        </article>
        <?php
    } ?>
</div>

<?php
}

wp_reset_postdata();