<?php

namespace Src\Controller;

class LoginController extends Controller
{

    public function show(): void
    {
        require_once __DIR__ . "/../Views/login/index.php";
    }

}

?>