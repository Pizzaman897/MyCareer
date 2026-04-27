document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('.create-form');
    if (!form) return;

    form.addEventListener('submit', function (event) {
        const email = form.querySelector('input[name="email"]').value.trim();
        const phone = form.querySelector('input[name="phone"]').value.trim();
        const password = form.querySelector('input[name="password"]').value.trim();
        const confirmPassword = form.querySelector('input[name="confirm_password"]').value.trim();

        if (!email || !phone || !password || !confirmPassword) {
            event.preventDefault();
            alert('Silakan isi semua field terlebih dahulu.');
            return;
        }

        if (password !== confirmPassword) {
            event.preventDefault();
            alert('Password tidak cocok. Silakan periksa kembali.');
        }
    });
});
