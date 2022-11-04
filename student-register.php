<?php

use CleanArchitectureApp\Domain\Cpf;
use CleanArchitectureApp\Domain\Student\Student;
use CleanArchitectureApp\Infraestructure\Student\StudentRepositoryMemory;

require_once("vendor/autoload.php");

$cpf = $argv[1];
$name = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$number = $argv[5];

$student = Student::create($cpf, $name, $email)->addPhone($ddd, $number);

$studentRepository = new StudentRepositoryMemory;
$studentRepository->addStudent($student);

$findStudent = $studentRepository->findByCpf(new Cpf($cpf));
print_r($findStudent->getName());


// command line
// php student-register.php "123.456.789-09" "Thomas Moraes" "thomas@gmail.com" "11" "999999999"