<?php

namespace Alura\Calisthenics\Domain\Person;

class Address
{
    private string $number;
    private string $country;
    private string $province;
    private string $city;
    private string $street;
    private string $state;

    public function __construct(
        string $street,
        string $number,
        string $city,
        string $province,
        string $state,
        string $country
    ) {
        $this->street = $street;
        $this->number = $number;
        $this->country = $country;
        $this->province = $province;
        $this->city = $city;
        $this->state = $state;
    }

    public function __toString(): string
    {
        return
            $this->street . ', ' .
            $this->number . ' (' .
            $this->province  . ') ' .
            $this->city . '/' .
            $this->state . ' - ' .
            $this->country;
    }

}