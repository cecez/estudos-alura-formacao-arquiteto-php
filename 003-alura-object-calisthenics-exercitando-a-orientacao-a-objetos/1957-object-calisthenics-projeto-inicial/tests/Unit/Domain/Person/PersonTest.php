<?php

namespace Alura\Calisthenics\Tests\Unit\Domain\Person;

use Alura\Calisthenics\Domain\Email\Email;
use Alura\Calisthenics\Domain\Person\Address;
use Alura\Calisthenics\Domain\Person\FullName;
use Alura\Calisthenics\Domain\Person\Person;
use Alura\Calisthenics\Domain\Person\PersonalData;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    private Person $person;

    protected function setUp(): void
    {
        $personalData = new PersonalData(
            new Address('Rua de Exemplo', '71B', 'Minha Cidade', 'Meu Bairro', 'Meu estado', 'Brasil'),
            new \DateTimeImmutable('1997-10-15'),
            new Email('email@example.com'),
            new FullName('Cezar', 'Rosa')
        );

        $this->person = new Person($personalData);
    }

    public function testValidaAddress()
    {
        self::assertEquals('Rua de Exemplo, 71B (Meu Bairro) Minha Cidade/Meu estado - Brasil', $this->person->address());
    }

    public function testValidAge()
    {
        $now = new \DateTimeImmutable();
        $birthDate = $this->person->birthDate();
        $differenceBetweenDates = $birthDate->diff($now);
        $years = $differenceBetweenDates->y;

        self::assertEquals($years, $this->person->age());
    }

    public function testValidBirthDate()
    {
        self::assertEquals(new \DateTimeImmutable('1997-10-15'), $this->person->birthDate());
    }

    public function testValidEmail()
    {
        self::assertEquals('email@example.com', $this->person->email());
    }

    public function testValidFullName()
    {
        self::assertEquals('Cezar Rosa', $this->person->fullName());
    }

    public function testInvalidPerson()
    {
        self::expectErrorMessageMatches('/Too few arguments/');

        new Person();
    }
}