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
        $stmt->bindValue(":password", password_hash($user->getPassword(), PASSWORD_ARGON2ID));
        $stmt->bindValue(":status", $user->getStatus(), PDO::PARAM_BOOL);

        return $stmt->execute();
    }

    public function show(User $user): array|false
    {
        $stmt = $this->pdo->prepare(
            "SELECT 
                id,
                name,
                last_name,
                cpf_cnpj,
                email,
                date_of_birth,
                status
            FROM users
            WHERE cpf_cnpj = :cpf_cnpj
            AND email = :email"
        );

        $stmt->bindValue(":cpf_cnpj", $user->getCpfCnpj(), PDO::PARAM_STR);
        $stmt->bindValue(":email", $user->getEmail(), PDO::PARAM_STR);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}

?>