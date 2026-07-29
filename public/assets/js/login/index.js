const bodyLogin          = document.querySelector("#bodyLogin");
const inputEmail         = document.querySelector("#email");
const inputPassword      = document.querySelector("#password");
const emailIncorrect     = document.querySelector("#emailIncorrect");
const passwordIncorrect  = document.querySelector("#passwordIncorrect");
const spanEmail          = document.querySelector("#spanEmail");
const spanPassword       = document.querySelector("#spanPassword");
const btnFormLogin       = document.querySelector("#btnFormLogin");
const btnFormRegister    = document.querySelector("#btnFormRegister");
const formLogin          = document.querySelector("#formLogin");
const formRegister       = document.querySelector("#formRegister");

spanPassword?.addEventListener("click", () => {
    const type = inputPassword.type == "password" ? true : false;

    if(type) {
        spanPassword.innerHTML = "<i class='bi bi-eye-slash'></i>";
        inputPassword.type = "text";
    } else {
        spanPassword.innerHTML = "<i class='bi bi-eye'></i>"
        inputPassword.type = "password";
    }
});

btnFormRegister?.addEventListener("click", () => {
    //Form Login
    bodyLogin.classList.remove("color-catira-white");
    bodyLogin.classList.add("color-catira-green");
    formLogin.classList.add("d-none");

    //Form Register
    formRegister.classList.remove("d-none");
});

btnFormLogin?.addEventListener("click", () => {
    //Form Login
    bodyLogin.classList.remove("color-catira-green");
    bodyLogin.classList.add("color-catira-white");
    formLogin.classList.remove("d-none");

    //Form Register
    formRegister.classList.add("d-none");
});

function login()
{
    if(inputEmail.value == null || inputEmail.value == "") {
        emailIncorrect.classList.toggle("d-none");
        inputEmail.classList.toggle("border-danger");
        spanEmail.classList.toggle("border-danger");
        spanEmail.classList.toggle("text-danger");
        emailIncorrect.innerHTML = "Preencha o campo de Senha!"

        setTimeout(() => {
            emailIncorrect.classList.toggle("d-none");
            inputEmail.classList.toggle("border-danger");
            spanEmail.classList.toggle("border-danger");
            spanEmail.classList.toggle("text-danger");
        }, 5000);
    }

    if(inputPassword.value == null || inputPassword.value == "") {
        passwordIncorrect.classList.toggle("d-none");
        inputPassword.classList.toggle("border-danger");
        spanPassword.classList.toggle("border-danger");
        spanPassword.classList.toggle("text-danger");
        passwordIncorrect.innerHTML = "Preencha o campo de e-mail!"
        
        setTimeout(() => {
            passwordIncorrect.classList.toggle("d-none");
            inputPassword.classList.toggle("border-danger");
            spanPassword.classList.toggle("border-danger");
            spanPassword.classList.toggle("text-danger");
        }, 5000);
    }
}
