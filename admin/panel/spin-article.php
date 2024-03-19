<!DOCTYPE html>
<html lang="id-ID">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo SILO_URI . '/admin/css/spinner.css' ?>">
    <script src="<?php echo SILO_URI . '/admin/js/spinner.js' ?>"></script>
    <script>
        //get input
        async function getInputValue() {
            let languageList = ["sq", "am", "ar", "zh", "da", "gu", "hy", "id", "it", "ja", "ko", "la", "ms", "ne",
                "pa", "sq", "ta", "te", "zh", "ur",
            ]
            let inputString = document.getElementById("input-string").value;

            for (let i = languageList.length - 1; i > 0; i--) {
                const randomNum = Math.floor(Math.random() * i)
                const temp = languageList[i]
                languageList[i] = languageList[randomNum]
                languageList[randomNum] = temp
            }

            languageList[0] = `id`
            languageList[5] = `id`
            languageList[10] = `id`
            languageList[15] = `id`
            paraphraseControler(inputString, languageList)
        }

        //control paraphrase
        async function paraphraseControler(string, lang) {
            let paraphrase = string

            //for 3 output - start position, end position and option number
            showParaphrase(0, 5, 1)
            showParaphrase(5, 10, 2)
            showParaphrase(10, 15, 3)

            async function showParaphrase(start, end, option) {
                for (let i = start; i < end; i++) {
                    const api_url = `https://translate.googleapis.com/translate_a/single?client=gtx&sl=${lang[i]}&tl=${lang[i + 1]}&dt=t&q=${encodeURI(paraphrase)}`;
                    const response = await fetch(api_url);
                    let data = await response.json();
                    let strOutput = [];
                    if (data) {
                        data && data[0].map((item) => {
                            item[0].length > 0 && strOutput.push(item[0]);
                        })
                    }
                    paraphrase = strOutput.join(' ');
                    if (i == end - 1) {
                        let inputWords = document.getElementById("input-string").value.toLowerCase().replace(
                            / \s*/g, " ").split(" ")
                        document.getElementById(`total-input-words-${option}`).innerText = inputWords.length;
                        let differentWordCount = 0;
                        paraphrase.split(" ").forEach(word => {
                            if (inputWords.indexOf(word.toLowerCase()) < 0) {
                                differentWordCount++
                            }
                        })
                        document.getElementById(`total-different-${option}`).innerText = differentWordCount;
                        document.getElementById(`paraphrase-output-${option}`).innerHTML = paraphrase;
                        document.getElementById(`tooltip-${option}`).title =
                            `${differentWordCount} out of ${inputWords.length} words are different from input words`;

                    }
                }
            }
        }

        // clipboard
        function clipboardHandler(id) {
            let copyTextarea = document.getElementById(id);
            copyTextarea.focus();
            copyTextarea.select();
            try {
                document.execCommand('copy');
            } catch (err) {
                console.log('Oops, unable to copy');
            }
        };
    </script>
</head>

<body>
    <div class="spin_container">
        <h3>Spin Article</h3>
        <div class="spin_flex">
            <div class="spin_input_text">
                <textarea placeholder="Input Text Here..." id="input-string" class="spin_text_area"></textarea>
                <button onclick="getInputValue();" type="button" class="spin_btn">
                    Spin Text
                </button>
            </div>

            <div class="spin_output_text">
                <div class="spin_output_box">
                    <textarea placeholder="Output 1" id="paraphrase-output-1" class="paraphrase-output" rows="8"></textarea>
                    <div class="spin_dot_copy">
                        <button onclick="clipboardHandler('paraphrase-output-1')" type="button" class="spin_btn_output">
                            Copy
                        </button>
                        <p><small id="total-different-1">0</small> / <small id="total-input-words-1">0</small></p>
                    </div>
                </div>

                <div class="spin_output_box">
                    <textarea placeholder="Output 2" id="paraphrase-output-2" class="paraphrase-output" rows="8"></textarea>
                    <div class="spin_dot_copy">
                        <button onclick="clipboardHandler('paraphrase-output-2')" type="button" class="spin_btn_output">
                            Copy
                        </button>
                        <p><small id="total-different-2">0</small> / <small id="total-input-words-2">0</small></p>
                    </div>
                </div>

                <div class="spin_output_box">
                    <textarea placeholder="Output 3" id="paraphrase-output-3" class="paraphrase-output" rows="8"></textarea>
                    <div class="spin_dot_copy">
                        <button onclick="clipboardHandler('paraphrase-output-3')" type="button" class="spin_btn_output">
                            Copy
                        </button>
                        <p><small id="total-different-3">0</small> / <small id="total-input-words-3">0</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>