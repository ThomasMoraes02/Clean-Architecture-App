<?php 
namespace CleanArchitectureApp\Academic\Infraestructure\Student;

use CleanArchitectureApp\Academic\Domain\Student\EncoderPassword;

class EncoderArgonII implements EncoderPassword
{
    public function encoder(string $password): string
    {
        return password_hash($password, PASSWORD_ARGON2I);
    }

    public function verify(string $passwordText, string $encoderPassword): bool
    {
        return password_verify($passwordText, $encoderPassword);
    }
}