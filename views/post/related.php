<?php
/**
 * Include artikel terkait untuk postingan single post
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

$relatedCheck = get_option( 'add_konten_terkait' );
if( !empty( $relatedCheck ) && $relatedCheck === 'true' ){
    $countPage = get_option( 'add_jumlah_konten_terkait' );
    $relatedPerPage = !empty( $countPage ) ? $countPage : 4;

    $related = get_posts( array(
        'category__in'          =>  wp_get_post_categories( get_the_ID()),
        'numberposts'           =>  $relatedPerPage,
        'post__not_in'          =>  array( get_the_ID() )
    ));

    if( $related ){ ?>
        <div class="addRelatedBox">
            <div class="add_section ssmargin">
                <span class="add_span">Artikel Terkait</span>
            </div>

            <div class="addRelated-loop">
                <?php foreach( $related as $post ){
                    setup_postdata( $post ); ?>

                    <article id="post-<?php the_ID(); ?>" class="addRelated-post">
                        <a href="<?php the_permalink(); ?>" class="addRelated-a">
                            <?php if( has_post_thumbnail()){
                                the_post_thumbnail( 'full', array(
                                    'class'         =>  'addRelated-thumb',
                                    'loading'       =>  'lazy'
                                ));
                            } ?>

                            <?php the_title( '<h2 class="addRelated-title">', '</h2>' ); ?>
                        </a>
                    </article>

                    <?php
                }
                
                wp_reset_postdata(); ?>
            </div>
        </div>
        <?php
    }
}