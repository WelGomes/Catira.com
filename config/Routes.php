<?php

namespace Config;

use Exception;

class Routes
{

    public function callRoutes(string $request, string $uri): void
    {
        $routes = [
            "GET" => [
                "/" => fn() => $this->callController(method: "show", class: "LoginController"),
            ],
            "POST" => [
                "/user/register" => fn() => $this->callController(method: "create", class: "UserController"),
                "/login"         => fn() => $this->callController(method: "show", class: "LoginController"),
            ]
        ];

        if (!array_key_exists($uri, $routes[$request])) {
            throw new Exception("URI inválida");
        }

        $routes[$request][$uri]();
    }

    private function callController(string $method, string $class): void
    {
        $newClass = __DIR__ . "/../src/Controller/{$class}.php";

        if (!is_file($newClass)) {
            throw new Exception("Arquivo inexistente");
        }

        $newClass = "Src\\Controller\\{$class}";

        $class = new $newClass(pdo: ConnectDB::connectPDO());

        if (!method_exists($class, $method)) {
            throw new Exception("Metódo inexistente");
        }

        $class->$method();
    }
}
