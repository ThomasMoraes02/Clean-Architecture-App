<?php 
namespace CleanArchitectureApp\Test\Academic\Application\Student;

use PHPUnit\Framework\TestCase;
use CleanArchitectureApp\Academic\Domain\Cpf;
use CleanArchitectureApp\Academic\Domain\PublishEvent;
use CleanArchitectureApp\Academic\Domain\Student\LogStudentRegister;
use CleanArchitectureApp\Academic\Infraestructure\Student\StudentRepositoryMemory;
use CleanArchitectureApp\Academic\Application\Student\StudentRegister\StudentRegister;
use CleanArchitectureApp\Academic\Application\Student\StudentRegister\StudentRegisterDto;
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