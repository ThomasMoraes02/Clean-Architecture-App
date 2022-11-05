<?php 
namespace CleanArchitectureApp\Academic\Domain\Student;

use CleanArchitectureApp\Shared\Domain\Event\Event;
use CleanArchitectureApp\Shared\Domain\Event\EventListener;
use CleanArchitectureApp\Academic\Domain\Student\StudentRegistered;

class LogStudentRegister extends EventListener
{
    public function processTrue(Event $event): bool
    {
        return $event instanceof StudentRegistered;
    }

    /**
     * @param StudentRegistered $studentRegister
     * @return void
     */
    public function reactAt(Event $studentRegister): void
    {
        fprintf(STDERR, "Student with CPF %s was registered on date: %s", 
            (string) $studentRegister->studentCpf(), 
            (string) $studentRegister->event()->format('d/m/Y'));
    }
}