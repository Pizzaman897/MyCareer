document.getElementById("loginForm").addEventListener("submit", function(e){
    e.preventDefault();

    const inputs = this.querySelectorAll("input");
    const email = inputs[0].value;
    const password = inputs[1].value;

    if(email === "" || password === ""){
        alert("Harap isi semua field!");
        return;
    }

    // redirect ke halaman berikutnya
    window.location.href = "personal-information-form";
});

