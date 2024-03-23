<?php
/**
 * File yang menangani dan menampilan halaman single postingan
 * postingan dengan tipe speck
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

get_header(); ?>

<div class="container">
    <div class="spcGrid">
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
            <div class="speckHeader">
                <?php if( has_post_thumbnail()){
                    the_post_thumbnail( 'full', array(
                        'class'         =>  'speckThumb',
                        'loading'       =>  'lazy'
                    ));
                } ?>
    
                <div class="spcData_top">
                    <?php the_title( '<h2 class="spcH_title">', '</h2>' ); ?>
                    <div class="spcBox_data">
                        <!-- Harga -->
                        <span class="spcHarga">
                            <span class="scpIDR">IDR</span>
                            <?php $harga = get_post_meta( get_the_ID(), 'harga', true );
                            $hargaValune = !empty( $harga ) ? $harga : '-';
                            echo $hargaValune; ?>
                        </span>
    
                        <!-- varian memori -->
                        <span class="spcVarian">
                            <?php $varian = get_post_meta( get_the_ID(), 'memori', true );
                            if( !empty( $varian )){
                                echo 'Memori (' . $varian . ')';
                            } else{
                                echo 'No Varian';
                            } ?>
                        </span>
    
                        <div class="spcBox_btn">
                            <?php 
                            $Lazada = get_post_meta( get_the_ID(), 'lazada', true );
                            $Shopee = get_post_meta( get_the_ID(), 'shopee', true );
                            $Blibli = get_post_meta( get_the_ID(), 'blibli', true );
                            $Tokped = get_post_meta( get_the_ID(), 'tokopedia', true );
                            if( !empty( $Lazada )){
                                echo '<button class="spcBtn lazada">
                                        <a href="'. esc_url( $Lazada ) .'">Lazada</a>
                                    </button>';
                            } if( !empty( $Shopee )){
                                echo '<button class="spcBtn shopee">
                                        <a href="'. esc_url( $Shopee ) .'">Shopee</a>
                                    </button>';
                            } if( !empty( $Blibli )){
                                echo '<button class="spcBtn blibli">
                                        <a href="'. esc_url( $Blibli ) .'">Blibli</a>
                                    </button>';
                            } if( !empty( $Tokped )){
                                echo '<button class="spcBtn tokped">
                                        <a href="'. esc_url( $Tokped ) .'">TokoPedia</a>
                                    </button>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Iklan 1 -->
            <?php $iklanTop = get_option( 'add_single_top' );
            if( !empty( $iklanTop )){ ?>
                <div class="add_ads"><?php echo $iklanTop; ?></div>
                <?php
            } ?>
    
            <!-- list fitur hp Jika ada -->
            <div class="spcFitur">
                <?php $fiturs = get_post_meta( get_the_ID(), 'fitur', true );
                if( is_array( $fiturs ) && !empty( $fiturs )){ ?>
                <h3 class="spcFtitle">Fitur Unggulan</h3>
    
                <ul class="spcUloop">
                    <?php foreach( $fiturs as $fitur ){ ?>
                        <li class="spcList"><?php echo esc_html( $fitur ); ?></li>
                        <?php
                    } ?>
                </ul>
                <?php
                } ?>
            </div>
    
            <!-- link review -->
            <?php $review = get_post_meta( get_the_ID(), 'review', true );
            if( !empty( $review)){ ?>
                <div class="spcReview">
                    <a href="<?php echo $review; ?>" class="scpLinkReview">
                        Baca Review <?php the_title(); ?> &#8594;
                    </a>
                </div>
                <?php
            } ?>
    
            <!-- Iklan 2 -->
            <?php $iklanTop = get_option( 'add_single_top' );
            if( !empty( $iklanTop )){ ?>
                <div class="add_ads"><?php echo $iklanTop; ?></div>
                <?php
            } ?>
    
            <!-- Artikel -->
            <article id="post-<?php the_ID() ?>" class="speckKonten-body">
                <h3 class="speckKonten-title">Tabel Spesifikasi</h3>
                <div class="spcContent_inner">
                    <?php the_content(); ?>
                </div>
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
    
        <div class="speckSingle-right">
            <div class="add_section">
                <span class="add_span">Artikel Terbaru</span>
            </div>
    
            <?php $newPost = new WP_Query( array(
                'post_type'         =>  'post',
                'posts_per_page'    =>  6,
                'post_status'       =>  'publish'
            ));
            
            if( $newPost->have_posts()){ ?>
                <div class="add_newpostLoop">
                    <?php while( $newPost->have_posts()){
                        $newPost->the_post(); ?>
    
                        <a href="<?php the_permalink(); ?>" class="add_sidPost">
                            <?php if( has_post_thumbnail()){
                                the_post_thumbnail( 'full', array(
                                    'class'     =>  'spcAsideImg',
                                    'loading'   =>  'lazy'
                                ));
                            } ?>
    
                            <div class="spcAside_data">
                                <span class="add_spcCats"><?php add_cats() ?></span>
                                <?php the_title( '<h3 class="spcAside_title">', '</h3>' ); ?>
                            </div>
                        </a>
    
                        <?php
                    } ?>
                </div>
                <?php
            }
            
            ?>
        </div>
    </div>
</div>

<?php
get_footer();