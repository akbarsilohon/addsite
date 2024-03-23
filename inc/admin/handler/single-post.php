<?php
/**
 * Fungsi untuk mengangai opsi pada halaman single postingan
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

function add_simpan_opsi_single_postingan(){
    add_settings_section( 'single-post-section', null, null, 'add_single' );

    // Opsi menampilkan thumbnail pada single postingan ----------------
    register_setting( 'add-single-post-settings-group', 'add_post_thumbnail' );
    add_settings_field( 'add-post-thumbnail', 'Tampilkan Thumbnail:', 'tampilkan_thumbnail', 'add_single', 'single-post-section' );

    register_setting( 'add-single-post-settings-group', 'add_lindungi_konten' );
    add_settings_field( 'add-lindungi-konten', 'Anti kopas Artikel:', 'anti_kopas_artikel', 'add_single', 'single-post-section' );

    register_setting( 'add-single-post-settings-group', 'add_next_konten' );
    add_settings_field( 'add-next-konten', 'Next Artikel:', 'next_artikel', 'add_single', 'single-post-section' );

    register_setting( 'add-single-post-settings-group', 'add_konten_terkait' );
    add_settings_field( 'add-terkait-konten', 'Artikel Terkait:', 'artikel_terkait', 'add_single', 'single-post-section' );

    register_setting( 'add-single-post-settings-group', 'add_jumlah_konten_terkait' );
    add_settings_field( 'add-terkait-jumlah', '<span class="add_bisaHilang">Jumlah Artikel Terkait:</span>', 'jumlah_artikel_terkait', 'add_single', 'single-post-section' );

    register_setting( 'add-single-post-settings-group', 'add_panjang_exerpt' );
    add_settings_field( 'add-panjang-excerpt', 'Panjang Exerpt:', 'panjang_exerpt_artikel', 'add_single', 'single-post-section' );

    register_setting( 'add-single-post-settings-group', 'add_izin_komentar' );
    add_settings_field( 'add-izin-komentar', 'Izinkan Komentar:', 'izinkan_komentar_artikel', 'add_single', 'single-post-section' );
}

// Fungsi thumbnail ------------
function tampilkan_thumbnail(){
    $ThumbnailOptions = get_option( 'add_post_thumbnail' ); ?>
    <div class="checkbox_counter <?php if( $ThumbnailOptions === 'true') echo 'checked'; ?>" id="checkbox_counter">
        <input type="checkbox" name="add_post_thumbnail" id="add_post_thumbnail" value="true" <?php if( $ThumbnailOptions === 'true' ) echo 'checked'; ?>>
    </div>

    <?php
}

// Anti kopas artikel
function anti_kopas_artikel(){
    $antiKopas = get_option( 'add_lindungi_konten' ); ?>
    <div class="checkbox_counter <?php if( $antiKopas === 'true') echo 'checked'; ?>" id="checkbox_counter">
        <input type="checkbox" name="add_lindungi_konten" id="add_lindungi_konten" value="true" <?php if( $antiKopas === 'true' ) echo 'checked'; ?>>
    </div>
    <?php
}

function next_artikel(){
    $NextArticle = get_option( 'add_next_konten' ); ?>
    <div class="checkbox_counter <?php if( $NextArticle === 'true') echo 'checked'; ?>" id="checkbox_counter">
        <input type="checkbox" name="add_next_konten" id="add_next_konten" value="true" <?php if( $NextArticle === 'true' ) echo 'checked'; ?>>
    </div>
    <?php
}

function artikel_terkait(){
    $artikelTerkait = get_option( 'add_konten_terkait' ); ?>
    <div class="iniJugaBisaHilang <?php if( $artikelTerkait === 'true') echo 'checked'; ?>" id="iniJugaBisaHilang">
        <input type="checkbox" name="add_konten_terkait" id="add_konten_terkait" value="true" <?php if( $artikelTerkait === 'true' ) echo 'checked'; ?>>
    </div>
    <?php
}

function jumlah_artikel_terkait(){
    $relatedIndex = get_option( 'add_jumlah_konten_terkait' ); ?>
    <input type="number" name="add_jumlah_konten_terkait" id="add_jumlah_konten_terkait" value="<?php echo esc_attr( $relatedIndex ); ?>">
    <?php
}

function panjang_exerpt_artikel(){
    $Excerpt = get_option( 'add_panjang_exerpt' ); ?>
    <input type="number" name="add_panjang_exerpt" id="add_panjang_exerpt" value="<?php echo esc_attr( $Excerpt ); ?>">
    <?php
}

function izinkan_komentar_artikel(){
    $izinKomen = get_option( 'add_izin_komentar' ); ?>
    <div class="checkbox_counter <?php if( $izinKomen === 'true') echo 'checked'; ?>" id="checkbox_counter">
        <input type="checkbox" name="add_izin_komentar" id="add_izin_komentar" value="true" <?php if( $izinKomen === 'true' ) echo 'checked'; ?>>
    </div>
    <?php
}