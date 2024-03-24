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

            </article>

            <!-- Related Post -->
        </div>

        <!-- Sidebar -->
        <div class="add_sibebar_single"></div>
    </div>
</div>

<?php
get_footer();