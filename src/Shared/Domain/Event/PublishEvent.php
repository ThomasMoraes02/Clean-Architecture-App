<?php 
namespace CleanArchitectureApp\Shared\Domain\Event;

use CleanArchitectureApp\Shared\Domain\Event\Event;
use CleanArchitectureApp\Shared\Domain\Event\EventListener;

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