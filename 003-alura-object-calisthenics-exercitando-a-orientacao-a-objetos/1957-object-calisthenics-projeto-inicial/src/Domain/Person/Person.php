<?php

namespace Alura\Calisthenics\Domain\Person;

use JetBrains\PhpStorm\Pure;

class Person
{
    private PersonalData $personalData;

    public function __construct(PersonalData $personalData)
    {
        $this->personalData = $personalData;
    }

    #[Pure] public function address(): string
    {
        return $this->personalData->address();
    }

    public function age(): int
    {
        return $this->personalData->age();
    }

    #[Pure] public function email(): string
    {
        return $this->personalData->email();
    }

    #[Pure] public function fullName(): string
    {
        return $this->personalData->fullName();
    }
}