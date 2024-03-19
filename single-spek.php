<?php get_header(); ?>

<div class="container">
    <div class="spek_post">
        <div class="inner_spek_post">
            <div class="spek_breadchrume">
                <small>
                    <a href="/">Home</a> &gt; <a href="/spek">Spesifikasi</a>
                    <?php
                    // Mendapatkan daftar kategori untuk entri "Spek" saat ini
                    $categories = get_the_terms(get_the_ID(), 'brand');

                    if ($categories && !is_wp_error($categories)) {
                        echo '&gt;';
                        foreach ($categories as $index => $category) {
                            // Output hanya tautan untuk kategori pertama dan teks untuk sisanya
                            if ($index === 0) {
                                echo ' <a href="' . esc_url(get_term_link($category)) . '">' . esc_html($category->name) . '</a>';
                            } else {
                                echo ' ' . esc_html($category->name);
                            }
                        }
                    }
                    ?>
                </small>
            </div>
            <header class="spek_header">
                <?php if( has_post_thumbnail() ){
                    the_post_thumbnail( 'full', array(
                        'class'         =>  'spek_img_thumb',
                        'loading'       =>  'lazy'
                    ) );
                } ?>
                <div class="spek_data">
                    <?php the_title('<h2 class="spek_single_title">', '</h2>'); ?>

                    <?php $harga = get_post_meta( get_the_ID(), 'harga', true );
                        if( !empty( $harga )) : ?>
                    <div class="spek_box_data">
                        <span class="info_harga">Harga</span>
                        <span class="harga_net">
                            <?php echo 'Rp '. $harga .''; ?>
                        </span>
                        <span class="info_varian">
                            <?php $data_varian = get_post_meta( get_the_ID(), 'varian_hp', true );
                            $varian = !empty( $data_varian ) ? $data_varian : 'No varian';
                            echo '(' . $varian . ')'; ?>
                        </span>
                        <span style="margin-top: -13px;" class="info_varian"><small>* Harga lebih murah melalui link dibawah</small></span>
                        <div class="box_action">
                            <!-- Shopee -->
                            <button class="box_shopee">
                                <?php $data_shopee = get_post_meta( get_the_ID(), 'link_shopee', true );
                                $shopee = !empty( $data_shopee ) ? $data_shopee : '#';
                                echo '<a href="' . $shopee . '" target="_blank" class="box_url_action">Shopee</a>'; ?>
                            </button>

                            <!-- Lazada -->
                            <button class="box_lazada">
                                <?php $data_lazada = get_post_meta( get_the_ID(), 'link_lazada', true );
                                $lazada = !empty( $data_lazada ) ? $data_lazada : '#';
                                echo '<a href="' . $lazada . '" target="_blank" class="box_url_action">Lazada</a>'; ?>
                            </button>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </header>

            <!-- Fitur Phones -->
            <?php $fitur_hp = get_post_meta( get_the_ID(), 'fitur_hp', true );
                if( is_array( $fitur_hp ) && !empty( $fitur_hp ) ){ ?>
                    <section class="spek_fitur">
                        <h3 class="fitur_hp">Fitur Unggulan</h3>
                        <ul class="data_fitur">
                            <?php foreach( $fitur_hp as $fitur ) : ?>
                                <li class="fitur_list">
                                    <?php echo esc_html( $fitur ); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <p class="link_review">
                            <?php $review = get_post_meta( get_the_ID(), 'review_link', true );
                            if( !empty( $review ) ){
                                echo '<a href="' . $review . '">Kelebihan & Kekurangan &#8594;</a>';
                            } ?>
                        </p>
                    </section>
                    <?php
                } ?>

            <!-- article spek -->
            <article id="post-<?php the_ID() ?>" class="article_post_body">
                <h3 class="spek_hp">Tabel Spesifikasi</h3>
                <?php the_content(); ?>
            </article>

            <?php get_template_part( 'views/aside/spek', 'related' ); ?>
        </div>
        
        <?php get_template_part( 'views/aside/spek', 'single' ); ?>

    </div>
</div>

<?php get_footer();