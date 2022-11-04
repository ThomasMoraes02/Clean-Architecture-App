<?php 
namespace CleanArchitectureApp\Infraestructure\Student;

use CleanArchitectureApp\Domain\Student\EncoderPassword;

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