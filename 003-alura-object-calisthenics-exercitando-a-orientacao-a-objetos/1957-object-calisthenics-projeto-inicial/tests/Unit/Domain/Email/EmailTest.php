<?php

namespace Alura\Calisthenics\Tests\Unit\Domain\Email;

use Alura\Calisthenics\Domain\Email\Email;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testValidEmail()
    {
        $email = new Email('cezar@cecez.com.br');

        self::assertEquals('cezar@cecez.com.br', $email);
    }

    public function testInvalidEmailShouldThrowException()
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage('Invalid e-mail address');

        new Email('Isto não é um e-mail');
    }
}