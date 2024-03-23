<?php 
/**
 * Inlude spesifikasi terkait yang sama dengan brand
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

$categories = get_the_terms(get_the_ID(), 'speck_category');
if( $categories && !is_wp_error( $categories )){
    $category_names = wp_list_pluck($categories, 'name');

    $related_args = array(
        'post_type' => 'speck',
        'posts_per_page' => 10,
        'post__not_in' => array(get_the_ID()),
        'tax_query' => array(
            array(
                'taxonomy' => 'speck_category',
                'field' => 'term_id',
                'terms' => wp_list_pluck($categories, 'term_id'),
            ),
        ),
    );

    $related_posts = new WP_Query($related_args);

    if( $related_posts->have_posts()){ ?>
        <div class="add_related-brand">
            <div class="add_section">
                <span class="add_span">
                    <?php echo 'Hp ' . esc_html(implode(", ", $category_names)) . ' Lainnya'; ?>
                </span>
            </div>

            <div class="spcRelated-looping">
                <?php while( $related_posts->have_posts()){
                    $related_posts->the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" class="spcRelated-art">
                        <a href="<?php the_permalink(); ?>" class="spcRelated-a">
                            <?php if( has_post_thumbnail()){
                                the_post_thumbnail( 'full', array(
                                    'class'         =>  'spcRelated-img',
                                    'loading'       =>  'lazy'
                                ));
                            } ?>

                            <?php the_title( '<h2 class="spcRelated-title">', '</h2>' ); ?>
                            <span class="spcRelated-price">
                                <span class="spcRelated-idr">IDR</span>
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
        </div>
        <?php
    }

    wp_reset_postdata();
}


$newSpeck = new WP_Query( array(
    'post_type'         =>  'speck',
    'posts_per_page'    =>  8,
    'post_status'       =>  'publish',
    'post__not_in' => array(get_the_ID())
));

if( $newSpeck->have_posts()){ ?>

<div class="add_related-brand">
    <div class="add_section">
        <span class="add_span">Smartphone Terbaru</span>
    </div>
    
    <div class="spcRelated-looping">
        <?php while( $newSpeck->have_posts()){
            $newSpeck->the_post(); ?>
            <article id="post-<?php the_ID(); ?>" class="spcRelated-art">
                <a href="<?php the_permalink(); ?>" class="spcRelated-a">
                    <?php if( has_post_thumbnail()){
                        the_post_thumbnail( 'full', array(
                            'class'         =>  'spcRelated-img',
                            'loading'       =>  'lazy'
                        ));
                    } ?>

                    <?php the_title( '<h2 class="spcRelated-title">', '</h2>' ); ?>
                    <span class="spcRelated-price">
                        <span class="spcRelated-idr">IDR</span>
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
    </div>

<?php
}

wp_reset_postdata();