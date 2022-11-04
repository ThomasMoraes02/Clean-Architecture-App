<?php 
namespace CleanArchitectureApp\Application\Student\StudentRegister;

use CleanArchitectureApp\Domain\Student\StudentRepository;
use CleanArchitectureApp\Application\Student\StudentRegister\StudentRegisterDto;
use CleanArchitectureApp\Domain\Cpf;
use CleanArchitectureApp\Domain\PublishEvent;
use CleanArchitectureApp\Domain\Student\LogStudentRegister;
use CleanArchitectureApp\Domain\Student\Student;
use CleanArchitectureApp\Domain\Student\StudentRegistered;

class StudentRegister
{
    private $studentRepository;
    private $eventListener;

    public function __construct(StudentRepository $studentRepository, PublishEvent $eventListener)
    {
        $this->studentRepository = $studentRepository;
        $this->eventListener = $eventListener;
    }

    public function execute(StudentRegisterDto $data)
    {
        $student = Student::create($data->cpf, $data->name, $data->email);
        $this->studentRepository->addStudent($student);

        $this->eventListener->publish(new StudentRegistered(new Cpf($data->cpf)));
    }
}