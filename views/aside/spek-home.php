<aside class="spek_side">
    <?php 
        $categories = get_terms(array(
            'taxonomy' => 'brand',
            'hide_empty' => false,
        ));

        if (!empty($categories) && !is_wp_error($categories)) { ?>
            <div class="space_sidebar"></div>
            <h3 class="spek_hp_tb">All Brands</h3>
            <ul class="list_brand">
                <?php foreach( $categories as $category ) : ?>
                    <li class="is_branding">
                        <a href="<?php echo esc_url(get_term_link( $category ) ); ?>" class="link_brand">
                            <?php echo esc_html($category->name); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php
        }
    ?>
</aside>