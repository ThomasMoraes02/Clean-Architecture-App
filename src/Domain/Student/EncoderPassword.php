<?php 
namespace CleanArchitectureApp\Domain\Student;

interface EncoderPassword
{
    public function encoder(string $password): string;

    public function verify(string $passwordText, string $encoderPassword): bool;
}