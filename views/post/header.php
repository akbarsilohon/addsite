<?php
/**
 * Include asset pada header halaman single post
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

?>

<div class="divCat">
    <span class="aCat"><?php add_cat__(); ?></span>
</div>

<?php the_title( '<h2 class="addArticle-title">', '</h2>' ); ?>

<div class="addArticle-meta">
    <?php 
    $authorID = get_post_field( 'post_author', get_the_ID());
    $authorName = get_the_author_meta( 'display_name', $authorID );
    $authorWeb = get_the_author_meta( 'user_url', $authorID );
    $authorImg = get_avatar_url( $authorID, array( 'size' => 100 ));

    echo '<img width="50" height="50" src="' . esc_url( $authorImg ) . '" alt="' . esc_attr( $authorName ) . '" class="addArticle_img-author">';
    ?>

    <div class="addArticle-meta-right">
        <span class="author_name">
            Author:
            <a href="<?php echo esc_url( $authorWeb ); ?>" class="author_name-url">
                <?php echo esc_attr( $authorName ); ?>
            </a>
        </span>
        <div class="tanggalPublish">Tanggal: <?php echo the_time( 'F, D, Y' ); ?></div>
    </div>
</div>

<!-- Post thumbnail -->
<?php
$thumbnailShow = get_option( 'add_post_thumbnail' );
if( $thumbnailShow === 'true' && has_post_thumbnail()){
    the_post_thumbnail( 'full', array(
        'loading'       =>  'lazy',
        'class'         =>  'addArticle-thumbnail'
    ));
}
?>

<!-- Iklan setelah thumbnails -->
<?php 
$IkanTop = get_option( 'add_single_top' );
if( !empty( $IkanTop )){ ?>

<div class="add_ads">
    <?php echo $IkanTop; ?>
</div>

<?php
}