<?php
function add_spek_meta_box() {
    add_meta_box(
        'spek_meta_box',
        'Detail Spek HP',
        'render_spek_meta_box',
        'spek',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_spek_meta_box');

// Render konten meta box
function render_spek_meta_box( $post ) {
    $harga = get_post_meta($post->ID, 'harga', true);
    $varian_hp = get_post_meta($post->ID, 'varian_hp', true);
    $link_shopee = get_post_meta($post->ID, 'link_shopee', true);
    $link_lazada = get_post_meta($post->ID, 'link_lazada', true);
    $fitur_hp = get_post_meta($post->ID, 'fitur_hp', true);
    $link_review = get_post_meta($post->ID, 'review_link', true);
    if (!is_array($fitur_hp)) {
        $fitur_hp = array(); // Inisialisasi sebagai array jika tidak ada data
    } ?>

    <div class="spek_container">
        <div class="data_container">
            <label for="harga">Data Harga:</label>
            <input type="text" id="harga" name="harga" value="<?php echo esc_attr( $harga ); ?>">
        </div>

        <div class="data_container">
            <label for="varian_hp">Data Varian HP:</label>
            <input type="text" id="varian_hp" name="varian_hp" value="<?php echo esc_attr( $varian_hp ); ?>">
        </div>

        <div class="data_container">
            <label for="link_review">Link Review:</label>
            <input type="text" id="link_review" name="review_link" value="<?php echo esc_attr($link_review); ?>">
        </div>

        <div class="data_container">
            <label for="link_shopee">Link Shopee:</label>
            <input type="text" id="link_shopee" name="link_shopee" value="<?php echo esc_attr($link_shopee); ?>">
        </div>

        <div class="data_container">
            <label for="link_lazada">Link Lazada:</label>
            <input type="text" id="link_lazada" name="link_lazada" value="<?php echo esc_attr($link_lazada); ?>">
        </div>
    </div>


    <h3 class="fitu_hp_title">Fitur Hp</h3>
    <ul class="data_fitur">
        <?php foreach ($fitur_hp as $fitur) : ?>
            <li class="fitur_list">
                <input type="text" name="fitur_hp[]" value="<?php echo esc_attr($fitur); ?>">
                <button class="hapus-fitur">Hapus</button>
            </li>
        <?php endforeach; ?>
    </ul>
    <button type="button" id="tambah-fitur">Tambah Fitur</button>

    <script>
        jQuery(document).ready(function ($) {
            $('#tambah-fitur').on('click', function () {
                $('.data_fitur').append(`
                    <li class="fitur_list">
                        <input type="text" name="fitur_hp[]">
                        <button class="hapus-fitur">Hapus</button>
                    </li>
                `);
            });

            $('.data_fitur').on('click', '.hapus-fitur', function () {
                $(this).closest('.fitur_list').remove();
            });
        });
    </script>

    <?php
}

// Simpan data saat postingan disimpan
function save_spek_meta_data($post_id) {
    if (array_key_exists('harga', $_POST)) {
        update_post_meta($post_id, 'harga', sanitize_text_field($_POST['harga']));
    }

    if (array_key_exists('varian_hp', $_POST)) {
        update_post_meta($post_id, 'varian_hp', sanitize_text_field($_POST['varian_hp']));
    }

    if (array_key_exists('link_lazada', $_POST)) {
        update_post_meta($post_id, 'link_lazada', sanitize_text_field($_POST['link_lazada']));
    }

    if (array_key_exists('link_shopee', $_POST)) {
        update_post_meta($post_id, 'link_shopee', sanitize_text_field($_POST['link_shopee']));
    }

    if (isset($_POST['fitur_hp'])) {
        $fitur_hp = array_map('sanitize_text_field', $_POST['fitur_hp']);
        update_post_meta($post_id, 'fitur_hp', $fitur_hp);
    }

    if( array_key_exists( 'review_link', $_POST )){
        update_post_meta( $post_id, 'review_link', sanitize_text_field($_POST['review_link']) );
    }
}
add_action('save_post', 'save_spek_meta_data');