<?php

namespace Src\Controller;

use PDO;

class LoginController extends Controller
{
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;        
    }

    public function show(): void
    {
        require_once __DIR__ . "/../Views/login/index.php";
    }

}

?>