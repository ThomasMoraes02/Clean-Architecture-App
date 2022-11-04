<?php 
namespace CleanArchitectureApp\Test\Application\Student;

use CleanArchitectureApp\Application\Student\StudentRegister\StudentRegister;
use CleanArchitectureApp\Application\Student\StudentRegister\StudentRegisterDto;
use CleanArchitectureApp\Domain\Cpf;
use CleanArchitectureApp\Domain\PublishEvent;
use CleanArchitectureApp\Domain\Student\LogStudentRegister;
use CleanArchitectureApp\Infraestructure\Student\StudentRepositoryMemory;
use PHPUnit\Framework\TestCase;

class StudentRegisterTest extends TestCase
{
    public function test_student_add_in_repository()
    {
        $studentRegister = new StudentRegisterDto("123.456.789-09", "Thomas", "thomas@gmail.com");

        $studentRepository = new StudentRepositoryMemory;

        $publisher = new PublishEvent;
        $publisher->addListener(new LogStudentRegister);

        $useCase = new StudentRegister($studentRepository, $publisher);
        $useCase->execute($studentRegister);

        $student = $studentRepository->findByCpf(new Cpf("123.456.789-09"));
        $this->assertEquals("Thomas", $student->getName());
        $this->assertEmpty($student->phones());
    }
}