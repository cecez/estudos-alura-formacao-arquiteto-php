<?php

namespace Alura\Calisthenics\Tests\Unit\Domain\Person;

use Alura\Calisthenics\Domain\Person\Address;
use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
{
    public function testValidAddress()
    {
        $address = new Address('Rua de Exemplo', '71B', 'Minha Cidade', 'Meu Bairro', 'Meu estado', 'Brasil');

        self::assertEquals('Rua de Exemplo, 71B (Meu Bairro) Minha Cidade/Meu estado - Brasil', $address);
    }

    public function testInvalidAddress()
    {
        self::expectErrorMessageMatches('/Too few arguments/');

        new Address('Rua', '1', 'Cidade', 'Província', 'Estado');
    }

}