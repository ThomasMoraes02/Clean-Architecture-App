<?php 
namespace CleanArchitectureApp\Academic\Infraestructure\Student;

use MongoDB\Client;
use MongoDB\Operation\FindOneAndUpdate;
use CleanArchitectureApp\Academic\Domain\Cpf;
use CleanArchitectureApp\Academic\Domain\Student\Student;
use CleanArchitectureApp\Academic\Domain\Student\StudentRepository;

class StudentRepositoryMongo implements StudentRepository
{
    /**
     * @var MongoDB\Client
     */
    private $client;

    private $collection = "students";

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->collection = $this->client->selectCollection(DB_DATABASE, $this->collection);
    }

    public function addStudent(Student $student): void
    {
        $id = $this->nextId();

        $document = [
            '_id' => $id,
            'name' => $student->getName(),
            'email' => (string) $student->getEmail(),
            'cpf' => (string) $student->getCpf(),
            'phones' => $student->phones()
        ];

        $this->client->insertOne($document);
    }

    public function findByCpf(Cpf $cpf): Student
    {
        $find = $this->client->find(['cpf' => (string) $cpf]);
        return Student::create($find['cpf'], $find['name'], $find['email']);
    }

    public function findAllStudents(): array
    {
        return $this->client->find();
    }

    private function nextId()
    {
        $collection = $this->client->selectCollection("counters");

        $result = $collection->findOneAndUpdate(
            ['_id' => 'student_id'],
            ['$inc' => ['seq' => 1]],
            ['upsert' => true, 'projection' => [ 'seq' => 1 ],'returnDocument' => FindOneAndUpdate::RETURN_DOCUMENT_AFTER]
        );

        return $result['seq'];
    }
}