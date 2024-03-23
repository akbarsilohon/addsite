<?php
/**
 * File yang menampilkan postingan dari brand masing - masing smartphone
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

get_header();

if( have_posts() ){ ?>

<div class="container">
    <div class="add_taxinner">
        <div class="add_taxleft">
            <div class="add_section">
                <?php
                $categories = get_the_terms(get_the_ID(), 'speck_category');
                if( $categories && !is_wp_error($categories)){
                    foreach( $categories as $index => $category ){
                        if( $index === 0 ){
                            echo '<span class="add_span">Brand ' . $category->name . '</span>';
                        }
                    }
                }
                ?>
            </div>

            <div class="add_taxlooping">
                <?php while( have_posts()){
                    the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" class="add_taxpost">
                        <a href="<?php the_permalink(); ?>" class="add_taxA">
                            <?php if( has_post_thumbnail()){
                                the_post_thumbnail( 'full', array(
                                    'loading'       =>  'lazy',
                                    'class'         =>  'taxImage'
                                ));
                            } ?>

                            <div class="taxData">
                                <?php the_title( '<h2 class="textTT">', '</h2>' ); ?>
                                <span class="spa">
                                    <span class="spanis">Memori:</span>
                                    <?php
                                    $varian = get_post_meta( get_the_ID(), 'memori', true );
                                    $varianValue = !empty( $varian ) ? $varian : '-';
                                    echo '<span class="spanis_data">' . $varianValue . '</span>';
                                    ?>
                                </span>
                                <span class="spa">
                                    <span class="spanis">Harga:</span>
                                    <?php 
                                    $harga = get_post_meta( get_the_ID(), 'harga', true );
                                    $hargaValue = !empty( $harga ) ? $harga : '-';
                                    echo '
                                    <span class="spanis_idr">IDR</span>
                                    <span class="spanis_harga">' . $hargaValue . '</span>
                                    ';
                                    ?>
                                </span>
                                <span class="spa">
                                    <span class="spanis">Stok:</span>
                                    <?php 
                                    $affiliateLazada = get_post_meta( get_the_ID(), 'lazada', true );
                                    $affiliateShopee = get_post_meta( get_the_ID(), 'shopee', true );
                                    $affiliateBlibli = get_post_meta( get_the_ID(), 'blibli', true );
                                    $affiliateTokped = get_post_meta( get_the_ID(), 'tokopedia', true );

                                    if( empty( $affiliateLazada ) && empty( $affiliateShopee ) && empty( $affiliateBlibli ) && empty( $affiliateTokped ) ){
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
                } ?>
            </div>

            <div class="add_paginate">
                <?php echo paginate_links( array(
                    'mid_size'      =>  2,
                    'show_all'      =>  false,
                    'prev_text'     =>  '<< Prev',
                    'next_text'     =>  'Next >>'
                )); ?>
            </div>

        </div>

        <div class="add_texright">
            <div class="add_section">
                <span class="add_span">Semua Merk</span>
            </div>

            <div class="add_merkInner">
                <?php 
                $categories = get_terms( array(
                    'taxonomy'          =>  'speck_category',
                    'hide_empty'        =>  false
                ));

                if( ! empty( $categories ) && ! is_wp_error( $categories )){ ?>

                    <ul class="add_cat_ul">
                        <?php foreach( $categories as $category ){ ?>

                            <li class="add_cat_li">
                                <a href="<?php echo esc_url( get_term_link( $category )); ?>" class="add_cat_link">
                                    <?php echo esc_html( $category->name ); ?>
                                </a>
                            </li>

                            <?php
                        } ?>
                    </ul>

                    <?php
                }
                
                ?>
            </div>
        </div>
    </div>
</div>

<?php
}

get_footer();