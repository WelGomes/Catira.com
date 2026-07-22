<?php

namespace Src\Controller;

class UserController
{

    public function index(): void
    {
        require_once __DIR__ . "../../../public/views/user/index.php";
    }


}

?>