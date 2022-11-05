<?php
namespace CleanArchitectureApp\Test\Shared\Domain;

use DomainException;
use PHPUnit\Framework\TestCase;
use CleanArchitectureApp\Shared\Domain\Cpf;

class CpfTest extends TestCase
{
    public function test_cpf_valid()
    {
        $cpf = new Cpf("123.456.789.09");
        $this->assertEquals($cpf, "12345678909");
    }

    public function test_cpf_invalid()
    {
        $this->expectException(DomainException::class);
        new Cpf("123.456.789.10");
    }
}