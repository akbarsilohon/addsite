<?php
// -------------------------------------
// mce_buttons Plugins -----------------
// -------------------------------------
define( 'MCE_JS', SILO_URI . '/mce_buttons/js/action.js' );
add_action( 'admin_init', 'silo_add_mce_buttons' );
function silo_add_mce_buttons(){
    global $typenow;

    if( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' )){
        return;
    }

    if( get_user_option( 'rich_editing' ) == 'true' ){
        add_filter( 'mce_external_plugins', 'silo_mce_external' );
        add_filter( 'mce_buttons', 'silo_mce_buttons' );
    }

    function silo_mce_external( $plugin_array ){
        $plugin_array['silo_mce'] = MCE_JS;
        return $plugin_array;
    }

    function silo_mce_buttons( $buttons ){
        array_push( $buttons, 'silo_mce' );
        return $buttons;
    }
}

// --------------------------------------
// ShortCodes MCE Plugins ---------------
// --------------------------------------
// Add Button
add_shortcode( 'silo-btn', 'callback_silo_btn' );
function callback_silo_btn( $btn, $content = null ){
    $args = shortcode_atts(
        array(
            'class' => '',
            'link' => 'link',
            'target' => ''
        ),
        $btn,
        'silo-btn'
    );

    $Clases = $btn['class'];
    $Targets = $btn['target'];
    $links = $btn['link'];

    // Button Output
    $BtnOutput = '<button style="margin-bottom: 20px;" class="silo-btn ' . $Clases . '">';
    $BtnOutput .= '<a href="' . $links . '" target="' . $Targets . '">';
    $BtnOutput .= $content;
    $BtnOutput .= '</a>';
    $BtnOutput .= '</button>';

    return $BtnOutput;
}


// Add Related Posts -------------------
// -------------------------------------
add_shortcode( 'silo-related', 'silo_add_related_post' );
function silo_add_related_post( $Related_Post ){
    $args = shortcode_atts(
        array(
            'title' => '',
            'url' => '',
            'gambar' => '',
            'target' => ''
        ),
        $Related_Post,
        'silo-related'
    );

    $Titles = $Related_Post['title'];
    $Url = $Related_Post['url'];
    $Images = $Related_Post['gambar'];
    $Targets = $Related_Post['target'];

    // $Related_Post_Output
    $Related_Post_Output = '<a href="'. $Url .'" target="'. $Targets .'" class="IRPP_button">';
    $Related_Post_Output .= '<div class="centered-text-area">';
    $Related_Post_Output .= '<div class="ctaButton" style="float: left;">Read:</div>';
    $Related_Post_Output .= '<div class="centered-text" style="float: left;">';
    $Related_Post_Output .= '<div class="IRPP_button-content">';
    $Related_Post_Output .= '<div class="postTitle">'. $Titles .'</div>';
    $Related_Post_Output .= '</div>';
    $Related_Post_Output .= '</div>';
    $Related_Post_Output .= '</div>';
    $Related_Post_Output .= '<div class="postImageUrl" style="background-image: url(' . $Images . ')"></div>';
    $Related_Post_Output .= '</a><br/>';

    return $Related_Post_Output;
}

// Product ShortCode ----------------
// ----------------------------------
add_shortcode( 'silo-product', 'silo_add_product' );
function silo_add_product( $Product ){
    $args = shortcode_atts(
        array(
            'toko' => '',
            'title' => '',
            'ongkir' => '',
            'harga' => '',
            'lokasi' => '',
            'link' => ''
        ),
        $Product,
        'silo-product'
    );

    $Location = ( !empty( $Product['lokasi'] ) ? $Product['lokasi'] : 'Dalam Negeri' );

    $Product_Output = '<div class="card-price">';
    $Product_Output .= '<div class="left">';
    $Product_Output .= '<div class="price-icon">';
    $Product_Output .= '<img src="' . SILO_URI . '/mce_buttons/market/' . $Product['toko'] . '">';
    $Product_Output .= '</div>';
    $Product_Output .= '<div class="price-produk">' . $Product['title'] . '</div>';
    $Product_Output .= '<div class="price-box">';
    $Product_Output .= '<div class="price-ongkir">';
    $Product_Output .= '<img src="' . SILO_URI . '/mce_buttons/icon/kurir.png">';
    $Product_Output .= '<div class="title">' . $Product['ongkir'] . '</div>';
    $Product_Output .= '</div></div></div>';
    $Product_Output .= '<div class="right">';
    $Product_Output .= '<div class="right1">';
    $Product_Output .= '<div class="price-harga">';
    $Product_Output .= '<img src="' . SILO_URI . '/mce_buttons/icon/harga.png">';
    $Product_Output .= '<div class="title">' . $Product['harga'] . '</div></div>';
    $Product_Output .= '<div class="price-lokasi">';
    $Product_Output .= '<img src="' . SILO_URI . '/mce_buttons/icon/lokasi.png" alt="">';
    $Product_Output .= '<div class="title">' . $Location . '</div>';
    $Product_Output .= '</div></div>';
    $Product_Output .= '<a href="' . $Product['link'] . '" target="_blank" rel="noopener noreferrer nofollow">';
    $Product_Output .= '<button>Beli</button></a></div></div>';

    return $Product_Output;
}


// Ads Code ---------------------
// ------------------------------
add_shortcode( 'ads1', 'silo_add_ads1' );
function silo_add_ads1(){
    $Code1 = get_option('shortcode_ads1');

    $Ads1_Output = '<div class="ads_single_post">';
    $Ads1_Output .= $Code1;
    $Ads1_Output .= '</div>';

    return $Ads1_Output;
}

add_shortcode( 'ads2', 'silo_add_ads2' );
function silo_add_ads2(){
    $Code2 = get_option('shortcode_ads2');

    $Ads2_Output = '<div class="ads_single_post">';
    $Ads2_Output .= $Code2;
    $Ads2_Output .= '</div>';

    return $Ads2_Output;
}

// Table Of Content --------------------
// -------------------------------------
add_shortcode( 'silo_toc', 'callback_silo_toc' );
function callback_silo_toc(){
    $Content = get_the_content();
    $ThisJS = "<script>const thisTOC = document.getElementById('silo_icon_toc');const thiTOCTar = document.getElementById('this_toc_counters');thisTOC.addEventListener('click', function(){thiTOCTar.classList.toggle('tocNone');});</script>";

    $SiloToc = '<div class="silo_toc">';
    $SiloToc .= '<div class="toc-title">';
    $SiloToc .= '<p class="this_toc">Table of Contents:</p>';
    $SiloToc .= '<div id="silo_icon_toc" class="silo_icon_toc">';
    $SiloToc .= '<span></span><span></span><span></span>';
    $SiloToc .= '</div>';
    $SiloToc .= '</div>';
    $SiloToc .= '<ul id="this_toc_counters">';

    $matches = array();
    preg_match_all('/<h([2-3])>(.*?)<\/h[2-3]>/i', $Content, $matches );

    $level = 2;
    for( $i = 0; $i < count( $matches[1] ); $i++ ){
        $isReplace = array(
            ' ', '.', ',', '-',
            '?', '!', '#', '*', '#', '"',
            '@', '$', '%', '^', '(', ')', '+',
            '=', '{', '}', '[', ']', ':', '\''
        );
        $id = strtolower( str_replace( $isReplace, '_', $matches[2][$i] ) );
        if( $matches[1][$i] == 2 ){
            if( $level > 2 ){
                $SiloToc .= '</ul></li>';
            }
            $SiloToc .= '<li><a href="#' . $id . '">' . $matches[2][$i] . '</a>';
            $level = 2;
        } elseif( $matches[1][$i] == 3 ){
            if( $level == 2 ){
                $SiloToc .= '<ul>';
            }
            $SiloToc .= '<li><a href="#' . $id . '">' . $matches[2][$i] . '</a></li>';
            $level = 3;
        }
    }

    if( $level == 3 ){
        $SiloToc .= '</ul>';
    }

    $SiloToc .= '</ul>';
    $SiloToc .= '</div>';
    $SiloToc .= $ThisJS;

    return $SiloToc;
}

// Replace this Heading The COntent ---------
// ------------------------------------------
add_filter( 'the_content', 'add_heading_id' );
function add_heading_id( $Content ){
    $Content = preg_replace_callback('/<h([2-3])>(.*?)<\/h[2-3]>/i', function( $matches ){
        $ThisReplace = array(
            ' ', '.', ',', '-',
            '?', '!', '#', '*', '#', '"',
            '@', '$', '%', '^', '(', ')', '+',
            '=', '{', '}', '[', ']', ':', '\''
        );

        $id = strtolower( str_replace( $ThisReplace, '_', $matches[2] ) );
        return '<h'. $matches[1] .' id="'. $id .'">'. $matches[2] .'</h'. $matches[1] .'>';
    }, $Content );

    return $Content;
}


// Ember Video ShortCode silohon Theme WOrdpress
// =============================================
add_shortcode( 'silo-embed', 'silo_add_embed' );
function silo_add_embed( $atts ){
    $args = shortcode_atts( 
        array(
            'judul' => '',
            'url' => ''
        ),
        $atts,
        'silo-embed'
    );

    $judulVideo = ( !empty( $args['judul'] ) ? $args['judul'] : 'Video Terkait' );
    $urlVideo = ( !empty( $args['url'] ) ? $args['url'] : '' );

    $VdOut = '<style>.silo_embed{width: 560px;height: 315px;position: relative;}.silo_embed img{width: 100%;height: 100%;object-fit: cover;object-position: center;}.VdEmbed .tombol-play{position: absolute;background-image: url("https://upload.wikimedia.org/wikipedia/commons/archive/0/09/20211015074810%21YouTube_full-color_icon_%282017%29.svg");background-size: cover;background-position: center;left: 50%;margin-left: -15px !important;top: 120px !important;cursor: pointer;width: 50px !important;height: 35px !important;z-index: 9999999999;}.silo_embed .tombol-play{position: absolute;background-image: url("https://upload.wikimedia.org/wikipedia/commons/archive/0/09/20211015074810%21YouTube_full-color_icon_%282017%29.svg");background-size: cover;background-position: center;left: 50%;margin-left: -35px;top: 50%;cursor: pointer;width: 70px;height: 50px;z-index: 9999999999;}.silo_embed iframe{width: 100%;height: 100%;}.silo_embed .silCls{font-size: 20px;color: #fff;background-color: #999;line-height: 8px;margin-bottom: 5px;padding: 5px;float: right;cursor: pointer;border-radius: 20px;}.VdEmbed{position: fixed !important;width: 336px !important;height: 190px !important;right: 20px;bottom: 100px;}@media(max-width: 580px){.silo_embed{width: 100%;height: 200px;}.VdEmbed{width: 50% !important;height: 100px !important;right: 0 !important;}.VdEmbed .tombol-play{top: 70px !important;width: 35px !important;height: 25px !important;}.silo_embed .tombol-play{top: 40%;width: 50px;height: 35px;}}</style>';
    $VdOut .= '<div id="silo_embeded" video-id="' . $urlVideo . '" video-title="' . $judulVideo . '"></div>';
    $VdOut .= '<script>
        let isElementCreated = false;

        function bElement() {
            if (!isElementCreated) {
                const sDiv = document.getElementById("silo_embeded");
                const vUrl = sDiv.getAttribute("video-id");
                const vJudul = sDiv.getAttribute("video-title");

                const inDiv = document.createElement("div");
                inDiv.classList.add("silo_embed", "VdEmbed");

                const EVurl = document.createElement("span");
                EVurl.className = "silCls";
                EVurl.textContent = "\u00D7";
                EVurl.addEventListener("click", function() {
                    // Menghapus class "VdEmbed" dari elemen <div>
                    inDiv.classList.remove("VdEmbed");
                    // Menyembunyikan tombol close
                    EVurl.style.display = "none";
                });

                const Imgs = document.createElement("img");
                Imgs.src = "https://i.ytimg.com/vi_webp/" + vUrl + "/hqdefault.webp";
                Imgs.title = vJudul;

                const lplay = document.createElement("div");
                lplay.classList.add("tombol-play");
                lplay.addEventListener("click", function(){
                    Imgs.style.display = "none";
                    lplay.style.display = "none";
                    inDiv.appendChild(EIFrem);
                });

                const EIFrem = document.createElement("iframe");
                EIFrem.src = "https://www.youtube.com/embed/" + vUrl + "?autoplay=1&rel=0";
                EIFrem.title = vJudul;
                EIFrem.frameBorder = "0";
                EIFrem.allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture";
                EIFrem.allowFullscreen = true;

                inDiv.appendChild(EVurl);
                inDiv.appendChild(Imgs);
                inDiv.appendChild(lplay);

                sDiv.appendChild(inDiv);

                isElementCreated = true;
            }
        }

        // Fungsi untuk Scroll
        window.addEventListener("scroll", function () {
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                bElement();
            }
        });
    </script>';
    $VdOut .= '<script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "VideoObject",
            "name": "'. $judulVideo .'",
            "description": "Silahkan tonton video '. $judulVideo .' agar lebih faham dan tau solusi '. get_the_title() .'",
            "uploadDate": "' . get_the_date() . '",
            "thumbnailUrl": "https://i.ytimg.com/vi_webp/'. $urlVideo .'/hqdefault.webp",
            "contentUrl": "https://www.youtube.com/embed/' . $urlVideo . '",
            "embedUrl": "https://www.youtube.com/embed/' . $urlVideo . '"
        }
    </script>';

    return $VdOut;
}


// FAQ Help ShortCode Wordpress ================
// =============================================
add_shortcode('silo_faq', 'callback_silo_faq');

function callback_silo_faq($atts, $content = null) {
    // Find all occurrences of question and answer shortcodes and extract their content
    preg_match_all('/\[faq_q\](.*?)\[\/faq_q\](?:\s*<p>|\s*<\/p>)/s', $content, $question_matches);
    preg_match_all('/\[faq_a\](.*?)\[\/faq_a\](?:\s*<p>|\s*<\/p>)/s', $content, $answer_matches);

    // Initialize the HTML output
    $html_output = '<div class="faq-container">';

    $html_output .= '<h2 class="silo_faq">FAQ</h2>';
    // Loop through the matches and build FAQ items
    for ($i = 0; $i < count($question_matches[1]); $i++) {
        $question = trim($question_matches[1][$i]);
        $answer = trim($answer_matches[1][$i]);

        $html_output .= '<style>
        .faq-item {
            margin-bottom: 10px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .faq-question-toggle {
            box-sizing: border-box;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 10px;
            padding-bottom: 0px !important;
            background-color: #f7f7f7;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            margin-bottom: 5px;
        }
        .faq-question-toggle p{
            font-weight: bold;
            display: block;
        }
        
        .faq-question-toggle.active {
            background-color: #ffffff;
        }
        
        .faq-answer {
            display: none;
            padding: 10px;
        }
        
        .faq-question-toggle.active + .faq-answer {
            display: block;
            margin-top: -1px;
            padding-top: 0;
        }
        
        .faq-svg_open {
            display: inline-block;
            width: 20px;
            height: 20px;
            fill: #666666;
            transition: transform 0.3s;
        }
        
        .faq-question-toggle.active .faq-svg_open {
            transform: rotate(180deg);
        }
        
        .faq-svg_open {
            transform-origin: center;
        }
        </style>';

        $html_output .= '<div class="faq-item">';
        $html_output .= '<div class="faq-question-toggle">';
        $html_output .= '<p>' . esc_html( $question ) . '</p>';
        $html_output .= '<div class="faq-open-close">';
        $html_output .= '<span class="faq-svg_open"><svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.70711 9.71069C5.31658 10.1012 5.31658 10.7344 5.70711 11.1249L10.5993 16.0123C11.3805 16.7927 12.6463 16.7924 13.4271 16.0117L18.3174 11.1213C18.708 10.7308 18.708 10.0976 18.3174 9.70708C17.9269 9.31655 17.2937 9.31655 16.9032 9.70708L12.7176 13.8927C12.3271 14.2833 11.6939 14.2832 11.3034 13.8927L7.12132 9.71069C6.7308 9.32016 6.09763 9.32016 5.70711 9.71069Z" fill="#000"/>
        </svg></span>';
        $html_output .= '</div>';
        $html_output .= '</div>';
        $html_output .= '<p class="faq-answer">' . $answer . '</p>';
        $html_output .= '</div>';
    }

    // Close the HTML output
    $html_output .= '</div>';

    // JSON-LD data
    $json_ld = array(
        "@context" => "https://schema.org",
        "@type" => "FAQPage",
        "mainEntity" => array()
    );

    for ($i = 0; $i < count($question_matches[1]); $i++) {
        $question = trim($question_matches[1][$i]);
        $answer = trim($answer_matches[1][$i]);

        $json_ld["mainEntity"][] = array(
            "@type" => "Question",
            "name" => $question,
            "acceptedAnswer" => array(
                "@type" => "Answer",
                "text" => $answer
            )
        );
    }

    $json_ld_string = json_encode($json_ld, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    $html_output .= '<script type="application/ld+json">' . $json_ld_string . '</script>';

    $html_output .= '<script>
    document.addEventListener("DOMContentLoaded", function() {
        var toggles = document.querySelectorAll(".faq-question-toggle");
        
        toggles.forEach(function(toggle) {
            toggle.addEventListener("click", function() {
                this.classList.toggle("active");
            });
        });
    });
    </script>';

    return $html_output;
}
?>