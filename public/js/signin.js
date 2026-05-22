const loginForm = document.getElementById("loginForm");

if (loginForm) {
    loginForm.addEventListener("submit", function(e) {
        const email = this.querySelector('input[name="email"]').value.trim();
        const password = this.querySelector('input[name="password"]').value.trim();

        if (email === "" || password === "") {
            alert("Harap isi semua field!");
            e.preventDefault();
        }
    });
}

