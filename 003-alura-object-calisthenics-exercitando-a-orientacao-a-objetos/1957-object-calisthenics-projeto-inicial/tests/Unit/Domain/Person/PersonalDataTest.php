<?php

namespace Alura\Calisthenics\Tests\Unit\Domain\Person;

use Alura\Calisthenics\Domain\Email\Email;
use Alura\Calisthenics\Domain\Person\Address;
use Alura\Calisthenics\Domain\Person\FullName;
use Alura\Calisthenics\Domain\Person\PersonalData;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class PersonalDataTest extends TestCase
{
    private PersonalData $personalData;

    protected function setUp(): void
    {
        $this->personalData = new PersonalData(
            new Address('Rua de Exemplo', '71B', 'Minha Cidade', 'Meu Bairro', 'Meu estado', 'Brasil'),
            new DateTimeImmutable('1997-10-15'),
            new Email('email@example.com'),
            new FullName('Cezar', 'Rosa')
        );
    }

    public function testValidaAddress()
    {
        self::assertEquals('Rua de Exemplo, 71B (Meu Bairro) Minha Cidade/Meu estado - Brasil', $this->personalData->address());
    }

    public function testValidAge()
    {
        $now = new DateTimeImmutable();
        $birthDate = $this->personalData->birthDate();
        $differenceBetweenDates = $birthDate->diff($now);
        $years = $differenceBetweenDates->y;

        self::assertEquals($years, $this->personalData->age());
    }

    public function testValidBirthDate()
    {
        self::assertEquals(new DateTimeImmutable('1997-10-15'), $this->personalData->birthDate());
    }

    public function testValidEmail()
    {
        self::assertEquals('email@example.com', $this->personalData->email());
    }

    public function testValidFullName()
    {
        self::assertEquals('Cezar Rosa', $this->personalData->fullName());
    }

    public function testInvalidPersonalDataArguments()
    {
        self::expectErrorMessageMatches('/Too few arguments/');

        new PersonalData(
            new Address('Rua de Exemplo', '71B', 'Minha Cidade', 'Meu Bairro', 'Meu estado', 'Brasil'),
            new DateTimeImmutable('1997-10-15'),
            new Email('email@example.com')
        );
    }

    public function testInvalidAddress()
    {
        self::expectErrorMessageMatches('/must be of type Alura\\\Calisthenics\\\Domain\\\Person\\\Address/');

        new PersonalData(
            'Rua de Exemplo, 71B (Minha Cidade) Meu Bairro/Meu estado - Brasil',
            new DateTimeImmutable('2020-01-01'),
            new Email('email@example.com'),
            new FullName('Cezar', 'Rosa')
        );
    }

    public function testInvalidBirthDate()
    {
        self::expectErrorMessageMatches('/must be of type DateTimeInterface/');

        new PersonalData(
            new Address('Rua de Exemplo', '71B', 'Minha Cidade', 'Meu Bairro', 'Meu estado', 'Brasil'),
            '2020-01-01',
            new Email('email@example.com'),
            new FullName('Cezar', 'Rosa')
        );
    }

    public function testInvalidEmail()
    {
        self::expectErrorMessageMatches('/must be of type Alura\\\Calisthenics\\\Domain\\\Email\\\Email/');

        new PersonalData(
            new Address('Rua de Exemplo', '71B', 'Minha Cidade', 'Meu Bairro', 'Meu estado', 'Brasil'),
            new DateTimeImmutable('2020-01-01'),
            'email@example.com',
            new FullName('Cezar', 'Rosa')
        );
    }

    public function testInvalidFullName()
    {
        self::expectErrorMessageMatches('/must be of type Alura\\\Calisthenics\\\Domain\\\Person\\\FullName/');

        new PersonalData(
            new Address('Rua de Exemplo', '71B', 'Minha Cidade', 'Meu Bairro', 'Meu estado', 'Brasil'),
            new DateTimeImmutable('2020-01-01'),
            new Email('email@example.com'),
            'Cezar Rosa'
        );
    }

}