<?php 
namespace CleanArchitectureApp\Academic\Domain;

use DomainException;

class Email
{
    private $email;

    public function __construct(string $email)
    {
        $this->setEmail($email);
    }

    private function setEmail(string $email): void
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new DomainException("E-mail: $email invalid");
        }

        $this->email = $email;
    }

    public function __toString(): string
    {
        return $this->email;
    }
}