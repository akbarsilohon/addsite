( function(){
    tinymce.PluginManager.add( 'add_mce', function( editor, url ){
        editor.addButton( 'add_mce', {
            text: 'Silohon',
            type: 'menubutton',
            menu: [
                // Ads Shortcode ---------
                {
                    text: 'Iklan',
                    menu: [
                        {
                            text: 'Shortcode Iklan 1',
                            onclick: function(){
                                editor.insertContent('[shortcode-ads-1]');
                            }
                        },
                        {
                            text: 'Shortcode Iklan 2',
                            onclick: function(){
                                editor.insertContent('[shortcode-ads-2]');
                            }
                        }
                    ]
                },

                // Faq Shortcode ---------
                {
                    text: 'FAQ',
                    icon: 'icon faq_silo_icon',
                    onclick: function () {
                        var faqItems = [];

                        editor.windowManager.open({
                            title: 'Add Faqs',
                            body: [
                                { // Untuk Judul
                                    type: 'textbox',
                                    name: 'faq_t',
                                    label: 'Judul FAQs',
                                    minWidth: 380,
                                    value: 'FAQs',
                                }, { // Untuk Paragraf pembuka
                                    type: 'textbox',
                                    name: 'faq_p',
                                    label: 'Paragraf',
                                    multiline: true,
                                    minHeight: 80,
                                    value: '',
                                    placeholder: 'Paragraf Sebelum FAQs...'
                                }, { // Kontent Faqs
                                    type: 'textbox',
                                    name: 'faq_c',
                                    label: 'Konten',
                                    value: '',
                                    multiline: true,
                                    minHeight: 100,
                                    placeholder: 'Kosongkan saja, push dengan Pertanyaan dan jawaban dibawah...'
                                }, { // Pertanyaan
                                    type: 'textbox',
                                    name: 'faq_q',
                                    label: 'Pertanyaan',
                                    value: ''
                                }, { // Jawaban
                                    type: 'textbox',
                                    name: 'faq_a',
                                    label: 'Jawaban',
                                    value: '',
                                    multiline: true,
                                    minHeight: 100
                                }, { // Tombol Tambah
                                    type: 'button',
                                    name: 'tambah',
                                    text: 'Tambah Item',
                                    maxWidth: 100,
                                    onclick: function(){
                                        var question = editor.windowManager.getWindows()[0].find('#faq_q').value();
                                        var answer = editor.windowManager.getWindows()[0].find('#faq_a').value();

                                        if( question && answer ){
                                            var faqItem = '<p>[faq_q]' + question + '[/faq_q]</p>\n<p>[faq_a]' + answer + '[/faq_a]</p>\n';
                                            faqItems.push( faqItem );

                                            var faqContentTextarea = editor.windowManager.getWindows()[0].find('#faq_c');
                                            faqContentTextarea.value(faqItems.join('\n'));
                                            editor.windowManager.getWindows()[0].find('#faq_q').value('');
                                            editor.windowManager.getWindows()[0].find('#faq_a').value('');
                                        }
                                    }
                                }
                            ], onsubmit: function( e ){
                                var JudulFaq = e.data.faq_t;
                                var ParagrafFaq = e.data.faq_p;
                                var isiFaq = '<p>[add_faq judul="' + JudulFaq + '" paragraf="'+ ParagrafFaq +'"]</p>\n' + e.data.faq_c + '<p>[/add_faq]</p>';

                                editor.insertContent( isiFaq );
                            }
                        });
                    }
                },

                // Youtube ShortCode -----
                {
                    text: 'Youtube',
                    onclick: function(){
                        editor.windowManager.open({
                            title: 'Shortcode Youtube',
                            body: {
                                type: 'textbox',
                                name: 'add_youtube',
                                label: 'Video ID',
                                minWidth: 380,
                                value: '',
                                placeholder: 'id video disini'
                            },
                            onsubmit: function( e ){
                                editor.insertContent( '[add_youtube videoid="'+ e.data.add_youtube +'"]' );
                            }
                        });
                    }
                }
            ]
        });
    });
})();