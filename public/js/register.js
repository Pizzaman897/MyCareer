document.getElementById("registerForm").addEventListener("submit", function(e){
    const inputs = this.querySelectorAll("input");
    const password = inputs[2]?.value ?? '';
    const confirm = inputs[3]?.value ?? '';

    if(password !== confirm){
        e.preventDefault();
        alert("Password tidak sama!");
        return;
    }
    // Allow normal form POST to /register
});
