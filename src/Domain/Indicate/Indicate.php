<?php 
namespace CleanArchitectureApp\Domain\Indicate;

use DateTimeImmutable;
use CleanArchitectureApp\Domain\Student\Student;

class Indicate
{
    private $indicator;
    private $indicated;
    private $date;

    public function __construct(Student $indicator, Student $indicated)
    {
        $this->indicator = $indicator;
        $this->indicated = $indicated;

        $this->date = new DateTimeImmutable();
    }
}