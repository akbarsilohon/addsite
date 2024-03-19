<aside class="spek_side">
    <div class="space_sidebar"></div>
    <?php 
        $categories = get_terms(array(
            'taxonomy' => 'spek_category', // Ganti dengan nama taksonomi yang sesuai
            'hide_empty' => false, // Tampilkan bahkan jika kategori tidak memiliki postingan terkait
        ));

        if (!empty($categories) && !is_wp_error($categories)) { ?>
            <h3 class="spek_hp_tb">Brand Smartphone</h3>
            <ul class="list_brand">
                <?php foreach( $categories as $category ) : ?>
                    <li class="is_branding">
                        <a href="<?php echo esc_url(get_term_link( $category ) ); ?>" class="link_brand">
                            <?php echo esc_html($category->name); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php
        }
        
        // Popular Posts ------------
        // --------------------------
        $popular = new WP_Query(
            array(
                'post_type'         =>  'post',
                'posts_per_page'    =>  8,
                'meta_key'          =>  'silohon_post_views',
                'orderby'           =>  'meta_value_num',
                'order'             =>  'DESC'
            )
        );

        if( $popular->have_posts() ){ ?>
            <h3 class="spek_hp_tb">Popular Smartphone</h3>
            <ul class="list_brand">
                <?php while( $popular->have_posts() ){
                    $popular->the_post(); ?>
                    <li class="is_posts">
                        <a href="<?php the_permalink(); ?>" class="link_brand">
                            <?php the_title(); ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        <?php }

        wp_reset_postdata();


        // Recent Posts ---------------
        // ----------------------------
        $respos = new WP_Query(
            array(
                'post_type'         =>  'post',
                'posts_per_page'    =>  10,
                'category_name'     =>  'smartphone',
            )
        );

        if( $respos->have_posts() ){ ?>
            <h3 class="spek_hp_tb">New Smartphone</h3>
            <ul class="list_brand">
                <?php while( $respos->have_posts() ){
                    $respos->the_post(); ?>
                    <li class="is_posts">
                        <a href="<?php the_permalink(); ?>" class="link_brand">
                            <?php the_title(); ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        <?php }

        wp_reset_postdata();
    ?>
</aside>