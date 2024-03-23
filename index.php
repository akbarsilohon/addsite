<?php
/**
 * Root tema silohon add site
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

get_header();

$speckPost = new WP_Query( array(
    'post_type'             =>  'speck',
    'posts_per_page'        =>  6,
    'post_status'           =>  'publish'
));

if( $speckPost->have_posts()){ ?>

<div class="container">
    <div class="spekInner">
        <div class="add_section">
            <span class="add_span">Smartphone Terbaru</span>
        </div>

        <div class="spekArt">
            <?php while( $speckPost->have_posts()){
                $speckPost->the_post(); ?>

                <article id="post-<?php the_ID(); ?>" class="spek_artpost">
                    <a href="<?php the_permalink(); ?>" class="spek_a">
                        <?php if( has_post_thumbnail()){
                            the_post_thumbnail( 'full', array(
                                'loading'       =>  'lazy',
                                'class'         =>  'spek_img'
                            ));
                        } else{
                            $spekDefImage = ADD_URI . '/asset/image/no-img-spek.jpg';
                            echo '<img class="spek_img" src="'. $spekDefImage .'">';
                        } ?>

                        <?php the_title( '<h2 class="spek_t">', '</h2>' ); ?>
                        <span class="spek_price">
                            <span class="idr">IDR</span>
                            <?php 
                            $harga = get_post_meta( get_the_ID(), 'harga', true );
                            if( !empty( $harga )){
                                echo $harga;
                            } else{
                                echo ' -';
                            }
                            ?>
                        </span>
                    </a>
                </article>

                <?php
            } ?>
        </div>

        <div class="spekSemua">
            <a href="/speck" class="spekAll">Lihat Semua</a>
        </div>
    </div>
</div>

<?php
}

wp_reset_postdata();
wp_reset_query();

if( have_posts()){ ?>

<?php $iklanKedua = get_option( 'add_ads_header' );
if( !empty( $iklanKedua )){ ?>
<div class="container">
    <div class="add_ads"><?php echo $iklanKedua; ?></div>
</div>
<?php
} ?>

<div class="container">
    <div class="add_post">
        <div class="post_article">
            <div class="add_section">
                <span class="add_span">Artikel Terbaru</span>
            </div>

            <div class="add_post-list">
                <?php while( have_posts()){
                    the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" class="add_post-loop">
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
                } ?>
            </div>

            <?php 
                $jikaAdalagi = paginate_links();
                if( $jikaAdalagi ){ ?>
                    <div class="add_load_more">
                        <a class="add_btn_load" data-page="1" data-url="<?php echo admin_url( 'admin-ajax.php' ); ?>">Load More</a>
                    </div>
                    <?php
                }
            ?>
        </div>

        <aside class="add_merk">
            <div class="add_section">
                <span class="add_span">Brand Smartphone</span>
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
        </aside>
    </div>
</div>

<?php
}

get_footer();