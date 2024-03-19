<div class="container silo_looping">
    <div class="looping">
        <div class="loop_title">
            <span class="__title">Blog Post</span>
        </div>

        <ul class="__loop">
            <?php 
            while( have_posts() ){
                the_post(); ?>
                <li class="___loop">
                    <a href="<?php the_permalink(); ?>" rel="bookmark" class="loop_link">
                        <?php 
                            if( has_post_thumbnail()){
                                the_post_thumbnail( 'medium', array(
                                    'loading' => 'lazy'
                                ));
                            }
                        ?>
                        <div class="loop_body">
                            <span class="metas"><?php silo_cats(); ?></span>
                            <span class="metas">/</span>
                            <span class="metas"><?php the_time('F d, Y'); ?></span>
                            <?php the_title('<h2 class="post_title">', '</h2>'); ?>
                            <?php the_excerpt(); ?>
                        </div>
                    </a>
                </li>
            <?php }
            ?>
        </ul>

        <div class="silo_paginate">
            <?php echo paginate_links( array(
                'mid_size' => 2
            )); ?>
        </div>
    </div>

    <?php get_sidebar(); ?>
</div>