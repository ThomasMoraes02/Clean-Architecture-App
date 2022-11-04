<?php 
namespace CleanArchitectureApp\Academic\Domain\Student;

use CleanArchitectureApp\Academic\Domain\Cpf;
use CleanArchitectureApp\Academic\Domain\Student\Student;


interface StudentRepository
{
    public function addStudent(Student $student): void;

    public function findByCpf(Cpf $cpf): Student;

    public function findAllStudents(): array;
}