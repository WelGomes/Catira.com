<?php require_once __DIR__ . "/../templates/header.php" ?>

<section class="container-fluid p-0 w-100 vh-100">

    <div class="row g-0 p-0">

        <div class="col-md-8 col-lg-8 d-flex justify-content-center align-items-center vh-100 color-catira-black">
            <img class="img-fluid" style="max-width: 400px;" src="/images/catira.com_logo.png" alt="">
        </div>

        <div class="col-12 col-md-4 col-lg-4 d-flex flex-column justify-content-center align-items-center color-catira-white">

            <div>
                <h3>Login</h3>
            </div>

            <form action="">
                <div class="col-12 input-group flex-nowrap w-100 m-0 p-0">
                    <span class="input-group-text" id="E-mail">@</span>
                    <input type="text" class="form-control" placeholder="E-mail" aria-label="E-mail" aria-describedby="E-mail">
                </div>

                <div class="col-12 input-group flex-nowrap">
                    <span class="input-group-text" id="Password">@</span>
                    <input type="text" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="Password">
                </div>

                <div>
                    <button>
                        Login
                    </button>
                </div>
            </form>
        </div>

    </div>
</section>

<?php require_once __DIR__ . "/../templates/footer.php" ?>