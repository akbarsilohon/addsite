<?php

// Custom Logo ---------------------------
// ---------------------------------------
register_setting( 'general-setting-group', 'silo_logo' );
add_settings_section( 'general-setting', null, null, 'silo_general' );
add_settings_field(
    'silo-logo',
    'Custom Logo',
    'custom_logo',
    'silo_general',
    'general-setting'
);

function custom_logo(){ ?>
    <input id="silo_logo_upload" type="text" name="silo_logo" value="<?php echo esc_attr( get_option('silo_logo') ); ?>" />
    <input id="silo_logo" class="button button-primary" type="button" value="Upload">
<?php }



// Back to Top -------------------------------
// -------------------------------------------
register_setting( 'general-setting-group', 'silo_backtop' );
add_settings_field(
    'silo-backtop',
    'Back To Top',
    'back_to_top',
    'silo_general',
    'general-setting'
);

function back_to_top(){ ?>
    <div id="is_silo_back_TOP" class="is_silo_back_TOP <?php if(get_option('silo_backtop') != 'true') echo 'disabled'; ?>">
        <input value="true" <?php if(get_option('silo_backtop') == 'true') echo 'checked'; ?> type="checkbox" name="silo_backtop" id="silo_backtop">
    </div>
<?php }



// Sidebar On Mobile ---------------------------------------
// ---------------------------------------------------------
register_setting( 'general-setting-group', 'mobile_sidebar' );
add_settings_field(
    'm-sidebar',
    'Mobile Sidebar',
    'silo_mobile_sidebar',
    'silo_general',
    'general-setting'
);

function silo_mobile_sidebar(){ ?>
<div id="mob_sidebar" class="mob_sidebar <?php if( get_option('mobile_sidebar') != 'true' ) echo 'disabled'; ?>">
    <input value="true" <?php if( get_option('mobile_sidebar') == 'true' ) echo 'checked'; ?> type="checkbox" name="mobile_sidebar" id="mobile_sidebar">
</div>
<?php }


// Custom Excerpt length ----------------
// --------------------------------------
register_setting( 'general-setting-group', 'silo_excerpt' );
add_settings_field(
    'silo-excerpt',
    'The Excerpt',
    'silo_the_excerpt_length',
    'silo_general',
    'general-setting'
);

function silo_the_excerpt_length(){
    $excer_count = ( !empty( get_option('silo_excerpt') ) ? get_option('silo_excerpt') : 25 ); ?>
    <input type="number" name="silo_excerpt" id="silo_excerpt" value="<?php echo $excer_count; ?>">
<?php }
