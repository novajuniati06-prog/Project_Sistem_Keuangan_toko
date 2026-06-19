console.log("login");
const password = document.getElementById("password");
const togglePassword = document.getElementById("togglePassword");

togglePassword.addEventListener("click", function(){

    if(password.type === "password"){
        password.type = "text";
        togglePassword.classList.remove("bx-hide");
        togglePassword.classList.add("bx-show");

    }else{

        password.type = "password";
        togglePassword.classList.remove("bx-show");
        togglePassword.classList.add("bx-hide");
    }

});