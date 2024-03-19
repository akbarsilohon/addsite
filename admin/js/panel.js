// --------------------------------
// Panel General Setting ----------
// --------------------------------
// Change Logo Button
jQuery( document ).ready( function($){
    var mediaUploader;
    $('#silo_logo').on( 'click', function(e){
        e.preventDefault();

        if( mediaUploader ){
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose a Logo Image',
            button: {
                text: 'Chose a Image'
            },
            multiple: false
        });

        mediaUploader.on( 'select', function(){
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#silo_logo_upload').val(attachment.url);
            $('#slohonPreviewLogo').css('background-image', 'url(' + attachment.url + ')');
        });

        mediaUploader.open();
    });
});

// For Back To Top Icon
jQuery('#is_silo_back_TOP').click( function(){
    jQuery(this).toggleClass('disabled');
});

// Mobile Sidebar
jQuery('#mob_sidebar').click( function(){
    jQuery(this).toggleClass('disabled');
});


// -------------------------------------
// Ads Admin Panel Handler -------------
// -------------------------------------
// Lazy Load Ads
jQuery('#thi_lazy_ads').click( function(){
    if( jQuery(this).hasClass('disabled')){
        jQuery(this).removeClass('disabled');
        jQuery('#ca_pob_code_toggle, #ca_pub').fadeIn(200);
    } else{
        jQuery(this).addClass('disabled');
        jQuery('#ca_pob_code_toggle, #ca_pub').hide();
    }
});

if( jQuery('#thi_lazy_ads').hasClass('disabled')){
    jQuery('#ca_pob_code_toggle, #ca_pub').hide();
}


// Single Post Panel --------------
// --------------------------------
// The Post Thumbnails
jQuery('#is_silo_thumbnails').click( function(){
    jQuery(this).toggleClass('disabled');
});

// Social Shared Post
jQuery('#is_silo_show_shares').click( function(){
    jQuery(this).toggleClass('disabled');
});

// Next & Prev Posts
jQuery('#is_silo_next_prev').click( function(){
    jQuery(this).toggleClass('disabled');
});

// Related Post
jQuery('#is_related_post').click( function(){
    if( jQuery(this).hasClass('disabled')){
        jQuery(this).removeClass('disabled');
        jQuery('#thi_post_count, #related_post_count').fadeIn(200);
    } else{
        jQuery(this).addClass('disabled');
        jQuery('#thi_post_count, #related_post_count').hide();
    }
});

if( jQuery('#is_related_post').hasClass('disabled')){
    jQuery('#thi_post_count, #related_post_count').hide();
}

// Scheme Meta --------------------------------
// --------------------------------------------
// Author
jQuery( '#s_aut' ).click( function(){
    jQuery( this ).toggleClass( 'disabled' );
});

// Date Schema
jQuery( '#s_dat' ).click( function(){
    jQuery( this ).toggleClass( 'disabled' );
});


// Remove BUG The Post Thumbnails ==============
// =============================================
// Lazy Load IMG
const images = document.querySelectorAll("[data-src]");
function preloadImage(e) {
    let t = e.getAttribute("data-src");
    t && (e.src = t)
}
const imgOptions = {
    threshold: 0,
    rootMargin: "0px 0px 0px 0px"
};
imgObserver = new IntersectionObserver(((e, t) => {
    e.forEach((e => {
        e.isIntersecting && (preloadImage(e.target), t.unobserve(e.target))
    }))
}), imgOptions), images.forEach((e => {
    imgObserver.observe(e)
}));