<?php
namespace Src\Service;

use DateTime;
use Exception;
use PDO;
use Src\Model\User;
use Src\Repository\Repository;
use Src\Repository\UserRepository;

class UserService
{
    private Repository $userRepository;

    public function __construct(PDO $pdo)
    {
        $this->userRepository = new UserRepository(pdo: $pdo);
    }

    public function create(
        string   $name,
        string   $lastName,
        string   $cpfCnpj,
        string   $email,
        string   $birthData,
        string   $password
    ): void
    {
        $user = $this->instanceUser(
            name:      $name,
            lastName:  $lastName,
            cpfCnpj:   $cpfCnpj,
            email:     $email,
            birthData: $birthData,
            password:  $password,
            status:    true
        );

        $returnCreateUser = $this->userRepository->create(user: $user);

        if(!$returnCreateUser) {
            throw new Exception("Erro para cadastrar Usuário");
        }
    }

    private function instanceUser(
        string   $name,
        string   $lastName,
        string   $cpfCnpj,
        string   $email,
        string   $birthData,
        string   $password,
        bool     $status
    ): User
    {
        return new User(
            name       : $name,
            lastName   : $lastName,
            cpfCnpj    : $cpfCnpj,
            email      : $email,
            dateOfBirth: $birthData,
            password   : $password,
            status     : $status
        );
    }

}

?>