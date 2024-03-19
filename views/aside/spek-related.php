<?php 
$categories = get_the_terms(get_the_ID(), 'spek_category');

if ($categories && !is_wp_error($categories)) {
    $category_names = wp_list_pluck($categories, 'name');
    
    $related_args = array(
        'post_type' => 'spek',
        'posts_per_page' => 10,
        'post__not_in' => array(get_the_ID()),
        'tax_query' => array(
            array(
                'taxonomy' => 'spek_category',
                'field' => 'term_id',
                'terms' => wp_list_pluck($categories, 'term_id'),
            ),
        ),
    );

    $related_posts = new WP_Query($related_args);

    if ($related_posts->have_posts()) { ?>
        <div class="spek_loop">
            <h3 class="spek_section_title">
                <?php echo 'Hp ' . esc_html(implode(", ", $category_names)) . ' Lainnya'; ?>
            </h3>
            <div class="spek_looping">
                <?php while ($related_posts->have_posts()){
                    $related_posts->the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" class="spek_article">
                            <a href="<?php the_permalink(); ?>" class="spek_thum_uri">
                                <?php if( has_post_thumbnail() ){
                                    the_post_thumbnail( 'full', array(
                                        'class'         =>  'spek_thum_img',
                                        'loading'       =>  'lazy'
                                    ) );
                                } ?>
                            </a>
                            <a href="<?php the_permalink(); ?>" class="spek_uris">
                                <?php the_title('<h3 class="spek_uri_title">', '</h3>') ?>
                            </a>
                            <span class="spek_price">
                                <?php $harga = get_post_meta( get_the_ID(), 'harga', true );
                                echo $harga; ?>
                            </span>
                        </article>
                <?php } ?>
            </div>
        </div>
        <?php
    }
    wp_reset_postdata();
}


$recentSpek = new WP_Query(
    array(
        'post_type'         =>  'spek',
        'post_status'       =>  'publish',
        'posts_per_page'    =>  10,
        'post__not_in'      =>  array(
            get_the_ID()
        )
    )
);

if( $recentSpek->have_posts() ){ ?>

<div class="spek_loop">
    <h3 class="spek_section_title">Hp Terbaru</h3>
    <div class="spek_looping">
        <?php while( $recentSpek->have_posts() ){
            $recentSpek->the_post(); ?>
            <article id="post-<?php the_ID(); ?>" class="spek_article">
                <a href="<?php the_permalink(); ?>" class="spek_thum_uri">
                    <?php if( has_post_thumbnail() ){
                        the_post_thumbnail( 'full', array(
                            'class'         =>  'spek_thum_img',
                            'loading'       =>  'lazy'
                        ) );
                    } ?>
                </a>
                <a href="<?php the_permalink(); ?>" class="spek_uris">
                    <?php the_title('<h3 class="spek_uri_title">', '</h3>') ?>
                </a>
                <span class="spek_price">
                    <?php $harga = get_post_meta( get_the_ID(), 'harga', true );
                    echo $harga; ?>
                </span>
            </article>
        <?php } ?>
    </div>
</div>

<?php
}

wp_reset_postdata();
