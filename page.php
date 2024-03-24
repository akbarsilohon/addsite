<?php
/**
 * File yang menangani halaman
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

get_header(); ?>

<div class="container">
    <div class="addIs_page">
        <article id="post-<?php the_ID(); ?>" class="add_page-content">
            <div class="page_header">
                <?php the_title( '<h2 class="add_page-title">', '</h2>' );
                if( has_post_thumbnail()){
                    the_post_thumbnail( 'full', array(
                        'class'         =>  'add_page-thumbnail',
                        'loading'       =>  'lazy'
                    ));
                } ?>
            </div>

            <?php 
                $IkanTop = get_option( 'add_single_top' );
                if( !empty( $IkanTop )){ ?>

                <div class="add_ads">
                    <?php echo $IkanTop; ?>
                </div>

                <?php
                }
            ?>

            <div class="page_content">
                <?php the_content(); ?>
            </div>
        </article>

        <div class="add_page-sidebar">
            <?php ADD_PART( 'views/post/page-sidebar' ); ?>
        </div>
    </div>
</div>

<?php
get_footer();