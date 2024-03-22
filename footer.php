<?php 
/**
 * File footer tema silohon add site
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */ ?>

    <footer class="add_footer">
        <div class="foo_top">
            <div class="container">
                <?php wp_nav_menu( array(
                    'theme_location'        =>  'footer-menu',
                    'container'             =>  'ul',
                    'menu_class'            =>  'add_ftop',
                    'menu_id'               =>  'add_ftop',
                    'fallback_cb'           =>  false
                )); ?>
            </div>
        </div>

        <div class="foo_bot">
            <div class="container">
                <div class="foInner">
                    <div class="innerLef">
                        &copy; <a href="<?php echo bloginfo( 'url' ); ?>"><?php echo bloginfo( 'name' ); ?></a> <span><?php echo the_time('Y'); ?></span>
                    </div>
                    <div class="innerRight">
                        <span>Powered By:</span>
                        <a href="<?php echo ADD_THEME_URI; ?>" target="_blank" rel="nofollow, noindex"><?php echo ADD_NAME; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>

</body>
</html>