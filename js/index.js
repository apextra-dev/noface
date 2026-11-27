function updateReadMoreButtons() {
    document.querySelectorAll('.post-container').forEach(post => {
        const text = post.querySelector('.post-content-text');
        const btn = post.querySelector('.read-more-btn');

        if (!text || !btn) return;

        const isCurrentlyExpanded = btn.dataset.expanded === 'true';

        if (!isCurrentlyExpanded) {
            text.classList.add('short');
            if (text.scrollHeight > text.clientHeight + 2) {
                btn.style.display = 'inline-block';
            } else {
                btn.style.display = 'none';
                text.classList.remove('short');
            }
        }

        if (!btn.dataset.listenerAttached) {
            btn.dataset.listenerAttached = 'true';
            btn.onclick = () => {
                const isShort = text.classList.toggle('short');
                btn.dataset.expanded = isShort ? 'false' : 'true';
                btn.textContent = isShort ? 'Читать дальше...' : 'Свернуть';
            };
        }
    });
}

updateReadMoreButtons();

if (document.fonts && document.fonts.ready) {
    document.fonts.ready.then(updateReadMoreButtons);
}

window.addEventListener('load', updateReadMoreButtons);
window.addEventListener('resize', updateReadMoreButtons);
