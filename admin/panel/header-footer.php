<div class="silo_container">
    <h1 class="silo_top_heading">Inser Header & Footer</h1>
    <?php settings_errors(); ?>
    <p class="this_silo_des">
        Silahkan paste kode Anda pada textarea dibawah.
    </p>

    <form action="options.php" method="post" class="silo_form">
        <?php
            settings_fields('silo-header-footer-group');
            do_settings_sections( 'header_and_footer' );
            submit_button('Save');
        ?>
    </form>
</div>