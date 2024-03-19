<?php get_header();

if( have_posts() ){ ?>

<div class="container silo_looping">
    <div class="looping">
        <div class="loop_title">
            <span class="__title">
                <?php 
                    if( is_category()){
                        echo silo_cats();
                    } elseif( is_date()){
                        echo 'Post By Date';
                    } elseif( is_tag()){
                        echo single_tag_title();
                    } elseif( is_author()){
                        echo 'Post By: '; the_author();
                    }
                ?>
            </span>
        </div>

        <ul class="__loop">
            <?php while( have_posts() ){
                the_post(); ?>
                <li class="___loop">
                    <a href="<?php the_permalink(); ?>" rel="bookmark" class="loop_link">
                        <?php 
                            if( has_post_thumbnail()){
                                the_post_thumbnail( 'medium', array(
                                    'class' => 'related_img',
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
            <?php } ?>
        </ul>
        <div class="silo_paginate">
            <?php echo paginate_links( array(
                'mid_size' => 2
            )); ?>
        </div>
    </div>

    <?php get_sidebar(); ?>
</div>

<?php } else{
    get_template_part( 'views/empty' );
}

get_footer();