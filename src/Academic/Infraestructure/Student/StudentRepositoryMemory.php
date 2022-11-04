<?php 
namespace CleanArchitectureApp\Academic\Infraestructure\Student;

use DomainException;
use CleanArchitectureApp\Academic\Domain\Cpf;
use CleanArchitectureApp\Academic\Domain\Student\Student;
use CleanArchitectureApp\Academic\Domain\Student\StudentRepository;

class StudentRepositoryMemory implements StudentRepository
{
    private $students = [];

    public function addStudent(Student $student): void
    {
        $this->students[] = $student;
    }

    public function findByCpf(Cpf $cpf): Student
    {
        $student = array_filter($this->students, function(Student $student) use ($cpf) {
            if($student->getCpf() == $cpf) {
                return $student;
            }
        });

        if(empty($student)) {
            throw new DomainException("Student not found with CPF: $cpf");
        }

        return current($student);
    }

    public function findAllStudents(): array
    {
        return $this->students;
    }
}