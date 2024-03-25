<?php
/**
 * Archive tema wordpress silohon add site
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

get_header(); ?>

<div class="container">
    <div class="arcPost">
        <div class="arcPost-left">
            <div class="add_section">
                <span class="add_span">
                    <?php
                    if( is_category()) echo add_cats();
                    if( is_date()) echo 'Post by date';
                    if( is_tag()) echo single_tag_title();
                    if( is_author()) echo 'Post By: ' . the_author();
                    ?>
                </span>
            </div>

            <div class="arcPost-loop">
                <?php if( have_posts()){
                    while( have_posts()){
                        the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" class="arcPost-list">
                            <a href="<?php the_permalink(); ?>" class="arcPost-a">
                                <?php if( has_post_thumbnail()){
                                    the_post_thumbnail( 'full', array(
                                        'class'         =>  'arcPost-thumbnail',
                                        'loading'       =>  'lazy'
                                    ));
                                } ?>

                                <div class="arcPost-meta">
                                    <?php the_title( '<h2 class="arcPost-title">', '</h2>' ); ?>
                                    <?php the_excerpt(); ?>
                                </div>
                            </a>
                        </article>

                        <?php
                    }
                } ?>
            </div>

            <div class="add_paginate">
                <?php echo paginate_links( array(
                    'mid_size'      =>  2,
                    'show_all'      =>  false,
                    'prev_text'     =>  '<< Prev',
                    'next_text'     =>  'Next >>'
                )); ?>
            </div>
        </div>

        <div class="arcPost-right">
            <?php ADD_PART( 'views/post/arc-side' ); ?>
        </div>
    </div>
</div>

<?php
get_footer();