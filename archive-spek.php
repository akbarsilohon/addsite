<?php get_header(); ?>

<div class="container">
    <div class="spek_grid">
        <div class="spek_loop">
            <h3 class="spek_section_title">
                Smartphone & Tablet
            </h3>

            <div id="inspek_search">
                <form method="get" action="<?php echo esc_url(home_url('/spek/')); ?>" class="silo_spek_search">
                    <input type="text" name="s" placeholder="Search Here..." value="<?php echo get_search_query(); ?>">
                </form>
            </div>

            <?php $spek_args = array(
                'post_type'         =>  'spek',
                'post_status'       =>  'publish',
                'paged' => get_query_var( 'paged' )
            );
            $spek = new WP_Query( $spek_args );
            if( $spek->have_posts() ) : ?>

            <div class="spek_looping">
                <?php while( $spek->have_posts() ): $spek->the_post(); ?>
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
                <?php endwhile; ?>
            </div>
            <?php endif;
            wp_reset_query();
            wp_reset_postdata(); ?>

            <div class="silo_paginate">
                <?php echo paginate_links( array(
                    'mid_size' => 2
                )); ?>
            </div>
        </div>

        <!-- Sidebar -->
        <?php get_template_part( 'views/aside/spek', 'home' ); ?>
    </div>
</div>

<?php get_footer();