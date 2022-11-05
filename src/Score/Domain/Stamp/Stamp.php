<?php 
namespace CleanArchitectureApp\Score\Domain\Stamp;

use CleanArchitectureApp\Shared\Domain\Cpf;

class Stamp
{
    private $studentCpf;

    private $name;

    public function __construct(Cpf $studentCpf, string $name)
    {
        $this->studentCpf = $studentCpf;
        $this->name = $name;
    }

    public function getStudentCpf()
    {
        return $this->studentCpf;
    }

    public function getName()
    {
        return $this->name;
    }
}