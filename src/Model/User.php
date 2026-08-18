<?php

namespace Src\Model;

use DateTime;

class User
{
    private ?int      $id;
    private string    $name;
    private string    $lastName;
    private string    $cpfCnpj;
    private string    $email;
    private string  $dateOfBirth;
    private string    $password;
    private ?DateTime $dateCreated;
    private ?DateTime $dateModified;
    private bool      $status;

    public function __construct(
        string    $name,
        string    $lastName,
        string    $cpfCnpj,
        string    $email,
        string    $dateOfBirth,
        string    $password,
        bool      $status,
        ?int      $id           = null,
        ?DateTime $dateCreated  = null,
        ?DateTime $dateModified = null
    ) {
        $this->id           = $id;
        $this->name         = $name;
        $this->lastName     = $lastName;
        $this->cpfCnpj      = $cpfCnpj;
        $this->email        = $email;
        $this->dateOfBirth  = $dateOfBirth;
        $this->password     = $password;
        $this->dateCreated  = $dateCreated;
        $this->dateModified = $dateModified;
        $this->status       = $status;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function getName(): string
    {
        return $this->name;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }
    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setCpfCnpj(string $cpfCnpj): void
    {
        $this->cpfCnpj = $cpfCnpj;
    }
    public function getCpfCnpj(): string
    {
        return $this->cpfCnpj;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function getEmail(): string
    {
        return $this->email;
    }

    public function setDateOfBirth(string $dateOfBirth): void
    {
        $this->dateOfBirth = $dateOfBirth;
    }
    public function getDateOfBirth(): string
    {
        return $this->dateOfBirth;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
    public function getPassword():string
    {
        return $this->password;
    }

    public function setDateCreated(DateTime $dateCreated): void
    {
        $this->dateCreated = $dateCreated;
    }
    public function getDateCreated(): ?DateTime
    {
        return $this->dateCreated;
    }

    public function setDateModified(DateTime $dateModified): void
    {
        $this->dateModified = $dateModified;
    }
    public function getDateModified(): ?DateTime
    {
        return $this->dateModified;
    }

    public function setStatus(bool $status): void
    {
        $this->status = $status;
    }
    public function getStatus(): bool
    {
        return $this->status;
    }
}
