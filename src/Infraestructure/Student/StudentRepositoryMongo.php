<?php 
namespace CleanArchitectureApp\Infraestructure\Student;

use CleanArchitectureApp\Domain\Cpf;
use CleanArchitectureApp\Domain\Student\Student;
use MongoDB\Client;
use CleanArchitectureApp\Domain\Student\StudentRepository;

class StudentRepositoryMongo implements StudentRepository
{
    private $client;

    private $collection = "students";

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function addStudent(Student $student): void
    {
        
    }

    public function findByCpf(Cpf $cpf): Student
    {
        
    }

    public function findAllStudents(): array
    {
        
    }
}