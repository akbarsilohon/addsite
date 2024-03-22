jQuery( document ).ready( function( $ ){

    // Kastemisasi logo blog ---------------
    // -------------------------------------
    var LogoUploader;
    $( '#add_upload_logo' ).on( 'click', function( e ){
        e.preventDefault();
        if( LogoUploader ){
            LogoUploader.open();
            return;
        }
        LogoUploader = wp.media.frames.file_frame = wp.media({
            title: 'Pilih Logo',
            button: {
                text: 'Pilih Gambar'
            },
            multiple: false
        });
        LogoUploader.on( 'select', function(){
            attachment = LogoUploader.state().get('selection').first().toJSON();
            $( '#add_logo' ).val( attachment.url );
        });

        LogoUploader.open();
    });

    
});