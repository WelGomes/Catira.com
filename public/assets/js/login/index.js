// ================================================================================= LOGIN =================================================================================
// Mensagem de alerta formulário de Login
const alertMessageLogin = document.querySelector("#alertMessageLogin");

// Input E-mail
const spanEmail = document.querySelector("#spanEmail");
const inputEmail = document.querySelector("#email");
const emailIncorrect = document.querySelector("#emailIncorrect");

// Input Senha
const spanPassword = document.querySelector("#spanPassword");
const inputPassword = document.querySelector("#password");
const passwordIncorrect = document.querySelector("#passwordIncorrect");

const bodyLogin = document.querySelector("#bodyLogin");
const btnFormLogin = document.querySelector("#btnFormLogin");
const formLogin = document.querySelector("#formLogin");

spanPassword?.addEventListener("click", () => {
    const type = inputPassword.type == "password" ? true : false;

    if (type) {
        spanPassword.innerHTML = "<i class='bi bi-eye-slash'></i>";
        inputPassword.type = "text";
    } else {
        spanPassword.innerHTML = "<i class='bi bi-eye'></i>"
        inputPassword.type = "password";
    }
});

btnFormLogin?.addEventListener("click", () => {
    //Form Login
    formLogin.classList.remove("d-none");

    // Botão Registrar
    btnFormLogin.classList.remove("color-catira-green");
    btnFormLogin.classList.add("color-catira-white");
    btnFormLogin.classList.remove("text-white");
    
    // Botão Login
    btnFormRegister.classList.remove("color-catira-white");
    btnFormRegister.classList.add("color-catira-green");
    btnFormRegister.classList.add("text-white");

    //Form Register
    formRegister.classList.add("d-none");
});

function login() {
    if (inputEmail.value == null || inputEmail.value == "") {
        emailIncorrect.classList.toggle("d-none");
        inputEmail.classList.toggle("border-danger");
        spanEmail.classList.toggle("border-danger");
        spanEmail.classList.toggle("text-danger");
        emailIncorrect.innerHTML = "Preencha o campo de e-mail!"
    }

    if (inputPassword.value == null || inputPassword.value == "") {
        passwordIncorrect.classList.toggle("d-none");
        inputPassword.classList.toggle("border-danger");
        spanPassword.classList.toggle("border-danger");
        spanPassword.classList.toggle("text-danger");
        passwordIncorrect.innerHTML = "Preencha o campo de Senha!"
    }

    setTimeout(() => {
        // Input E-mail
        emailIncorrect.classList.toggle("d-none");
        inputEmail.classList.toggle("border-danger");
        spanEmail.classList.toggle("border-danger");
        spanEmail.classList.toggle("text-danger");

        // Input Senha
        passwordIncorrect.classList.toggle("d-none");
        inputPassword.classList.toggle("border-danger");
        spanPassword.classList.toggle("border-danger");
        spanPassword.classList.toggle("text-danger");
    }, 5000);
}


// ================================================================================= REGISTER =================================================================================

// Mensagem de alerta formulário de Registro
const alertMessageRegister = document.querySelector("#alertMessageRegister");

// Input Nome
const spanFirstName = document.querySelector("#spanFirstName");
const inputFirstName = document.querySelector("#firstName");
const firstNameIncorrect = document.querySelector("#firstNameIncorrect");

// Input Sobrenome
const spanLastName = document.querySelector("#spanLastName");
const inputLastName = document.querySelector("#lastName");
const lastNameIncorrect = document.querySelector("#lastNameIncorrect");

// Input CPF/CNPJ
const spanCpfCnpj = document.querySelector("#spanCpfCnpj");
const inputcpfCnpjRegister = document.querySelector("#cpfCnpjRegister");
const cpfCnpjIncorrect = document.querySelector("#cpfCnpjRegisterIncorrect");

// Input E-mail
const spanEmailRegister = document.querySelector("#spanEmailRegister");
const inputEmailRegister = document.querySelector("#emailRegister");
const emailRegisterIncorrect = document.querySelector("#emailRegisterIncorrect");

// Input Data de Nascimento
const spanBirthData = document.querySelector("#spanBirthData");
const inputBirthData = document.querySelector("#birthData");
const birthDataIncorrect = document.querySelector("#birthDataIncorrect");

// Input Senha
const spanPasswordRegister = document.querySelector("#spanPasswordRegister");
const inputPasswordRegister = document.querySelector("#passwordRegister");
const passwordRegisterIncorrect = document.querySelector("#passwordRegisterIncorrect");

const formRegister = document.querySelector("#formRegister");
const btnFormRegister = document.querySelector("#btnFormRegister");


btnFormRegister?.addEventListener("click", () => {
    //Form Login
    formLogin.classList.add("d-none");

    // Botão Registrar
    btnFormRegister.classList.remove("color-catira-green");
    btnFormRegister.classList.add("color-catira-white");
    btnFormRegister.classList.remove("text-white");
    
    // Botão Login
    btnFormLogin.classList.remove("color-catira-white");
    btnFormLogin.classList.add("color-catira-green");
    btnFormLogin.classList.add("text-white");

    //Form Register
    formRegister.classList.remove("d-none");
});

spanPasswordRegister?.addEventListener("click", () => {

    let isVisible = passwordRegister.type == "password" ? true : false;

    if (isVisible) {
        spanPasswordRegister.innerHTML = "<i class='bi bi-eye-slash'></i>"
        passwordRegister.type = "text";
    } else {
        spanPasswordRegister.innerHTML = "<i class='bi bi-eye'></i>"
        passwordRegister.type = "password";
    }

});

async function register() {

    try {

        if (!verifyRegister()) {
            console.log("aq tá errado");
            return;
        }

        const response = await call(
            "/user/register",
            {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(
                    {
                        firstName: inputFirstName.value,
                        lastName: inputLastName.value,
                        cpfCnpjRegister: inputcpfCnpjRegister.value,
                        emailRegister: inputEmailRegister.value,
                        birthData: inputBirthData.value,
                        password: inputPasswordRegister.value
                    }
                )
            }
        );

        if(response.status == 200) {
            inputFirstName.value = ""
            inputLastName.value = ""
            inputcpfCnpjRegister.value = ""
            inputEmailRegister.value = ""
            inputBirthData.value = ""
            inputPasswordRegister.value = ""

            formRegister.classList.add("d-none");
            formLogin.classList.remove("d-none");
            
            btnFormRegister.classList.remove("text-dark");
            btnFormRegister.classList.remove("color-catira-white");
            btnFormRegister.classList.add("text-white");
            btnFormRegister.classList.add("color-catira-green");
            
            btnFormLogin.classList.remove("text-white");
            btnFormLogin.classList.remove("color-catira-green");
            btnFormLogin.classList.add("text-dark");
            btnFormLogin.classList.add("color-catira-white");
            

            alertMessageLogin.classList.remove("d-none");
            alertMessageLogin.classList.add("alert-success");
            alertMessageLogin.innerHTML = response.message + "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
            setTimeout(() => {
                alertMessageLogin.classList.add("d-none");
            }, 5000);
        }

    } catch (error) {

        alertMessageRegister.classList.remove("d-none");
        alertMessageRegister.innerHTML = error.message + "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
        setTimeout(() => {
            alertMessageRegister.classList.add("d-none");
        }, 5000);

    }
}

function verifyRegister() {

    let errorsExists = true;

    if (inputFirstName.value == null || inputFirstName.value == "") {
        spanFirstName.classList.add("text-danger");
        spanFirstName.classList.add("border-danger");
        inputFirstName.classList.add("border-danger");
        firstNameIncorrect.classList.remove("d-none");
        errorsExists = false;
    }

    if (inputLastName.value == null || inputLastName.value == "") {
        spanLastName.classList.add("text-danger");
        spanLastName.classList.add("border-danger");
        inputLastName.classList.add("border-danger");
        lastNameIncorrect.classList.remove("d-none");
        errorsExists = false;
    }

    if (inputcpfCnpjRegister.value == null || inputcpfCnpjRegister.value == "") {
        spanCpfCnpj.classList.add("text-danger");
        spanCpfCnpj.classList.add("border-danger");
        inputcpfCnpjRegister.classList.add("border-danger");
        cpfCnpjIncorrect.classList.remove("d-none");
        errorsExists = false;
    }

    if (inputEmailRegister.value == null || inputEmailRegister.value == "") {
        spanEmailRegister.classList.add("text-danger");
        spanEmailRegister.classList.add("border-danger");
        inputEmailRegister.classList.add("border-danger");
        emailRegisterIncorrect.classList.remove("d-none");
        errorsExists = false;
    }

    if (inputBirthData.value == null || inputBirthData.value == "") {
        spanBirthData.classList.add("text-danger");
        spanBirthData.classList.add("border-danger");
        inputBirthData.classList.add("border-danger");
        birthDataIncorrect.classList.remove("d-none");
        errorsExists = false;
    }

    if (inputPasswordRegister.value == null || inputPasswordRegister.value == "") {
        spanPasswordRegister.classList.add("text-danger");
        spanPasswordRegister.classList.add("border-danger");
        inputPasswordRegister.classList.add("border-danger");
        passwordRegisterIncorrect.classList.remove("d-none");
        errorsExists = false;
    }

    setTimeout(() => {
        // Input Nome
        spanFirstName.classList.remove("text-danger");
        spanFirstName.classList.remove("border-danger");
        inputFirstName.classList.remove("border-danger");
        firstNameIncorrect.classList.add("d-none");

        // Input Sobrenome
        spanLastName.classList.remove("text-danger");
        spanLastName.classList.remove("border-danger");
        inputLastName.classList.remove("border-danger");
        lastNameIncorrect.classList.add("d-none");

        // Input CPF/CNPJ
        spanCpfCnpj.classList.remove("text-danger");
        spanCpfCnpj.classList.remove("border-danger");
        inputcpfCnpjRegister.classList.remove("border-danger");
        cpfCnpjIncorrect.classList.add("d-none");

        // Input E-mail
        spanEmailRegister.classList.remove("text-danger");
        spanEmailRegister.classList.remove("border-danger");
        inputEmailRegister.classList.remove("border-danger");
        emailRegisterIncorrect.classList.add("d-none");

        // Input Data de Nascimento
        spanBirthData.classList.remove("text-danger");
        spanBirthData.classList.remove("border-danger");
        inputBirthData.classList.remove("border-danger");
        birthDataIncorrect.classList.add("d-none");

        // Input Senha
        spanPasswordRegister.classList.remove("text-danger");
        spanPasswordRegister.classList.remove("border-danger");
        inputPasswordRegister.classList.remove("border-danger");
        passwordRegisterIncorrect.classList.add("d-none");
    }, 5000)
    
    return errorsExists;
}


// ================================================================================= CHAMADA DE API =================================================================================

async function call(url, body) {

    const response = await fetch(url, body);

    if (!response.ok) {
        throw new Error("Error ao consultar API");
    }

    const result = await response.json();

    if (result.status != 200) {
        throw new Error(result.message);
    }

    return result;
}