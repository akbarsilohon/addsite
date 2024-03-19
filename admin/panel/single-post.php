<div class="silo_container">
    <h1 class="silo_top_heading">Single Post</h1>
    <?php settings_errors(); ?>
    <p class="this_silo_des">
        Fitur share button Akan bisa digunakan setelah update.
    </p>

    <form action="options.php" method="post" class="silo_form">
        <?php
            settings_fields('silo-post-group');
            do_settings_sections( 'post_setting' );
            submit_button('Save');
        ?>
    </form>
</div>