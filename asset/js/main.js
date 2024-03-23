// Menu flexbox js ==================
// ==================================
const FlexboxCounter = document.getElementById( 'add_flexbox' );
const FlexboxOpen = document.getElementById( 'add_side' );
const FlexboxClose = document.getElementById( 'add_close' );

// Open Menu ------------
FlexboxOpen.addEventListener( 'click', function(){
    FlexboxCounter.classList.remove( 'flex100' );
    FlexboxCounter.style.position = 'fixed';
});

// Close menu ------------
FlexboxClose.addEventListener( 'click', function(){
    FlexboxCounter.classList.add( 'flex100' );
});

jQuery( document ).ready( function( $ ){

    // script jquery untuk tombol load more home page -----
    $( document ).on( 'click', '.add_btn_load', function(){
        var that = $( this );
        var page = that.data( 'page' );
        var newPage = page + 1;
        var ajaxUrl = that.data( 'url' );

        $.ajax({
            url: ajaxUrl,
            type: 'post',
            data: {
                page: page,
                action: 'add_post_load_more'
            },
            error: function( response ){
                console.log( response );
            },
            success: function( response ){
                that.data( 'page', newPage );
                $( '.add_post-list' ).append( response );
            }
        });
    });

    // Scrip load more speck ------------------------------
    $( document ).on( 'click', '.add_allSpeck-btn', function(){
        var thats = $( this );
        var pages = thats.data( 'page' );
        var newPages = pages + 1;
        var ajaxUrls = thats.data( 'url' );

        $.ajax({
            url: ajaxUrls,
            type: 'post',
            data: {
                page: pages,
                action: 'add_call_more_post_speck'
            },
            error: function( response ){
                console.log( response );
            },
            success: function( response ){
                thats.data( 'page', newPages );
                $( '.loopingSpeckAll' ).append( response );
            }
        });
    });
});


// Lazy load image =====================
// =====================================
const images = document.querySelectorAll( '[data-src]' );
function preloadImage( e ){
    let t = e.getAttribute( 'data-src' );
    t && ( e.src = t );
}

const imgOptions = {
    threshold: 0,
    rootMargin: '0px 0px -150px 0px'
}

imgObserver = new IntersectionObserver((( e, t ) => {
    e.forEach(( e => {
        e.isIntersecting && ( preloadImage( e.target ), t.unobserve( e. target ))
    }))
}), imgOptions ), images.forEach(( e => {
    imgObserver.observe( e )
}));