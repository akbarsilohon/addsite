<?php
/**
 * Template komentar tema silohon add site
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */

if( post_password_required()){
    return;
} ?>

<div id="comments" class="add_comments">
    <?php if( have_comments()){ ?>
        <h4 class="comments_title">
            <?php printf(
                esc_html( _nx(
                    'One comments on &ldquo;%2$s&rdquo;',
                    '%1$s comments on &ldquo;%2$s&rdquo;',
                    get_comments_number(),
                    'comment title',
                    'silohon-add-site'
                )),
                number_format_i18n( get_comments_number() ),
                '<span>'. get_the_title() .'</span>'
            ); ?>
        </h4>

        <ol class="list-comment">
            <?php 
            wp_list_comments( array(
                'walker'            =>  null,
                'max_depth'         =>  '',
                'style'             =>  null,
                'callback'          =>  null,
                'end-callback'      =>  null,
                'type'              =>  'all',
                'reply_text'        =>  'Balas',
                'page'              =>  '',
                'per_page'          =>  '',
                'avatar_size'       =>  32,
                'reverse_top_level' =>  null,
                'reverse_children'  =>  '',
                'format'            =>  'html5',
                'short_ping'        =>  false,
                'echo'              =>  true
            )); ?>
        </ol>
        <?php
    } ?>

    <?php comment_form(); ?>
</div>