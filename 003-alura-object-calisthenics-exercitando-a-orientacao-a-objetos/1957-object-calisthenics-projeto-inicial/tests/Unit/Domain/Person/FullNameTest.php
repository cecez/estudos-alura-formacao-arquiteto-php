<?php

namespace Alura\Calisthenics\Tests\Unit\Domain\Person;

use Alura\Calisthenics\Domain\Person\FullName;
use PHPUnit\Framework\TestCase;

class FullNameTest extends TestCase
{

    public function testValidFullName()
    {
        $fullName = new FullName('Cezar', 'Rosa');

        self::assertEquals('Cezar Rosa', $fullName);
    }

    public function testInvalidFullName()
    {
        self::expectErrorMessageMatches('/Too few arguments/');

        new FullName('Cezar');
    }

}