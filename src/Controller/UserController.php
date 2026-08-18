<?php

namespace Src\Controller;

use Exception;
use PDO;
use Src\Service\Service;
use Src\Service\UserService;

class UserController extends Controller
{

    private UserService $userService;

    public function __construct(PDO $pdo)
    {
        parent::__construct();
        $this->userService = new UserService(pdo: $pdo);
    }

    public function create(): void
    {
        try {
            $data = json_decode($this->getBodyJson(), true);

            $name      = isset($data["firstName"])       && !empty($data["firstName"])         ? htmlspecialchars($data["firstName"], ENT_QUOTES)          : throw new Exception("Error ao cadastrar");
            $lastName  = isset($data["lastName"])        && !empty($data["lastName"])          ? htmlspecialchars($data["lastName"], ENT_QUOTES)           : throw new Exception("Error ao cadastrar");
            $cpfCnpj   = isset($data["cpfCnpjRegister"]) && !empty($data["cpfCnpjRegister"])   ? htmlspecialchars($data["cpfCnpjRegister"], ENT_QUOTES)    : throw new Exception("Error ao cadastrar");
            $email     = isset($data["emailRegister"])   && !empty($data["emailRegister"])     ? filter_var($data["emailRegister"], FILTER_SANITIZE_EMAIL) : throw new Exception("Error ao cadastrar");
            $birthData = isset($data["birthData"])       && !empty($data["birthData"])         ? htmlspecialchars($data["birthData"], ENT_QUOTES)          : throw new Exception("Error ao cadastrar");
            $password  = isset($data["password"])        && !empty($data["password"])          ? $data["password"]                                         : throw new Exception("Error ao cadastrar");

            $this->userService->create(
                name: $name,
                lastName: $lastName,
                cpfCnpj: $cpfCnpj,
                email: $email,
                birthData: $birthData,
                password: $password
            );

            echo json_encode(
                [
                    "message" => "Conta criada com sucesso",
                    "status" => 200
                ]
            );
        } catch (Exception $ex) {
            echo json_encode(
                [
                    "message" => $ex->getMessage(),
                    "status"  => 404
                ]
            );
        }
    }
}
