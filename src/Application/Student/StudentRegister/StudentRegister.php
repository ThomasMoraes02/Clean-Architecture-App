<?php 
namespace CleanArchitectureApp\Application\Student\StudentRegister;

use CleanArchitectureApp\Domain\Student\StudentRepository;
use CleanArchitectureApp\Application\Student\StudentRegister\StudentRegisterDto;
use CleanArchitectureApp\Domain\Student\Student;

class StudentRegister
{
    private $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function execute(StudentRegisterDto $data)
    {
        $student = Student::create($data->cpf, $data->name, $data->email);
        $this->studentRepository->addStudent($student);
    }
}