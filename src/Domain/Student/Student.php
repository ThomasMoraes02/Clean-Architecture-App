<?php 
namespace CleanArchitectureApp\Domain\Student;

use CleanArchitectureApp\Domain\Cpf;
use CleanArchitectureApp\Domain\Email;
use CleanArchitectureApp\Domain\Student\Phone;

class Student
{
    private $cpf;
    private $name;
    private $email;
    private $phones = [];

    public function __construct(Cpf $cpf, string $name, Email $email)
    {
        $this->cpf = $cpf;
        $this->name = $name;
        $this->email = $email;
    }

    public static function create(string $cpf, string $name, string $email): self
    {
        return new Student(new Cpf($cpf), $name, new Email($email));
    }

    public function addPhone(string $ddd, string $number): self
    {
        $this->phones[] = new Phone($ddd, $number);
        return $this;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function phones(): array
    {
        return $this->phones;
    }
}