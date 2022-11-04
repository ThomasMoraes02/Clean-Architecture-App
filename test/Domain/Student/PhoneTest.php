<?php 
namespace CleanArchitectureApp\Test\Domain\Student;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use CleanArchitectureApp\Domain\Student\Phone;
use CleanArchitectureApp\Domain\Student\Student;
use DomainException;

class PhoneTest extends TestCase
{
    public function test_phone_valid()
    {
        $phone = new Phone("11", "975693698");
        $this->assertEquals($phone, "(11) 975693698");
    }

    public function test_phone_invalid()
    {
        $this->expectException(InvalidArgumentException::class);
        new Phone("11", "97569-3698456");
    }

    public function test_only_two_phones()
    {
        $this->expectException(DomainException::class);
        $student = Student::create("123.456.789-09", "Thomas", "thomas@gmail.com");
        $student->addPhone("11", "99999999")->addPhone("11", "99999999")->addPhone("11", "999999999");
    }
}