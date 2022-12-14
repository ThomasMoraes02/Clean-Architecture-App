<?php 
namespace CleanArchitectureApp\Shared\Domain\Event;

use CleanArchitectureApp\Shared\Domain\Event\Event;

abstract class EventListener
{
    public function process(Event $event): void
    {
        if($this->processTrue($event)) {
            $this->reactAt($event);
        }
    }

    abstract public function processTrue(Event $event): bool;

    abstract public function reactAt(Event $event): void;
}