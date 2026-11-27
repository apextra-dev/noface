document.addEventListener('DOMContentLoaded', () => {
    const toast = document.createElement('div');
    toast.className = 'toast-notification';
    toast.textContent = 'Ссылка скопирована в буфер обмена';
    document.body.appendChild(toast);

    let toastTimeout;

    function showToast(message) {
        toast.textContent = message;
        toast.classList.add('show');
        clearTimeout(toastTimeout);
        toastTimeout = setTimeout(() => {
            toast.classList.remove('show');
        }, 2500);
    }

    document.addEventListener('click', async (e) => {
        const shareBtn = e.target.closest('.share-post');
        if(!shareBtn) return;

        e.preventDefault();
        e.stopPropagation();

        const postId = shareBtn.dataset.postId;
        const postTitle = shareBtn.dataset.postTitle || 'Пост на Noface';
        const postUrl = new URL(`post.php?id=${postId}`, window.location.href).href;

        if(navigator.share) {
            try {
                await navigator.share({
                    title: postTitle,
                    text: postTitle,
                    url: postUrl
                });
            } catch(err) {
                if(err.name !== 'AbortError') {
                    copyToClipboard(postUrl);
                }
            }
        } else {
            copyToClipboard(postUrl);
        }
    });

    async function copyToClipboard(text) {
        try {
            await navigator.clipboard.writeText(text);
            showToast('Ссылка скопирована в буфер обмена');
        } catch(err) {
            const input = document.createElement('input');
            input.value = text;
            document.body.appendChild(input);
            input.select();
            document.execCommand('copy');
            document.body.removeChild(input);
            showToast('Ссылка скопирована в буфер обмена');
        }
    }
});