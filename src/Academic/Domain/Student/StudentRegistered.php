<?php 
namespace CleanArchitectureApp\Academic\Domain\Student;

use DateTimeImmutable;
use CleanArchitectureApp\Academic\Domain\Cpf;
use CleanArchitectureApp\Academic\Domain\Event;

class StudentRegistered implements Event
{
    private $event;
    private $studentCpf;

    public function __construct(Cpf $studentCpf)
    {
        $this->studentCpf = $studentCpf;
        $this->event = new DateTimeImmutable();
    }

    public function studentCpf(): Cpf
    {
        return $this->studentCpf;
    }

    public function event(): DateTimeImmutable
    {
        return $this->event;
    }
}