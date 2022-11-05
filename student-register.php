<?php

use CleanArchitectureApp\Shared\Domain\Cpf;
use CleanArchitectureApp\Academic\Domain\Student\Student;
use CleanArchitectureApp\Shared\Domain\Event\PublishEvent;
use CleanArchitectureApp\Score\Application\GenerateStampNewStudent;
use CleanArchitectureApp\Academic\Domain\Student\LogStudentRegister;
use CleanArchitectureApp\Score\Infraestructure\Stamp\StampRepositoryMemory;
use CleanArchitectureApp\Academic\Infraestructure\Student\StudentRepositoryMemory;
use CleanArchitectureApp\Academic\Application\Student\StudentRegister\StudentRegister;
use CleanArchitectureApp\Academic\Application\Student\StudentRegister\StudentRegisterDto;

require_once("vendor/autoload.php");

$cpf = $argv[1];
$name = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$number = $argv[5];

$publisher = new PublishEvent;
$publisher->addListener(new LogStudentRegister);
$publisher->addListener(new GenerateStampNewStudent(new StampRepositoryMemory));

$useCase = new StudentRegister(new StudentRepositoryMemory, $publisher);
$useCase->execute(new StudentRegisterDto($cpf, $name, $email));

// 1
// $student = Student::create($cpf, $name, $email)->addPhone($ddd, $number);

// $studentRepository = new StudentRepositoryMemory;
// $studentRepository->addStudent($student);

// $findStudent = $studentRepository->findByCpf(new Cpf($cpf));
// print_r($findStudent->getName());


// command line
// php student-register.php "123.456.789-09" "Thomas Moraes" "thomas@gmail.com" "11" "999999999"