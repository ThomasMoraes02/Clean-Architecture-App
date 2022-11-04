<?php
namespace CleanArchitectureApp\Academic\Domain;

use DateTimeImmutable;

interface Event
{
    public function event(): DateTimeImmutable;
}