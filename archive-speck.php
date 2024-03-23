<?php
/**
 * File yang menampilkan list achrive post tipe speck
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

get_header();

if( have_posts()){ ?>

<div class="container">
    <div class="dataSpeckAll">
        <!-- Pencarian hape -->
        <div class="speckSearch">
            <span class="cariSpeck">Smartphone dan Tablet</span>
            <form action="<?php echo esc_url(home_url('/speck/')); ?>" method="get" class="speckForm">
                <input type="text" name="s" id="formCariHape" value="<?php echo get_search_query(); ?>" placeholder="Cari Smarphone disini..." />
            </form>
        </div>

        <!-- Looping semua smartphone -->
        <div class="loopingSpeckAll">
            <?php while( have_posts()){
                the_post(); ?>

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
            } ?>
        </div>

        <!-- load more post -->
        <?php if( paginate_links()){ ?>
            <div class="allSpeck-btn">
                <a class="add_allSpeck-btn" data-page="1" data-url="<?php echo admin_url( 'admin-ajax.php' ); ?>">Load More</a>
            </div>
            <?php
        } ?>
    </div>
</div>

<?php
}

get_footer();