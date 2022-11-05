<?php
namespace CleanArchitectureApp\Shared\Domain\Event;

use DateTimeImmutable;
use JsonSerializable;

interface Event extends JsonSerializable
{
    public function event(): DateTimeImmutable;
}