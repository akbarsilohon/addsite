<?php 

if( post_password_required()){
    return;
} ?>

<div id="comments" class="silo_comments">
    <?php 
    // This Conditional.
    // If have a Comments, show this list
    if( have_comments()){
        // We have the comments ?>
        <h4 class="comments_title">
            <?php printf(
                esc_html( _nx(
                    'One comments on &ldquo;%2$s&rdquo;',
                    '%1$s comments on &ldquo;%2$s&rdquo;',
                    get_comments_number(),
                    'comment title',
                    'silo'
                )),
                number_format_i18n( get_comments_number() ),
                '<span>'. get_the_title() .'</span>'
            ); ?>
        </h4>

        <?php 
        // Show The Comments pagination.
        echo silo_get_comments_nav(); ?>

        <ol class="list-comment">
            <?php 
            wp_list_comments( array(
                'walker'            => null,
                'max_depth'         => '',
                'style'             => null,
                'callback'          => null,
                'end-callback'      => null,
                'type'              => 'all',
                'reply_text'        => 'Reply',
                'page'              => '',
                'per_page'          => '',
                'avatar_size'       => 32,
                'reverse_top_level' => null,
                'reverse_children'  => '',
                'format'            => 'html5',
                'short_ping'        => false,
                'echo'              => true
            ));
            ?>
        </ol>

        <?php 
        // Show The Comments pagination.
        echo silo_get_comments_nav();
        
        if( !comments_open() && get_comments_number() ){
            echo '<p class="no-comments">'.esc_html_e( 'Comments are closed.', 'silohon').'</p>';
        } ?>


    <?php }
    comment_form( ); ?>
</div>