<?php
/**
 * Tambahan custom meta box untuk postingan speck
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */


// Render metabox untuk postingan speck ================
// =====================================================
add_action( 'add_meta_boxes', 'add_tambah_meta_boxes' );
function add_tambah_meta_boxes(){
    add_meta_box( 
        'speck-meta-box', 
        'Detail Spesifikasi Ponsel', 
        'render_speck_meta_box', 
        'speck', 
        'normal', 
        'high'
    );
}

function render_speck_meta_box( $post ){
    $harga = get_post_meta( $post->ID, 'harga', true );
    $memori = get_post_meta( $post->ID, 'memori', true );
    $review = get_post_meta( $post->ID, 'review', true );
    $affiliateLazada = get_post_meta( $post->ID, 'lazada', true );
    $affiliateShopee = get_post_meta( $post->ID, 'shopee', true );
    $affiliateBlibli = get_post_meta( $post->ID, 'blibli', true );
    $affiliateTokped = get_post_meta( $post->ID, 'tokopedia', true );
    $fitur = get_post_meta( $post->ID, 'fitur', true );

    if( !is_array( $fitur )){
        $fitur = array();
    } ?>

    <div class="add_container">
        <!-- Harga ponsel -->
        <div class="add_data">
            <label for="harga">Harga:</label>
            <input type="text" name="harga" id="harga" value="<?php echo esc_attr( $harga ); ?>">
        </div>

        <!-- Varian memori -->
        <div class="add_data">
            <label for="memori">Varian Memori:</label>
            <input type="text" name="memori" id="memori" value="<?php echo esc_attr( $memori ); ?>">
        </div>

        <!-- Article review -->
        <div class="add_data">
            <label for="review">Artikel Review:</label>
            <input type="text" name="review" id="review" value="<?php echo esc_attr( $review ); ?>" placeholder="Link artikel review jika ada...">
        </div>

        <!-- Shopee affiliate -->
        <div class="add_data">
            <label for="shopee">Shopee Affiliate:</label>
            <input type="text" name="shopee" id="shopee" value="<?php echo esc_attr( $affiliateShopee ); ?>" placeholder="Boleh kosong...">
        </div>

        <!-- Lazada affiliate -->
        <div class="add_data">
            <label for="lazada">Lazada Affiliate:</label>
            <input type="text" name="lazada" id="lazada" value="<?php echo esc_attr( $affiliateLazada ); ?>" placeholder="Boleh kosong...">
        </div>

        <!-- Blibli affiliate -->
        <div class="add_data">
            <label for="blibli">Blibli Affiliate:</label>
            <input type="text" name="blibli" id="blibli" value="<?php echo esc_attr( $affiliateBlibli ); ?>" placeholder="Boleh kosong...">
        </div>

        <!-- Tokopedia affiliate -->
        <div class="add_data">
            <label for="tokopedia">Tokopedia Affiliate:</label>
            <input type="text" name="tokopedia" id="tokopedia" value="<?php echo esc_attr( $affiliateTokped ); ?>" placeholder="Boleh kosong...">
        </div>

        <h3 class="fitu_hp_title">Fitur Ponsel</h3>
        <ul class="data_fitur">
            <?php foreach( $fitur as $ftr ){ ?>
                
                <li class="fitur_list">
                    <input type="text" name="fitur[]" value="<?php echo esc_attr( $ftr ); ?>">
                    <button class="hapus-fitur">Hapus</button>
                </li>

                <?php
            } ?>
        </ul>
        <button type="button" id="tambah-fitur">Tambah Fitur</button>

        <script>
            jQuery( document ).ready( function( $ ){
                $( '#tambah-fitur' ).on( 'click', function(){
                    $( '.data_fitur' ).append(`
                        <li class="fitur_list">
                            <input type="text" name="fitur[]">
                            <button class="hapus-fitur">Hapus</button>
                        </li>
                    `);
                });

                $( '.data_fitur' ).on( 'click', '.hapus-fitur', function(){
                    $( this ).closest( '.fitur_list' ).remove();
                });
            });
        </script>
    </div>

    <?php
}


// Simpan data metabox postingan speck =========================
// =============================================================
add_action( 'save_post', 'add_save_post_speck_meta' );
function add_save_post_speck_meta( $post_id ){
    
    // Simpan data harga --------------------
    if( array_key_exists( 'harga', $_POST )){
        update_post_meta( $post_id, 'harga', sanitize_text_field( $_POST[ 'harga' ] ) );
    }

    // Simpan data varian memori hape -------
    if( array_key_exists( 'memori', $_POST )){
        update_post_meta( $post_id, 'memori', sanitize_text_field( $_POST[ 'memori' ] ));
    }

    // Simpan data artikel review -----------
    if( array_key_exists( 'review', $_POST )){
        update_post_meta( $post_id, 'review', sanitize_text_field( $_POST[ 'review' ] ));
    }

    // Simpan link affiliate shopee ---------
    if( array_key_exists( 'shopee', $_POST )){
        update_post_meta( $post_id, 'shopee', sanitize_text_field( $_POST[ 'shopee' ] ));
    }

    // Simpan link affiliate lazada ---------
    if( array_key_exists( 'lazada', $_POST )){
        update_post_meta( $post_id, 'lazada', sanitize_text_field( $_POST[ 'lazada' ] ));
    }

    // Simpan link affiliate blibli ---------
    if( array_key_exists( 'blibli', $_POST )){
        update_post_meta( $post_id, 'blibli', sanitize_text_field( $_POST[ 'blibli' ] ));
    }

    // Simpan link affiliate tokopedia ------
    if( array_key_exists( 'tokopedia', $_POST )){
        update_post_meta( $post_id, 'tokopedia', sanitize_text_field( $_POST[ 'tokopedia' ] ));
    }

    // Simpan data fitur hape ---------------
    if( isset( $_POST[ 'fitur' ])){
        $fitur = array_map( 'sanitize_text_field', $_POST[ 'fitur' ]);
        update_post_meta( $post_id, 'fitur', $fitur );
    }
}