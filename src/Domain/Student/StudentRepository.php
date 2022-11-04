<?php 
namespace CleanArchitectureApp\Domain\Student;

use CleanArchitectureApp\Domain\Cpf;
use CleanArchitectureApp\Domain\Student\Student;

interface StudentRepository
{
    public function addStudent(Student $student): void;

    public function findByCpf(Cpf $cpf): Student;

    public function findAllStudents(): array;
}