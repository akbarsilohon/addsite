<?php get_header();

// Spesification Query --------
$spekArgs = array(
    'post_type'             =>  'spek',
    'post_status'           =>  'publish',
    'posts_per_page'        =>  6
);

$spek = new WP_Query( $spekArgs );
if( $spek->have_posts()){
    // The condition if hash type posts spek only
    ?>
    <div class="container">
        <div class="adsIntop"><?php echo get_option( 'ads_single_top' ); ?></div>
        
        <div class="spekSection">
            <div class="spekT">
                <h3 class="spekS">Smartphone & Tablet</h3>
            </div>

            <div class="spekInner">
                <?php while( $spek->have_posts()){
                    $spek->the_post(); ?>

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

                    <?php
                } ?>
            </div>

            <a href="/spek" class="spekV">View All >>></a>
        </div>
    </div>
    <?php
}

wp_reset_query();
wp_reset_postdata();

// Normal posts(); ---------------
if( have_posts()){ ?>
    <div class="container">
        <div class="spekPost">
            <div class="spekP">
                <div class="spekT">
                    <h3 class="spekS">Article <?php echo bloginfo( 'name' ); ?></h3>
                </div>

                <div class="spekPloop">
                    <?php while( have_posts()){
                        the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" class="spekArt_post">
                            <a href="<?php the_permalink(); ?>" class="spekArt_uri">
                                <?php if( has_post_thumbnail()){
                                    the_post_thumbnail( 
                                        'full', 
                                        array(
                                            'loading'   =>  'lazy',
                                            'class'     =>  'spekArt_thum'
                                        ));
                                } else{
                                    echo '<img class="spekArt_thum" src="' . SILO_URI . '/img/no-img.jpg' . '" alt="' . get_the_title() . '">';
                                } ?>

                                <?php the_title( '<h2 class="spekArt_title">', '</h2>' ); ?>
                            </a>
                        </article>

                        <?php
                    } ?>
                </div>

                <a href="/blog" class="spekV">Goto Blog >>></a>

            </div>


            <div class="spekSid">
                <div class="spekT">
                    <h3 class="spekS">All Brands</h3>
                </div>

                <?php 
                    $categories = get_terms(array(
                        'taxonomy' => 'brand',
                        'hide_empty' => false,
                    ));

                    if( !empty($categories) && !is_wp_error($categories)){ ?>

                        <ul class="list_brand">
                            <?php foreach( $categories as $category ){ ?>
                                <li class="is_branding">
                                    <a href="<?php echo esc_url(get_term_link( $category ) ); ?>" class="link_brand">
                                    <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css">  .st0{fill:#000000;}  </style> <g> <path class="st0" d="M383.297,0H128.688C97.375,0,72,25.375,72,56.688v398.625C72,486.625,97.375,512,128.688,512h254.609 C414.609,512,440,486.625,440,455.313V56.688C440,25.375,414.609,0,383.297,0z M260,483.984c-8.094,0-14.672-6.563-14.672-14.672 c0-8.094,6.578-14.656,14.672-14.656s14.672,6.563,14.672,14.656C274.672,477.422,268.094,483.984,260,483.984z M392,424H120V64 h272V424z"></path> <path class="st0" d="M209.781,312.063c0.797,0.438,1.734,0.422,2.516-0.031l105.922-63.25c0.766-0.422,1.219-1.25,1.219-2.125 c0-0.859-0.453-1.688-1.219-2.125l-105.922-63.25c-0.781-0.438-1.719-0.453-2.516,0c-0.766,0.438-1.25,1.25-1.25,2.156v63.219 v63.234C208.531,310.797,209.016,311.609,209.781,312.063z"></path> </g> </g></svg>
                                        <?php echo esc_html($category->name); ?>
                                    </a>
                                </li>
                                <?php
                            } ?>
                        </ul>

                        <?php
                    }
                
                ?>
            </div>
        </div>
    </div>
<?php
}

get_footer();