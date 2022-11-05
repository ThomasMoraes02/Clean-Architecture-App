<?php 
namespace CleanArchitectureApp\Academic\Application\Student\StudentRegister;

use CleanArchitectureApp\Shared\Domain\Cpf;
use CleanArchitectureApp\Academic\Domain\Student\Student;
use CleanArchitectureApp\Shared\Domain\Event\PublishEvent;
use CleanArchitectureApp\Academic\Domain\Student\StudentRegistered;
use CleanArchitectureApp\Academic\Domain\Student\StudentRepository;
use CleanArchitectureApp\Academic\Application\Student\StudentRegister\StudentRegisterDto;

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