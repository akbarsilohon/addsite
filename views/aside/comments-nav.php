<?php /**
 * The Comments navigation Silohon Theme.
 * @package silo */ ?>

<div class="silo_comments_paginate">
    <?php previous_comments_link( esc_html__( 'Older Comments', 'silo' ) );
    next_comments_link( esc_html__( 'Newer Comments', 'silo' ) ); ?>
</div>