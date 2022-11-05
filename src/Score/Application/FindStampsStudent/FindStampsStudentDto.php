<?php 
namespace CleanArchitectureApp\Score\Application\FindStampsStudent;

class FindStampsStudentDto
{
    public $cpf;

    public function __construct(string $cpf)
    {
        $this->cpf = $cpf;
    }
}