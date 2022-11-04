<?php
namespace CleanArchitectureApp\Domain;

use DateTimeImmutable;

interface Event
{
    public function event(): DateTimeImmutable;
}