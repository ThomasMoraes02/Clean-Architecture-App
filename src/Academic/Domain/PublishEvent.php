<?php 
namespace CleanArchitectureApp\Academic\Domain;

use CleanArchitectureApp\Academic\Domain\Event;
use CleanArchitectureApp\Academic\Domain\EventListener;

class PublishEvent
{
    private $listeners = [];

    public function addListener(EventListener $listener): void
    {
        $this->listeners[] = $listener;
    }

    
    public function publish(Event $event)
    {
        /**
         * @var EventListener $listener
         */
        foreach($this->listeners as $listener) {
            $listener->process($event);
        }
    }
}