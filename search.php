<?php
/**
 * List hasil dari pencarian untuk postingan tipe post
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

get_header(); ?>

<div class="container">
    <div class="post_result">
        <?php if( have_posts()) : ?>
            <div class="post_result-heading">
                <p>Hasil: </p> <span class="resultKeys">"<?php echo $s; ?>"</span>
            </div>

            <div class="post_result-looping">
                <?php while( have_posts()) : ?>
                    <?php the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" class="post_result-post">
                        <a href="<?php the_permalink(); ?>" class="post_result-a">
                            <?php if( has_post_thumbnail()){
                                the_post_thumbnail( 'full', array(
                                    'class'         =>  'post_result-thumb',
                                    'loading'       =>  'lazy'
                                ));
                            } else{
                                $spekDefImage = ADD_URI . '/asset/image/no-img-spek.jpg';
                                echo '<img class="post_result-thumb" src="'. $spekDefImage .'">';
                            } ?>

                            <div class="post_result-meta">
                                <div class="__meta">
                                    <span class="result_cats"><?php add_cats(); ?></span>
                                    <span class="sparator">/</span>
                                    <span class="result_date"><?php the_time('F d, Y'); ?></span>
                                </div>

                                <?php the_title( '<h2 class="post_resutl-title">', '</h2>' ); ?>
                            </div>
                        </a>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="add_paginate">
                <?php echo paginate_links( array(
                    'mid_size'      =>  2,
                    'show_all'      =>  false,
                    'prev_text'     =>  '<< Prev',
                    'next_text'     =>  'Next >>'
                )); ?>
            </div>
        <?php else : ?>
            <div class="post_result-heading">
                <p>Hasil:<span class="resultKeys"> "<?php echo $s; ?>" </span> Tidak ditemukan</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();