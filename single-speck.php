<?php
/**
 * File yang menangani dan menampilan halaman single postingan
 * postingan dengan tipe speck
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

get_header(); ?>

<div class="container">
    <div class="speckSingle-left">
        <div class="spcBreadchrume">
            <a href="<?php bloginfo( 'url' ); ?>">
                <span class="spcHome">Home</span>
            </a>
            <span class="spcSparat">>></span>
            <a href="<?php echo esc_url( home_url( '/speck/')); ?>">
                <span class="spcSpeck">Brand</span>
            </a>
            <span class="spcSparat">>></span>
            <?php 
                $categories = get_the_terms(get_the_ID(), 'speck_category');
                if( $categories && !is_wp_error( $categories )){
                    foreach( $categories as $index => $category ){
                        if( $index === 0 ){
                            echo '<a href="' . esc_url( get_term_link( $category )) . '">
                                    <span class="spcBrand">' . esc_html( $category->name ) . '</span>
                                </a>';
                        }
                    }
                }
            ?>
        </div>

        <!-- Bagian header -->
        <div class="speckHeader"></div>

        <!-- Iklan 1 -->
        <?php $iklanTop = get_option( 'add_single_top' );
        if( !empty( $iklanTop )){ ?>
            <div class="add_ads"><?php echo $iklanTop; ?></div>
            <?php
        } ?>

        <!-- list fitur hp Jika ada -->
        <div class="spcFitur"></div>

        <!-- Iklan 2 -->
        <?php $iklanTop = get_option( 'add_single_top' );
        if( !empty( $iklanTop )){ ?>
            <div class="add_ads"><?php echo $iklanTop; ?></div>
            <?php
        } ?>

        <!-- Artikel -->
        <article id="post-<?php the_ID() ?>" class="speckKonten-body">
            <h3 class="speckKonten-title">Tabel Spesifikasi</h3>
            <?php the_content(); ?>
        </article>

        <!-- Iklan 3 -->
        <?php $iklanBot = get_option( 'add_ads_setelah_artikel' );
        if( !empty( $iklanBot )){ ?>
            <div class="add_ads"><?php echo $iklanBot; ?></div>
            <?php
        } ?>

        <!-- Merk hp terkait -->

        <!-- Hp update terbaru -->
    </div>

    <div class="speckSingle-right"></div>
</div>

<?php
get_footer();