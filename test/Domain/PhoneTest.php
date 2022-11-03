<?php 
namespace CleanArchitectureApp\Test\Domain;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use CleanArchitectureApp\Domain\Student\Phone;

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
}