let inputText = document.getElementById('text')
let publishBtn = document.getElementById('publishButton')

inputText.addEventListener(('input'), () => {
    if(inputText.value.trim() === '') {
        publishBtn.disabled = true
    } else {
        publishBtn.disabled = false
    }
})

