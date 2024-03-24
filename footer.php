<?php 
/**
 * File footer tema silohon add site
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */ ?>

    <?php 
    $iklanFooter = get_option( 'add_ads_footer' );
    if( !empty( $iklanFooter )){ ?>
        <div class="container">
            <div class="add_ads"><?php echo $iklanFooter; ?></div>
        </div>
    <?php
    }
    
    ?>

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

    <?php 
    $backTopCheck = get_option( 'add_back_top' );
    if( !empty( $backTopCheck ) && $backTopCheck === 'true' ){ ?>
        <a href="#" id="addBacktoTop" class="addBacktoTop silo_d_none">
            <img src="<?php echo ADD_URI . '/asset/image/arrow.png'; ?>" class="imgAddBacktotop">
            <span class="add_ekor"></span>
        </a>
        <script>
            var silo_backto_top = document.getElementById('addBacktoTop');
            window.onscroll = function(){
                if( document.body.scrollTop > 300 
                    || document.documentElement.scrollTop > 300 ){
                        silo_backto_top.classList.remove('silo_d_none');
                        document.querySelector( '.add_head' ).style.position = 'fixed';
                        document.querySelector( '.add_head' ).style.top = '0';
                        document.querySelector( '.add_head' ).style.zIndex = '99';
                    } else {
                        silo_backto_top.classList.add('silo_d_none');
                        document.querySelector( '.add_head' ).style.position = 'inherit';
                        document.querySelector( '.add_head' ).style.top = '0';
                        document.querySelector( '.add_head' ).style.zIndex = 'inherit';
                    }
            }
        </script>
        <?php
    }
    ?>

    <?php $footerHtml = get_option( 'add_footer_code' );
    if( !empty( $footerHtml )){
        echo $footerHtml;
    } ?>

</body>
</html>