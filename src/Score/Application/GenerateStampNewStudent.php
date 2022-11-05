<?php 
namespace CleanArchitectureApp\Score\Application;

use CleanArchitectureApp\Shared\Domain\Cpf;
use CleanArchitectureApp\Score\Domain\Stamp\Stamp;
use CleanArchitectureApp\Shared\Domain\Event\Event;
use CleanArchitectureApp\Shared\Domain\Event\EventListener;
use CleanArchitectureApp\Score\Domain\Stamp\StampRepository;

class GenerateStampNewStudent extends EventListener
{
    private $stampRepository;

    public function __construct(StampRepository $stampRepository)
    {
        $this->stampRepository = $stampRepository;
    }

    public function processTrue(Event $event): bool
    {
        return get_class($event) === 'CleanArchitectureApp\Academic\Domain\Student\StudentRegistered'; 
    }

    public function reactAt(Event $event): void
    {
        $array = $event->jsonSerialize();
        $cpf = $array['studentCpf'];

        $stamp = new Stamp(new Cpf($cpf), 'New Student');
        $this->stampRepository->addStamp($stamp);
    }
}