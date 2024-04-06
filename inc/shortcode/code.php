<?php
/**
 * Shorcode tema silohon add site
 * @package silohon-add-site
 * @link https://github.com/akbarsilohon/addsite.git
 */


// Mendaftarkan MCE Button plugin ================
// ===============================================
define ( 'MCE_JS', ADD_URI . '/inc/shortcode/mce.js' );
add_action( 'admin_init', 'add_mendaftarkan_mce_button' );
function add_mendaftarkan_mce_button(){
    global $typenow;

    if( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' )){
        return;
    }

    if( get_user_option( 'rich_editing' ) == 'true' ){
        add_filter( 'mce_external_plugins', 'add_mce_external_plugins' );
        add_filter( 'mce_buttons', 'add_mce_buttons' );
    }

    function add_mce_external_plugins( $plugin_array ){
        $plugin_array[ 'add_mce' ] = MCE_JS;
        return $plugin_array;
    }

    function add_mce_buttons( $buttons ){
        array_push( $buttons, 'add_mce' );
        return $buttons;
    }
}



// Shortcode ads 1 ============================
// ============================================
add_shortcode( 'shortcode-ads-1', 'add_call_shorcode_ads_1' );
function add_call_shorcode_ads_1(){
    $shorCodeAds1 = get_option( 'add_ads_sc1' );

    $ads1Output = '<div class="add_ads">';
    $ads1Output .= $shorCodeAds1;
    $ads1Output .= '</div>';

    return $ads1Output;
}

// Shortcode ads 2 ============================
// ============================================
add_shortcode( 'shortcode-ads-2', 'add_call_shorcode_ads_2' );
function add_call_shorcode_ads_2(){
    $shorCodeAds2 = get_option( 'add_ads_sc2' );

    $ads2Output = '<div class="add_ads">';
    $ads2Output .= $shorCodeAds2;
    $ads2Output .= '</div>';

    return $ads2Output;
}


// Faqs ========================================
// =============================================
add_shortcode( 'add_faq', 'callback_add_faq' );
function callback_add_faq( $atts, $content = null ){
    $judul = !empty( $atts['judul'] ) ? $atts['judul'] : 'FAQs';
    $paragraf = !empty( $atts['paragraf'] ) ? '<p>' .$atts['paragraf']. '</p>' : '';

    preg_match_all('/\[faq_q\](.*?)\[\/faq_q\](?:\s*<p>|\s*<\/p>)/s', $content, $question_matches);
    preg_match_all('/\[faq_a\](.*?)\[\/faq_a\](?:\s*<p>|\s*<\/p>)/s', $content, $answer_matches);

    $outputFaqs = '<h2>' .$judul. '</h2>';
    $outputFaqs .= $paragraf;

    $outputFaqs .= '<style>.add_faqs_items{margin-bottom: 25px}.add_faqs_items .faq_header{display:flex;align-items:center;justify-content:space-between;font-weight:700;font-size:18px;font-family:Oswald;padding:10px 0;margin-bottom:10px;border-bottom:1px solid #d56340;border-top:1px solid #d56340}.faq_header span{color:#444;line-height:28px;word-wrap:break-word;word-break:break-all}.faq_header #faq_header-toggle{color:#d56340;cursor:pointer;font-size:25px;padding:10px}.item_answer{display:none;transition: all 1s;}</style>';

    $outputFaqs .= '<div class="add_faqs_items">';

    for( $i = 0; $i < count($question_matches[1]); $i++ ){
        $question = trim($question_matches[1][$i]);
        $answer = trim($answer_matches[1][$i]);

        $outputFaqs .= '<div class="faq_header">';
        $outputFaqs .= '<span>' .esc_html( $question ). '</span><span id="faq_header-toggle">+</span>';
        $outputFaqs .= '</div>';
        $outputFaqs .= '<p class="item_answer">' .esc_html( $answer ). '</p>';

    }

    $outputFaqs .= '</div>';

    // Tambahkan Meta data SEO
    $json_ld = array(
        "@context" => "https://schema.org",
        "@type" => "FAQPage",
        "mainEntity" => array()
    );

    for( $i = 0; $i < count($question_matches[1]); $i++ ){
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
    $outputFaqs .= '<script type="application/ld+json">' . $json_ld_string . '</script>';

    $outputFaqs .= '<script>
        document.addEventListener(\'click\', function(event) {
            var toggleButton = event.target;
            // Periksa apakah yang diklik adalah tombol toggle
            if (toggleButton.id === \'faq_header-toggle\') {
                var answer = toggleButton.parentNode.nextElementSibling;
                // Toggle status jawaban
                if (answer.style.display === \'block\') {
                    answer.style.display = \'none\';
                    toggleButton.textContent = \'+\';
                } else {
                    answer.style.display = \'block\';
                    toggleButton.textContent = \'-\';
                }
            }
        });
    </script>';

    return $outputFaqs;
}