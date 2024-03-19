<div class="silo_container">
    <h1 class="silo_top_heading">General Settings</h1>
    <p class="this_silo_des">
        Rekomendasi Logo (380px x 80px) format PNG, backgroud transparan.
    </p>

    <?php 
    settings_errors();
    $logo = get_option('silo_logo');
    $def = SILO_URI . '/img/logo.png';
    if( !empty( get_option('silo_logo') )){
        echo '<div id="slohonPreviewLogo" style="background-image: url('.$logo.')"></div>';
    } else{
        echo '<div id="slohonPreviewLogo" style="background-image: url('.$def.')"></div>';
    } ?>
    <form action="options.php" method="post" class="silo_form">
        <?php 
            settings_fields('general-setting-group');
            do_settings_sections( 'silo_general' );
            submit_button('Save');
        ?>
    </form>
</div>