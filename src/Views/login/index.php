<?php require_once __DIR__ . "/../templates/header.php" ?>

<section class="container-fluid p-0 w-100 vh-100">

    <div class="row g-0 min-vh-100">

        <div class="d-none d-md-flex col-md-8 col-lg-8 d-flex justify-content-center align-items-center vh-100 color-catira-black">
            <img class="img-fluid" style="max-width: 400px;" src="/images/catira.com_logo.png" alt="">
        </div>

        <div class="col-12 col-md-4 col-lg-4 d-flex flex-column justify-content-center align-items-center min-vh-100 color-catira-white" id="bodyLogin">
            <img class="img-fluid d-md-none mb-4 mt-3" style="max-width: 180px;" src="/images/catira.com_logo.png" alt="">

            <div>
                <button class="btn color-catira-white ps-4 pe-4" id="btnFormLogin">Entrar</button>
                <button class="btn color-catira-green text-white" id="btnFormRegister">Registrar</button>
            </div>

            <form action="" id="formLogin" class="m-3 p-3 w-100">

                <div class="flex-column">

                    <div class="input-group has-validation col-12">
                        <span class="input-group-text" id="spanEmail"><i class="bi bi-envelope"></i></span>
                        <div class="form-floating is-invalid">
                            <input type="text" class="form-control focus-ring focus-ring-success" id="email" placeholder="e-mail">
                            <label for="email">E-mail</label>
                        </div>
                        <div class="invalid-feedback d-none" id="emailIncorrect">
                            E-mail incorreto!
                        </div>
                    </div>

                    <div class="input-group has-validation mt-3 col-12">
                        <span class="input-group-text text-center" role="button" id="spanPassword"><i class="bi bi-eye"></i></span>
                        <div class="form-floating is-invalid">
                            <input type="password" class="form-control focus-ring focus-ring-success" id="password" placeholder="password" required>
                            <label for="password">Senha</label>
                        </div>
                        <div class="invalid-feedback d-none" id="passwordIncorrect">
                            Senha incorreto!
                        </div>
                    </div>

                    <div class="mt-3 col-12 text-end">
                        <p>Esqueceu a senha? <a href="">Clique aqui!</a></p>
                    </div>

                    <div class="mt-3">
                        <button type="button" class="btn w-100 color-catira-green text-white" onclick="login()">Acessar</button>
                    </div>

                </div>

            </form>

            <form action="" id="formRegister" class="d-none m-3 p-3 w-100">

                <div class="flex-column">

                    <div class="input-group has-validation mt-3 col-12 col-md-6 col-lg-6">
                        <span class="input-group-text text-center" id="spanFirstName"><i class="bi bi-person"></i></span>
                        <div class="form-floating is-invalid">
                            <input type="text" class="form-control focus-ring focus-ring-success" id="firstName" placeholder="password" required>
                            <label for="firstName">Nome</label>
                        </div>
                        <div class="invalid-feedback d-none" id="firstNameIncorrect">
                            Nome incorreto!
                        </div>
                    </div>

                    <div class="input-group has-validation mt-3 col-12 col-md-6 col-lg-6">
                        <span class="input-group-text text-center" id="spanLastName"><i class="bi bi-person"></i></span>
                        <div class="form-floating is-invalid">
                            <input type="text" class="form-control focus-ring focus-ring-success" id="lastName" placeholder="password" required>
                            <label for="lastName">Sobrenome</label>
                        </div>
                        <div class="invalid-feedback d-none" id="passwordIncorrect">
                            Sobrenome incorreto!
                        </div>
                    </div>

                    <div class="input-group has-validation mt-3 col-12 col-md-6 col-lg-6">
                        <span class="input-group-text text-center" id="spanEmail"><i class="bi bi-envelope"></i></span>
                        <div class="form-floating is-invalid">
                            <input type="text" class="form-control focus-ring focus-ring-success" id="emailRegister" placeholder="password" required>
                            <label for="emailRegister">E-mail</label>
                        </div>
                        <div class="invalid-feedback d-none" id="emailRegisterIncorrect">
                            E-mail incorreto!
                        </div>
                    </div>

                    <div class="input-group has-validation mt-3 col-12 col-md-6 col-lg-6">
                        <span class="input-group-text text-center" id="spanBirthData"><i class="bi bi-calendar4"></i></span>
                        <div class="form-floating is-invalid">
                            <input type="date" class="form-control focus-ring focus-ring-success" id="birthData" placeholder="password" required>
                            <label for="birthData">Data de Nascimento</label>
                        </div>
                        <div class="invalid-feedback d-none" id="birthDataIncorrect">
                            Data de Nascimento incorreto!
                        </div>
                    </div>

                    <div class="input-group has-validation mt-3 col-12">
                        <span class="input-group-text text-center" role="button" id="spanPasswordRegister"><i class="bi bi-eye"></i></span>
                        <div class="form-floating is-invalid">
                            <input type="password" class="form-control focus-ring focus-ring-success" id="passwordRegister" placeholder="password" required>
                            <label for="passwordRegister">Senha</label>
                        </div>
                        <div class="invalid-feedback d-none" id="passwordRegisterIncorrect">
                            Senha incorreto!
                        </div>
                    </div>

                </div>

                <div class="mt-3">
                    <button type="button" class="btn w-100 color-catira-white text-dark" onclick="">Registrar</button>
                </div>

            </form>

        </div>

    </div>
</section>

<?php require_once __DIR__ . "/../templates/footer.php" ?>