document.getElementById("registerForm").addEventListener("submit", function(e){
    e.preventDefault();

    const inputs = this.querySelectorAll("input");
    const password = inputs[2].value;
    const confirm = inputs[3].value;

    if(password !== confirm){
        alert("Password tidak sama!");
        return;
    }

    // pindah ke halaman sign in
    window.location.href = "sign-in";
});