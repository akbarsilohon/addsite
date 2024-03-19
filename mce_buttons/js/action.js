(function(){
    tinymce.PluginManager.add('silo_mce', function(editor, url){
        editor.addButton('silo_mce', {
            text: 'SILO',
            icon: 'icon silo_icon_mce',
            type: 'menubutton',
            menu: [
                {   // Add Menu Button ------------
                    //-----------------------------
                    text: '  BUTTON',
                    icon: 'icon buton_mce',
                    onclick: function(){
                        editor.windowManager.open({
                            title: 'Add Button ShortCode',
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'BtnContent',
                                    label: 'Content',
                                    minWidth: 350,
                                    value: ''
                                },
                                {
                                    type: 'listbox',
                                    name: 'BtnColor',
                                    label: 'Colors',
                                    values: [
                                        {text: 'Black', value: 'black'},
                                        {text: 'Blue', value: 'blue'},
                                        {text: 'Green', value: 'green'},
                                        {text: 'Orange', value: 'orange'}
                                    ]
                                },
                                {
                                    type: 'textbox',
                                    name: 'BtnUrl',
                                    label: 'URL',
                                    value: 'https://'
                                },
                                {
                                    type: 'checkbox',
                                    name: 'BtnBlank',
                                    label: 'Open In New Tab',
                                    velue: 'true'
                                }
                            ],
                            onsubmit: function( e ){
                                var BtnColor = e.data.BtnColor;
                                var BtnUrl = e.data.BtnUrl;
                                var BtnBlank = e.data.BtnBlank;
                                var BtnContent = e.data.BtnContent;
                                var BtnTarget = ( BtnBlank == true ? '_blank' : '' );

                                editor.insertContent('[silo-btn class="'+BtnColor+'" link="'+BtnUrl+'" target="'+BtnTarget+'"]'+BtnContent+'[/silo-btn]');
                            }
                        });
                    }
                }, // End Add Menu Button


                {
                    // Add Menu Product ---------------
                    // --------------------------------
                    text: '  RELATED POST',
                    icon: 'icon related_mce',
                    onclick: function(){
                        editor.windowManager.open({
                            title: 'Add Related Post',
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'RelatedTitle',
                                    label: 'Title',
                                    minWidth: 350,
                                    value: ''
                                },
                                {
                                    type: 'textbox',
                                    name: 'RelatedLink',
                                    label: 'Url',
                                    value: 'https://'
                                },
                                {
                                    type: 'textbox',
                                    name: 'RelatedImg',
                                    label: 'Img Url',
                                    value: ''
                                },
                                {
                                    type: 'checkbox',
                                    name: 'RelatedTarget',
                                    label: 'Open In New Tab',
                                    value: 'true'
                                }
                            ],
                            onsubmit: function( e ){
                                var RelatedTitle = e.data.RelatedTitle;
                                var RelatedLink = e.data.RelatedLink;
                                var RelatedImg = e.data.RelatedImg;
                                var RelatedTarget = e.data.RelatedTarget;
                                var RelatedBlnk = ( RelatedTarget == true ? '_blank' : '' );

                                editor.insertContent('[silo-related target="'+RelatedBlnk+'" title="'+RelatedTitle+'" url="'+RelatedLink+'" gambar="'+RelatedImg+'"]');
                            }
                        });
                    }
                }, // End menu Product

                {
                    // Add ShortCode Product ----------
                    // --------------------------------
                    text: '  PRODUCT',
                    icon: 'icon product_mce',
                    onclick: function(){
                        editor.windowManager.open({
                            title: 'Add ShortCode Product',
                            body: [
                                {
                                    type: 'listbox',
                                    name: 'ProducToko',
                                    label: 'Market Place',
                                    minWidth: 350,
                                    values: [
                                        { text: 'Toko Pedia', value: 'tokopedia.jpg' },
                                        { text: 'Shopee', value: 'shopee.jpg' },
                                        { text: 'BliBli', value: 'blibli.jpg' },
                                        { text: 'Buka Lapak', value: 'bukalapak.jpg' },
                                        { text: 'Lazada', value: 'lazada.jpg' },
                                        { text: 'I Style', value: 'istyle.png' },
                                        { text: 'Aku Laku', value: 'akulaku.png' }
                                    ]
                                },
                                {
                                    type: 'textbox',
                                    name: 'ProducTitle',
                                    label: 'Product Name',
                                    value: ''
                                },
                                {
                                    type: 'textbox',
                                    name: 'ProducOngkir',
                                    label: 'Ongkir',
                                    value: 'Rp. '
                                },
                                {
                                    type: 'textbox',
                                    name: 'ProducHarga',
                                    label: 'Price',
                                    value: 'Rp. '
                                },
                                {
                                    type: 'textbox',
                                    name: 'ProducLokasi',
                                    label: 'Location',
                                    value: 'Dalam Negeri'
                                },
                                {
                                    type: 'textbox',
                                    name: 'ProducLink',
                                    label: 'Url',
                                    value: 'https://'
                                }
                            ],
                            onsubmit: function( e ){
                                var ProducToko = e.data.ProducToko;
                                var ProducTitle = e.data.ProducTitle;
                                var ProducOngkir = e.data.ProducOngkir;
                                var ProducHarga = e.data.ProducHarga;
                                var ProducLokasi = e.data.ProducLokasi;
                                var ProducLink = e.data.ProducLink;

                                editor.insertContent('[silo-product toko="'+ProducToko+'" title="'+ProducTitle+'" ongkir="'+ProducOngkir+'" harga="'+ProducHarga+'" lokasi="'+ProducLokasi+'" link="'+ProducLink+'"]');
                            }
                        });
                    }
                }, // End ShortCode Product

                {
                    // Ads Code -------------------
                    // ----------------------------
                    text: '  ADS',
                    icon: 'icon ads_mce',
                    menu: [
                        {
                            text: '  Ads 1',
                            icon: 'icon ads_icon_mce',
                            onclick: function(){
                                editor.insertContent('[ads1]');
                            }
                        },
                        {
                            text: '  Ads 2',
                            icon: 'icon ads_icon_mce',
                            onclick: function(){
                                editor.insertContent('[ads2]');
                            }
                        }
                    ]
                }, // End Ads Shortcode

                {
                    // Table Of Content -------------------
                    // ------------------------------------
                    text: '  TOC',
                    icon: 'icon toc_mce',
                    onclick: function(){
                        editor.insertContent('[silo_toc]');
                    }
                }, // End TOC

                {
                    // Add iframe Youtube Video Embed
                    text: ' Embed Video',
                    icon: 'icon video_mce',
                    onclick: function(){
                        editor.windowManager.open({
                            title: 'Add Youtube Embed Video',
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'judulVideo',
                                    label: 'Judul Video',
                                    minWidth: 380,
                                    value: 'Video '
                                },

                                {
                                    type: 'textbox',
                                    name: 'urlVideoYoutube',
                                    label: 'url Video',
                                    value: 'https://'
                                }
                            ], onsubmit: function( e ){
                                var JudulVideo = e.data.judulVideo;
                                var urlVideo = e.data.urlVideoYoutube;

                                editor.insertContent('[silo-embed judul="'+ JudulVideo +'" url="'+ urlVideo +'"]');
                            }
                        })
                    }
                },

                // FAQ Help
                {
                    text: 'FAQ Help',
                    icon: 'icon faq_silo_icon',
                    menu: [
                        {
                            text: 'FAQ Open',
                            onclick: function(){
                                var content = '[silo_faq][/silo_faq]';
                                editor.insertContent( content );
                            }
                        },
                        {
                            text: 'Item',
                            onclick: function(){
                                editor.windowManager.open({
                                    title: 'Add FAQ Item',
                                    body: [
                                        {
                                            type: 'textbox',
                                            name: 'question',
                                            label: 'Question',
                                            minWidth: 380,
                                            value: ''
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'answer',
                                            label: 'Answer',
                                            multiline: true,
                                            minHeight: 100,
                                            value: ''
                                        }
                                    ], onsubmit: function( e ){
                                        var Question = e.data.question;
                                        var Answer = e.data.answer;

                                        editor.insertContent(
                                            '[faq_q]'+ Question +'[/faq_q][faq_a]'+ Answer +'[/faq_a]'
                                        );
                                    }
                                });
                            }
                        }
                    ]
                }
            ]
        });
    });
})();