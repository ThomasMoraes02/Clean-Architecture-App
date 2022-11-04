<?php 
namespace CleanArchitectureApp\Academic\Infraestructure\Student;

use PDO;
use InvalidArgumentException;
use CleanArchitectureApp\Academic\Domain\Cpf;
use CleanArchitectureApp\Academic\Domain\Student\Student;
use CleanArchitectureApp\Academic\Domain\Student\StudentRepository;

class StudentRepositoryPdo implements StudentRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function addStudent(Student $student): void
    {
        $sql = "INSERT INTO students VALUES (:cpf, :name, :email)";
        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue('cpf', $student->getCpf());
        $stmt->bindValue('name', $student->getName());
        $stmt->bindValue('email', $student->getEmail());

        $stmt->execute();

        $sql = "INSERT INTO phones VALUES (:ddd, :number, :cpf_student)"; 
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('cpf_student', $student->getCpf());

        /** @var Phone $phone */
        foreach($student->phones() as $phone) {
            $stmt->bindValue('ddd', $phone->ddd());
            $stmt->bindValue('number', $phone->number());
            $stmt->execute();
        }
    }

    public function findByCpf(Cpf $cpf): Student
    {
        $sql = "SELECT cpf,name,email,ddd,number as number_phone FROM students
        LEFT JOIN phones ON phones.cpf_student = students.cpf
        WHERE students.cpf = ?";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, (string) $cpf);
        $stmt->execute();

        $studentData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($studentData) == 0) {
            throw new InvalidArgumentException("Student with cpf: $cpf not found");
        }

        return $this->mapStudent($studentData);
    }

    private function mapStudent(array $studentData): Student
    {
        $studentData = current($studentData);
        $student = Student::create($studentData['cpf'], $studentData['name'], $studentData['email']);

        $phones = array_filter($studentData, function($phone) {
            return $phone['ddd'] != null && $phone['number'] != null;
        });

        foreach($phones as $phone) {
            $student->addPhone($phone['ddd'], $phone['number']);
        }

        return $student;
    }

    public function findAllStudents(): array
    {
        $sql = "SELECT cpf,name,email,ddd,number as number_phone FROM students
        LEFT JOIN phones ON phones.cpf_student = students.cpf";

        $stmt = $this->connection->query($sql);

        $allStudents = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $students = [];

        foreach($allStudents as $studentData) {
            if(!array_key_exists($studentData['cpf'], $students)) {
                $students[$studentData['cpf']] = Student::create($studentData['cpf'], $studentData['name'], $studentData['email']);
            }

            $students[$studentData['cpf']]->addPhone($studentData['ddd'], $studentData['number']);
        }

        return array_values($students);
    }
}