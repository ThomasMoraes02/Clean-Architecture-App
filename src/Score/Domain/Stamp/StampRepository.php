<?php 
namespace CleanArchitectureApp\Score\Domain\Stamp;

use CleanArchitectureApp\Academic\Domain\Cpf;
use CleanArchitectureApp\Score\Domain\Stamp\Stamp;


interface StampRepository
{
    public function addStamp(Stamp $stamp): void;

    public function stampsStudentWithCpf(Cpf $cpf);
}