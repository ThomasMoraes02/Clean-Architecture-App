<?php 
namespace CleanArchitectureApp\Score\Application\FindStampsStudent;

use CleanArchitectureApp\Score\Domain\Stamp\StampRepository;
use CleanArchitectureApp\Score\Application\FindStampsStudent\FindStampsStudentDto;
use CleanArchitectureApp\Shared\Domain\Cpf;

class FindStampsStudent
{
    private $stampRepository;

    public function __construct(StampRepository $stampRepository)
    {
        $this->stampRepository = $stampRepository;
    }

    public function execute(FindStampsStudentDto $data)
    {
        $cpfStudent = new Cpf($data->cpf);
        return $this->stampRepository->stampsStudentWithCpf($cpfStudent);
    }
}