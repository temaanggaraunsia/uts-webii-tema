document.addEventListener('DOMContentLoaded', function() {
    const messages = document.querySelectorAll('.message');
    messages.forEach(message => {
        if (message.innerText.trim() !== '') {
            message.style.display = 'block';
            setTimeout(() => {
                message.style.display = 'none';
            }, 3000);
        }
    });

    const deleteLinks = document.querySelectorAll('a[href*="delete_id"]');
    deleteLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            if (!confirm('Apakah Anda yakin ingin menghapus barang ini?')) {
                event.preventDefault();
            }
        });
    });
});
