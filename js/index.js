let shareBtn = document.querySelector('.share-post');

document.querySelectorAll('.post-container').forEach(post => {
    const text = post.querySelector('.post-content-text');
    const btn = post.querySelector('.read-more-btn');
    
    text.classList.add('short');
    if (text.scrollHeight > text.clientHeight) btn.style.display = 'inline-block';

    btn.onclick = () => {
        const isShort = text.classList.toggle('short');
        btn.textContent = isShort ? 'Читать дальше...' : 'Свернуть';
    };
});