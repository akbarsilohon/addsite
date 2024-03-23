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

    // Tombol back to top =============================
    $( '#add_checkbox_counter' ).on( 'click', function(){
        $( this ).toggleClass( 'checked' );
    });


    // Single posts ==================================
    $( '#add_checkbox' ).on( 'click', '#checkbox_counter', function(){
        $( this ).toggleClass( 'checked' );
    });

    $( '#add_konten_terkait' ).on( 'click', function(){
        if($('#iniJugaBisaHilang').hasClass('checked')){
            $( '#iniJugaBisaHilang' ).removeClass( 'checked' );
            $( '#add_jumlah_konten_terkait').hide();
            $( '.add_bisaHilang').hide();
        } else{
            $( '#iniJugaBisaHilang' ).addClass( 'checked' );
            $( '#add_jumlah_konten_terkait').show();
            $( '.add_bisaHilang').show();
        }
    });

    if( $('#iniJugaBisaHilang').hasClass('checked')){
        $( '#add_jumlah_konten_terkait').show();
        $( '.add_bisaHilang').show();
    }

    
    // Lazy load iklan Google ===================
    // ==========================================
    $( '#tunda_iklan').on( 'click', function(){
        if($( '#CaPubIklan' ).hasClass( 'checked' )){
            $( '#CaPubIklan' ).removeClass( 'checked' );
            $( '#capub_iklan').hide();
            $( '.kodeCaPubIklanGoogle').hide();
        } else{
            $( '#CaPubIklan' ).addClass( 'checked' );
            $( '#capub_iklan').show();
            $( '.kodeCaPubIklanGoogle').show();
        }
    });

    if($( '#CaPubIklan' ).hasClass( 'checked' )){
        $( '#capub_iklan').show();
        $( '.kodeCaPubIklanGoogle').show();
    } else{
        $( '#capub_iklan').hide();
        $( '.kodeCaPubIklanGoogle').hide();
    }
});