<?php
/**
 * File yang menangani dan menampilkan halaman single postinga
 * untuk tipe postingan post
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

get_header(); ?>

<div class="container">
    <div class="add_single">
        <!-- Artikel -->
        <div class="addInner">
            <article id="post-<?php the_ID(); ?>" class="addArticle">
                <div class="addArticle-top">
                    <?php ADD_PART( 'views/post/header' ); ?>
                </div>
    
                <div class="addArticle-bot">
                    <?php the_content(); ?>
                </div>

                <?php 
                $ikalnAfter = get_option( 'add_ads_setelah_artikel' );
                if( !empty( $ikalnAfter )){ ?>
                    <div class="add_ads">
                        <?php echo $ikalnAfter; ?>
                    </div>
                    <?php
                }
                ?>

                <?php 
                /**
                 * Tags template silohon-add-site
                 * @package silohon-add-site
                 * @link https://github.com/akbarsilohon/addsite.git
                 */
                the_tags(
                    '<div class="add_tags"><span class="add_tags-title">Topik:</span>',
                    '',
                    '</div>'
                );
                ?>

                <?php 
                /**
                 * Postingan selanjutnya dan postingan sebelumnya
                 * @package silohon-add-site
                 * @link https://github.com/akbarsilohon/addsite.git
                 */
                $nexPrev = get_option( 'add_next_konten' );
                if( !empty( $nexPrev ) && $nexPrev === 'true' ){ ?>
                    <div class="add_post-navigation">
                        <?php the_post_navigation( array(
                            'prev_text'  => __( '← %title' ),
                            'next_text'  => __( '%title →' ),
                            'in_same_term' => true, 
                            'taxonomy' => __( 'category' )
                        )); ?>
                    </div>
                    <?php
                }
                
                ?>

            </article>

            <!-- Related Post -->
            <?php ADD_PART( 'views/post/related' ); ?>

            <?php 
            $checkomentar = get_option( 'add_izin_komentar' );
            if( !empty( $checkomentar ) && $checkomentar === 'true' ){
                if( comments_open() ){
                    comments_template();
                }
            }
            ?>
        </div>

        <!-- Sidebar -->
        <div class="add_sibebar_single">
            <?php ADD_PART( 'views/post/single-sidebar' ); ?>
        </div>
    </div>
</div>

<?php
get_footer();