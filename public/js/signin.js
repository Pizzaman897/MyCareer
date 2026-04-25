document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('.signin-form');
    if (!form) return;

    form.addEventListener('submit', function (event) {
        const email = form.querySelector('input[name="email"]').value.trim();
        const password = form.querySelector('input[name="password"]').value.trim();

        if (!email || !password) {
            event.preventDefault();
            alert('Silakan isi email/nomor telepon dan password terlebih dahulu.');
        }
    });
});
