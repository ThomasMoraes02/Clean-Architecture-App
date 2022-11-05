<?php
namespace CleanArchitectureApp\Shared\Domain\Event;

use DateTimeImmutable;

interface Event
{
    public function event(): DateTimeImmutable;
}