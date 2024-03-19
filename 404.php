<?php /**
 * Theme Name: 404
 * @package silohon */ get_header(); ?>
<style>
    ._404{
    width: 100%;
    max-width: 500px;
    margin: 40px auto;
    text-align: center;
}
.__404_header{
    font-family: 'Anton';
    color: var(--bl2);
    font-size: 60px;
    letter-spacing: 1px;
    margin-bottom: 20px;
}
.___404{
    font-family: 'Oswald';
    color: var(--bl5);
    font-size: 18px;
}
.silo_new_post{
    width: 100%;
    text-align: center;
    box-sizing: border-box;
    margin-bottom: 20px;
}
.silo_titles{
    width: 100%;
    position: relative;
    transform: skew(-10deg);
    margin-bottom: 10px;
}
span.__titless{
    background-color: var(--link);
    padding: 5px 10px;
    font-family: 'Oswald';
    color: var(--pt1);
    font-size: 16px;
}
span.__titless::before{
    content: '';
    width: 100%;
    height: 2px;
    position: absolute;
    left: 0;
    top: 50%;
    background-color: var(--link);
    z-index: -1;
}
.silos_post{
    list-style: none;
    width: 100%;
    box-sizing: border-box;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-gap: 10px;
}
.silos_new .new_links img{
    width: 100%;
    height: 150px;
    object-fit: cover;
    object-position: center;
}
.new_links .links_body{
    width: 100%;
    box-sizing: border-box;
}
span.metas{
    color: var(--bl3);
    font-family: 'Oswald';
    font-size: 12px;
}
.links_body .the_new_title{
    font-family: 'Oswald';
    font-size: 16px;
    line-height: 20px;
    margin-top: 7px;
}
.silos_new .new_links:hover .links_body .the_new_title{
    color: var(--hover);
    transition: .5s;
}
@media(max-width:780px){
    .silos_post{
        grid-template-columns: repeat(2, 1fr);
    }
    .silos_new{
        margin-bottom: 20px;
    }
}
@media(max-width:580px){
    .silos_post{
        grid-template-columns: 1fr;
    }
    .silos_new{
        margin-bottom: 10px;
    }
    .silos_new .new_links{
        display: grid;
        grid-template-columns: 90px auto;
        grid-gap: 10px;
        box-sizing: border-box;
    }
    .silos_new .new_links img{
        width: 90px;
        height: 90px;
    }
    .new_links .links_body{
        text-align: left;
    }
}
</style>
<div class="container">
    <div class="_404">
        <h1 class="__404_header">404</h1>
        <p class="___404">Page Not Found, Please Visit another page to Read amazing article.</p>
    </div>
    <?php $for_404 = array(
        'post_type' => 'post',
        'posts_per_page' => 4,
    ); $is_new = new WP_Query( $for_404 ); 
    if($is_new->have_posts()) { ?>
    <div class="silo_new_post">
        <div class="silo_titles">
            <span class="__titless">New Posts</span>
        </div>
        <ul class="silos_post">
            <?php while($is_new->have_posts()) : $is_new->the_post(); ?>
            <li class="silos_new">
                <a href="<?php the_permalink() ?>" class="new_links">
                    <?php 
                        if( has_post_thumbnail()){
                            the_post_thumbnail( 'medium', array(
                                'loading' => 'lazy'
                            ));
                        }
                    ?>
                    <div class="links_body">
                        <span class="metas"><?php silo_cats(); ?></span>
                        <span class="metas">/</span>
                        <span class="metas"><?php the_time('F d, Y'); ?></span>
                        <?php the_title('<h2 class="the_new_title">', '</h2>'); ?>
                    </div>
                </a>
            </li>
            <?php endwhile; ?>
        </ul>
    </div>
    <?php } wp_reset_query(); wp_reset_postdata(); ?>
</div>

<?php get_footer(); ?>