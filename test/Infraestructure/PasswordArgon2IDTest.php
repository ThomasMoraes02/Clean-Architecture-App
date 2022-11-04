<?php 
namespace CleanArchitectureApp\Test\Infraestructure;

use PHPUnit\Framework\TestCase;
use CleanArchitectureApp\Academic\Infraestructure\Student\EncoderArgonII;

class PasswordArgon2IDTest extends TestCase
{
    public function test_valid_password()
    {
        $password = new EncoderArgonII;
        $passwordHash = $password->encoder("123456");

        $this->assertTrue($password->verify("123456", $passwordHash));
    }

    public function test_invalid_password()
    {
        $password = new EncoderArgonII;
        $passwordHash = $password->encoder("123456");

        $this->assertFalse($password->verify("123", $passwordHash));
    }
}