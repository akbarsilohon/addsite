<?php
// Related Posts ---------------------
// -----------------------------------
$relCount = get_option('related_post_count');
$related = get_posts( 
    array( 'category__in' => wp_get_post_categories($post->ID),
    'numberposts' => $relCount,
    'post__not_in' => array($post->ID) )
);

if( $related ){ ?>
<aside class="silo_related">
    <div class="related__">
        <span class="related_title">Related Posts</span>
    </div>

    <div class="related_posts">
        <?php foreach( $related as $post ){
            setup_postdata( $post ); ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark" class="related_link">
                <?php 
                    if( has_post_thumbnail()){
                        the_post_thumbnail( 'medium', array(
                            'class' => 'related_img',
                            'loading' => 'lazy'
                        ));
                    }
                ?>
                <div class="related_body">
                    <span class="meta"><?php the_author(); ?></span>
                    <span class="meta">/</span>
                    <span class="meta"><?php the_time('F d, Y'); ?></span>
                    <?php the_title('<h2 class="related_post_title">', '</h2>'); ?>
                </div>
            </a>
        <?php } wp_reset_postdata(); ?>
    </div>
</aside>
<?php }