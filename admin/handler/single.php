<?php 

// Post Thumbnail --------------------
// -----------------------------------
register_setting( 'silo-post-group', 'silo_thumbnails' );
add_settings_section( 'silo-post', null, null, 'post_setting' );
add_settings_field(
    'silo-thumbnails',
    'Show Thumbnail',
    'show_post_thumbnail',
    'post_setting',
    'silo-post'
);

function show_post_thumbnail(){ ?>
<div id="is_silo_thumbnails" class="is_silo_thumbnails <?php if( get_option('silo_thumbnails') != 'true') echo 'disabled'; ?>">
    <input <?php if( get_option('silo_thumbnails') == 'true') echo 'checked'; ?> value="true" type="checkbox" name="silo_thumbnails" id="silo_thumbnails">
</div>
<?php }


// Show Social Shares ---------------
// ----------------------------------
register_setting( 'silo-post-group', 'silo_show_shares' );
add_settings_field(
    'silo-shares',
    'Protect Content',
    'silo_share_button',
    'post_setting',
    'silo-post'
);


function silo_share_button(){ ?>
<div id="is_silo_show_shares" class="is_silo_show_shares <?php if( get_option('silo_show_shares') != 'true') echo 'disabled'; ?>">
    <input <?php if( get_option('silo_show_shares') == 'true') echo 'checked'; ?> value="true" type="checkbox" name="silo_show_shares" id="silo_show_shares">
</div>
<?php }


// Next and Prev -------------
// ---------------------------
register_setting( 'silo-post-group', 'silo_next_prev' );
add_settings_field(
    'silo-next-prev',
    'Next & Prev Post',
    'silo_nextPrev',
    'post_setting',
    'silo-post'
);

function silo_nextPrev(){ ?>
<div id="is_silo_next_prev" class="is_silo_next_prev <?php if( get_option('silo_next_prev') != 'true') echo 'disabled'; ?>">
    <input <?php if( get_option('silo_next_prev') == 'true') echo 'checked'; ?> value="true" type="checkbox" name="silo_next_prev" id="silo_next_prev">
</div>
<?php }


// Related Post ---------------------
// ----------------------------------
register_setting( 'silo-post-group', 'related_post' );
add_settings_field(
    'silo-related',
    'Related Post',
    'silo_related_post',
    'post_setting',
    'silo-post'
);
function silo_related_post(){ ?>
<div id="is_related_post" class="is_related_post <?php if( get_option('related_post') != 'true') echo 'disabled'; ?>">
    <input <?php if( get_option('related_post') == 'true') echo 'checked'; ?> value="true" type="checkbox" name="related_post" id="related_post">
</div>
<?php }

register_setting( 'silo-post-group', 'related_post_count' );
add_settings_field(
    'silo-related-post-count',
    '<span id="thi_post_count">Related Index</span>',
    'silo_related_post_count',
    'post_setting',
    'silo-post'
);

function silo_related_post_count(){
$rel_val = ( !empty( get_option('related_post_count') ) ? get_option('related_post_count') : 4 ) ?>
<input type="number" name="related_post_count" id="related_post_count" value="<?php echo $rel_val; ?>">
<?php }

// Scheme SEO Meta --------------------------
// -----------------------------------------
add_settings_section( 'for-schema', 'Schema Meta', null, 'post_setting' );

// Authro Scheme
register_setting( 'silo-post-group', 's_au' );
add_settings_field(
    's-author',
    'Author',
    's_author',
    'post_setting', 
    'for-schema'
); function s_author(){ ?>
    <div id="s_aut" class="s_aut <?php if( get_option('s_au') != 'true') echo 'disabled'; ?>">
        <input <?php if( get_option('s_au') == 'true') echo 'checked'; ?> value="true" type="checkbox" name="s_au" id="s_au">
    </div>
<?php
}

// Date Published
register_setting( 'silo-post-group', 's_date' );
add_settings_field( 
    's-date', 
    'Date Schema', 
    'date_schema', 
    'post_setting', 
    'for-schema'
); function date_schema(){ ?>
    <div id="s_dat" class="s_dat <?php if( get_option('s_date') != 'true') echo 'disabled'; ?>">
        <input <?php if( get_option('s_date') == 'true') echo 'checked'; ?> value="true" type="checkbox" name="s_date" id="s_date">
    </div>
<?php
}