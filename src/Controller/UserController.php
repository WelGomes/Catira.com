<?php

namespace Src\Controller;

use Exception;

class UserController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function create(): void
    {
        try {
            $data = json_decode($this->getPath(), true);

            $name      = !isset($data["firstName"])       || !empty($data["firstName"])         ? htmlspecialchars($data["firstName"], ENT_QUOTES)          : throw new Exception("Error ao cadastrar");
            $lastName  = !isset($data["lastName"])        || !empty($data["lastName"])          ? htmlspecialchars($data["lastName"], ENT_QUOTES)           : throw new Exception("Error ao cadastrar");
            $cpfCnpj   = !isset($data["cpfCnpjRegister"]) || !empty($data["cpfCnpjRegister"])   ? htmlspecialchars($data["cpfCnpjRegister"], ENT_QUOTES)    : throw new Exception("Error ao cadastrar");
            $email     = !isset($data["emailRegister"])   || !empty($data["emailRegister"])     ? filter_var($data["emailRegister"], FILTER_SANITIZE_EMAIL) : throw new Exception("Error ao cadastrar");
            $birthData = !isset($data["birthData"])       || !empty($data["birthData"])         ? htmlspecialchars($data["birthData"], ENT_QUOTES)          : throw new Exception("Error ao cadastrar");
            $password  = !isset($data["password"])        || !empty($data["password"])          ? $data["password"]                                         : throw new Exception("Error ao cadastrar");

            echo json_encode(
                [
                    "message" => [
                        $name, 
                        $lastName,
                        $cpfCnpj,
                        $email,
                        $birthData,
                        $password
                    ],
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
