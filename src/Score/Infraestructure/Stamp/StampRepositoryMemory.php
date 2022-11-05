<?php 
namespace CleanArchitectureApp\Score\Infraestructure\Stamp;

use CleanArchitectureApp\Shared\Domain\Cpf;
use CleanArchitectureApp\Score\Domain\Stamp\Stamp;
use CleanArchitectureApp\Score\Domain\Stamp\StampRepository;

class StampRepositoryMemory implements StampRepository
{
    private $stamps = [];

    public function addStamp(Stamp $stamp): void
    {
        $this->stamps[] = $stamp;
    }

    public function stampsStudentWithCpf(Cpf $cpf)
    {
        return array_filter($this->stamps, function(Stamp $stamp) use ($cpf) {
            return $stamp->getStudentCpf() == $cpf;
        });
    }
}