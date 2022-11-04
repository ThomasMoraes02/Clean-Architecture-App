<?php 
namespace CleanArchitectureApp\Application\Indicate;

use CleanArchitectureApp\Domain\Student\Student;

interface SendEmailIndicate
{
    public function send(Student $studentIndicate): void;
}