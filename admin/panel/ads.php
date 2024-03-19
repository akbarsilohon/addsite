<div class="silo_container">
    <h1 class="silo_top_heading">Ads Setting</h1>
    <p class="this_silo_des">
        [ads1] untuk memanggil Shortcode 1, dan [ads2] untuk memanggil Shortcode 2.
    </p>
    <?php settings_errors(); ?>
    <form action="options.php" method="post" class="silo_form">
        <?php
            submit_button('Save');
            settings_fields('silo-ads-group');
            do_settings_sections( 'silo_ads' );
            submit_button('Save');
        ?>
    </form>
</div>