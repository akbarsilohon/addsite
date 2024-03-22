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
});