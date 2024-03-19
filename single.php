<?php get_header(); ?>

<div class="container silo_single">
    <div class="silo_post">
        <article id="post-<?php the_ID(); ?>" class="silo_article" itemscope itemtype="https://schema.org/Article">
            <?php silohon_save_post_veiws( get_the_ID() ); ?>

            <div class="article_top">
                <div class="the_cats">
                    <span class="cats_link"><?php silo_cat__(); ?></span>
                </div>
                <?php the_title('<h1 class="single_title" itemprop="headline">', '</h1>'); ?>
                <div class="post_meta">
                    <?php 
                    $def_usr_img = SILO_URI . '/img/favicon.png';
                    $name = get_userdata( $post->post_author );
                    $atr = 'width="50" height="50" class="author_image"';
                    $aut = get_site_icon_url();

                    if( has_site_icon() ){
                        echo '<img '.$atr.' src="'.$aut.'" alt="'.$name->user_nicename.'" />';
                    } else{
                        echo '<img '.$atr.' src="'.$def_usr_img.'" alt="'.$name->user_nicename.'" />';
                    }
                    ?>
                    <div class="meta_right">
                        <span class="author_name">
                            <?php 
                            $name = get_userdata( $post->post_author );
                            echo 'Author: <a href="'.get_author_posts_url( $post->post_author ).'">'.$name->display_name.'</a>';
                            ?>
                        </span>
                        <span class="date_publish">Date: <?php the_time('F d, Y'); ?></span>
                        <?php 
                        // This Date Puslished & Date Modified
                        // You can choose show or not
                        if( get_option( 's_date' ) == 'true' ){ ?>
                            <meta itemprop="datePublished" content="<?php the_time('F d, Y'); ?>">
                            <meta itemprop="dateModified" content="<?php the_modified_date('F d, Y'); ?>">
                        <?php }
                        
                        // This Option for Author schema
                        // You can choose yes or not
                        if( get_option( 's_au' ) == 'true' ){ ?>
                            <div style="display: none;" itemprop="author" itemscope itemtype="https://schema.org/Person">
                                <?php 
                                $name = get_userdata( $post->post_author );
                                echo '<a href="'.get_author_posts_url( $post->post_author ).'" rel="author" title="Post By '.$name->user_nicename.'">'.$name->user_nicename.'</a>';
                                echo '<meta itemprop="name" content="'.$name->user_nicename.'"/>';
                                echo '<meta itemprop="url" content="'.get_author_posts_url( $post->post_author ).'"/>';
                                ?>
                            </div>
                        <?php
                        } ?>
                    </div>
                </div>
                <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php the_ID(); ?>">
                <span style="display: none;" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                    <?php 
                    $uri_img = get_the_post_thumbnail_url();
                    $img_id = get_post_thumbnail_id();
                    $img_meta = wp_get_attachment_image_src($img_id, 'full' );
                    $img_width = $img_meta[1];
                    $img_height = $img_meta[2];
                    echo '<meta itemprop="url" content="'.$uri_img.'">';
                    echo '<meta itemprop="width" content="'.$img_width.'">';
                    echo '<meta itemprop="height" content="'.$img_height.'">';
                    ?>
                </span>
                <?php 
                    // The Post Thumbnails
                    // If This Panel Seting Show, this image can show.
                    if( get_option('silo_thumbnails') == 'true' ){
                        if( has_post_thumbnail()){
                            the_post_thumbnail( 'full', array(
                                'class' => 'single_img',
                                'loading' => 'eager'
                            ));
                        }
                    }
                ?>
            </div>

            <div itemscope itemtype="https://schema.org/CreativeWork">
                <div style="display:none;">
                    <img itemprop="image" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                    <meta itemprop="<?php the_title(); ?>">
                    <meta itemprop="url" content="<?php the_permalink( ); ?>">
                    <meta itemprop="datePublished" content="<?php the_time('F d, Y'); ?>">
                    <meta itemprop="dateModified" content="<?php the_modified_date('F d, Y'); ?>">
                </div>
                <?php 
                    if(!empty( get_option('ads_single_top') )){
                        print( get_option('ads_single_top') );
                    }
                ?>
                <div class="the_content" itemprop="text">
                    <?php the_content(); ?>
                </div>
                <?php 
                    if( !empty( get_option( 'ads_single_bot' ) )){
                        print( get_option( 'ads_single_bot' ) );
                    }
                ?>
            </div>

        </article>
        
        <?php
        // Show Tag if Exist
        the_tags( '<span class="btn_tags"><div class="tags_title">Tags:</div>', ', ', '</span>' );

        // Nex & Prev Post if Option true
        if( get_option('silo_next_prev') == 'true' ){
            the_post_navigation( array(
                'prev_text'  => __( '← %title' ),
                'next_text'  => __( '%title →' ),
                'in_same_term' => true, 
                'taxonomy' => __( 'category' )
            ));
        }

        /**
         * This Partial to Call The related posts.
         * You can choose the number to index relatet posts on silohon Post Setting.
         *  */
        if( get_option('related_post') == 'true' ){
            get_template_part( 'views/aside/related' );
        }

        // Show The Comment Section for single post.
        if( comments_open()){
            comments_template();
        } ?>
    </div>

    <?php get_sidebar(); ?>
</div>

<?php get_footer();