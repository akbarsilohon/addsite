<footer>
    <div class="footop f-max">
        <?php wp_nav_menu( array(
            'theme_location' => 'footer',
            'container' => 'ul',
            'menu_class' => 'silo_foot_menu container',
        )); ?>
    </div>
    <div class="foobot">
        <div class="container silo_foobot">
            <div class="fooleft">
                &copy; <?php echo the_time('Y'); ?> Copyright <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name') ?></a> | All rights Reserved.
            </div>
            <div class="fooright">Designe By: <a href="<?php echo bloginfo( 'url' ); ?>"><?php echo bloginfo( 'name' ); ?></a></div>
        </div>
    </div>
</footer>
<?php 

// For Backto top bottom ---------------
// -------------------------------------
if( get_option('silo_backtop') == 'true' ){
    get_template_part( 'views/aside/back', 'top' );
}

// Lazyload Ads Script
if( get_option('silo_lazy_load_ads') == 'true' ){
    echo '<script>
        // <![CDATA[
            var lazyadsense = false;
            window.addEventListener("scroll", function(){if ((document.documentElement.scrollTop != 0 && lazyadsense === false)
                || (document.body.scrollTop != 0 && lazyadsense === false)) { 
                    (function() {
                        var ad = document.createElement("script");
                        ad.setAttribute("crossorigin","anonymous");
                        ad.async = true;
                        ad.src = "https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-'. get_option('ca_pub') .'";
                        var sc = document.getElementsByTagName("script")[0];
                        sc.parentNode.insertBefore(ad, sc); 
                    })();
                    lazyadsense = true;
                }
            }, true);
            // ]]>
        </script>';
}

// Insert Footer Code -----------------
// ------------------------------------
if( !empty( get_option( 'insert_footer' ) )){
    echo '<div class="myFooterCode">';
    print( get_option( 'insert_footer' ) );
    echo '</div>';
}

wp_footer(); ?>
</body>
</html>