let inputText = document.getElementById('text');
let inputTopic = document.getElementById('post-top');

let topicLimit = document.getElementById('post-top-limit');
let textLimit = document.getElementById('post-text-limit');

let publishBtn = document.getElementById('publishButton');

const inputTopicLimit = 200;
const inputTextLimit = 1500;

let currentTopicSymbols = 0;
let currentTextSymbols = 0;

inputTopic.addEventListener(('input'), () => {
    currentTopicSymbols = inputTopic.value.length;
    topicLimit.textContent = currentTopicSymbols + '/' + inputTopicLimit;

    if(inputTopic.value.trim() === '') {
        publishBtn.disabled = true;
    } else {

        if(inputTopic.value.trim() !== '' && inputText.value.trim() !== '') {
            if(currentTopicSymbols > inputTopicLimit) {
                publishBtn.disabled = true;
            }
            else if(!(currentTopicSymbols > inputTopicLimit) && !(currentTextSymbols > inputTextLimit)) {
                publishBtn.disabled = false;
            }
        }
        else {
            publishBtn.disabled = true;
        }
    }
})

inputText.addEventListener(('input'), () => {
    currentTextSymbols = inputText.value.length;
    textLimit.textContent = currentTextSymbols + '/' + inputTextLimit;

    if(inputText.value.trim() === '') {
        publishBtn.disabled = true;
    } else {

        if(inputTopic.value.trim() !== '' && inputText.value.trim() !== '') {
            if(currentTextSymbols > inputTextLimit) {
                publishBtn.disabled = true;
            }
            else if(!(currentTextSymbols > inputTextLimit) && !(currentTopicSymbols > inputTopicLimit)) {
                publishBtn.disabled = false;
            }
        }
        else {
            publishBtn.disabled = true;
        }
    }
});



