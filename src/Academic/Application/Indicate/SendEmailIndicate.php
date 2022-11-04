<?php 
namespace CleanArchitectureApp\Academic\Application\Indicate;

use CleanArchitectureApp\Academic\Domain\Student\Student;

interface SendEmailIndicate
{
    public function send(Student $studentIndicate): void;
}