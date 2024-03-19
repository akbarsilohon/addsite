<?php
/**
 * Menambahkan fungsi baru.
 * Funsi ini untuk menjaga konten.
 * Scrip yang ditulis hanya berjalan pada single post.
 */

add_action( 'wp_head', 'silo_dont_copy' );
function silo_dont_copy(){
    if( get_option( 'silo_show_shares' ) == 'true' ){
        if( is_single() ){
            echo '
            <style>
                body {
                    -webkit-touch-callout: none;
                    -webkit-user-select: none;
                    -khtml-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                    user-select: none;
                }
                ::selection {
                    background-color: #EFEFEF;
                    color: #333;
                }
            </style>
            <script>
                document.ondragstart = function(){
                    return false;
                }
        
                document.oncontextmenu = function(event) {
                    event.preventDefault();
                    var pesan = "Konten tidak bisa di Copy";
                    var alertBox = document.createElement("div");
                    alertBox.innerHTML = pesan;
                    alertBox.style.position = "fixed";
                    alertBox.style.backgroundColor = "#cc3300";
                    alertBox.style.color = "white";
                    alertBox.style.border = "1px solid #ccc";
                    alertBox.style.padding = "10px";
                    alertBox.style.left = (event.clientX + 5) + "px";
                    alertBox.style.top = (event.clientY + 5) + "px";
                    document.body.appendChild(alertBox);
                    
                    setTimeout(function() {
                        document.body.removeChild(alertBox);
                    }, 2000);
                };
            </script>
            ';
        }
    }
}