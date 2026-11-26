let inputText = document.getElementById('text');
let inputTopic = document.getElementById('post-top');

let publishBtn = document.getElementById('publishButton');

inputTopic.addEventListener(('input'), () => {
    if(inputTopic.value.trim() === '') {
        publishBtn.disabled = true;
    } else {

        if(inputTopic.value.trim() !== '' && inputText.value.trim() !== '') {
            publishBtn.disabled = false;
        }

        else {
            publishBtn.disabled = true;
        }
    }
})

inputText.addEventListener(('input'), () => {
    if(inputText.value.trim() === '') {
        publishBtn.disabled = true;
    } else {

        if(inputTopic.value.trim() !== '' && inputText.value.trim() !== '') {
            publishBtn.disabled = false;
        }

        else {
            publishBtn.disabled = true;
        }
    }
});



