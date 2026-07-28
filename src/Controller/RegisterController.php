<?php

namespace Src\Controller;

class RegisterController extends Controller
{

    public function index(): void
    {
        require_once __DIR__ . "/../Views/register/index.php";
    }

}

?>