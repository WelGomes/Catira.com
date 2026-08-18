<?php

namespace Src\Repository;

use PDO;
use Src\Model\User;

class UserRepository implements Repository
{
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function create(User $user): bool
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO users (
                name, 
                last_name, 
                cpf_cnpj, 
                email, 
                date_of_birth, 
                password, 
                status
            ) VALUES (
                :name, 
                :last_name, 
                :cpf_cnpj, 
                :email, 
                :date_of_birth, 
                :password, 
                :status
            )"
        );

        $stmt->bindValue(":name", $user->getName(), PDO::PARAM_STR);
        $stmt->bindValue(":last_name", $user->getLastName(), PDO::PARAM_STR);
        $stmt->bindValue(":cpf_cnpj", $user->getCpfCnpj(), PDO::PARAM_STR);
        $stmt->bindValue(":email", $user->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(":date_of_birth", $user->getDateOfBirth(), PDO::PARAM_STR);
        $stmt->bindValue(":password", $user->getPassword(), PDO::PARAM_STR);
        $stmt->bindValue(":status", $user->getStatus(), PDO::PARAM_BOOL);

        return $stmt->execute();
    }

}

?>