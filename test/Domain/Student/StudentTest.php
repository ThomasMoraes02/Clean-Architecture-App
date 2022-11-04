<?php 
namespace CleanArchitectureApp\Test\Domain\Student;

use PHPUnit\Framework\TestCase;
use CleanArchitectureApp\Academic\Domain\Student\Student;

class StudentTest extends TestCase
{
    public function test_create_student()
    {
        $student = Student::create("123.456.789-09", "Thomas Moraes", "thomas@gmail.com");

        $this->assertEquals($student->getName(), "Thomas Moraes");
        $this->assertEquals($student->getCpf(), "12345678909");
        $this->assertEquals($student->getEmail(), "thomas@gmail.com");
    }
}