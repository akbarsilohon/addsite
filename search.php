<?php 
/**
 * Theme Name: Search
 * @package silo */
get_header();

if( have_posts() ){ ?>

<div class="container this_result">
    <h3 class="this_classes">Search Result for <em>"<?php echo $s; ?>"</em></h3>
    <div class="my_result">
        <?php while( have_posts() ){
            the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="search_result" rel="bookmark" title="<?php the_title(); ?>">
                <?php 
                    if( has_post_thumbnail()){
                        the_post_thumbnail( 'medium', array(
                            'class' => 'result_img',
                            'loading' => 'lazy'
                        ));
                    }
                ?>
                <div class="result_body">
                    <span class="meta"><?php silo_cats(); ?></span>
                    <span class="meta">/</span>
                    <span class="meta"><?php the_time('F d, Y'); ?></span>
                    <?php the_title('<h2 class="result_title">', '</h2>');
                        the_excerpt(); ?>
                </div>
            </a>
        <?php } ?>
    </div>

    <div class="silo_paginate">
        <?php echo paginate_links( array(
            'mid_size' => 2
        )); ?>
    </div>
</div>

<?php } else{
    get_template_part( 'views/search', 'empty' );
}

get_footer();