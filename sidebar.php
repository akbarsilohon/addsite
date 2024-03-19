<aside class="silo_sidebar <?php if(get_option('mobile_sidebar') != 'true' ) echo 'mobile_sidebar_hidden'; ?>">
    <?php 
    // Home Sidebar -------------
    // --------------------------
    if( is_home() || is_page() ){
        if( is_active_sidebar('home')){
            dynamic_sidebar( 'home' );
        }
    }

    // Archive Sidebar -----------
    // ---------------------------
    if( is_archive()){
        if( is_active_sidebar( 'archive' )){
            dynamic_sidebar( 'archive' );
        }
    }

    // Single Sidebar ----------------
    // -------------------------------
    if( is_single()){
        if( is_active_sidebar( 'single' )){
            dynamic_sidebar( 'single' );
        }
    }
    
    ?>
</aside>