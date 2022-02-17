<?php

namespace Alura\Calisthenics\Domain\Person;

use Alura\Calisthenics\Domain\Email\Email;
use DateTimeInterface;

class PersonalData
{
    private Address $address;
    private DateTimeInterface $birthDate;
    private Email $email;
    private FullName $fullName;

    /**
     * @param  Address  $address
     * @param  DateTimeInterface  $birthDate
     * @param  Email  $email
     * @param  FullName  $fullName
     */
    public function __construct(Address $address, DateTimeInterface $birthDate, Email $email, FullName $fullName)
    {
        $this->address = $address;
        $this->birthDate = $birthDate;
        $this->email = $email;
        $this->fullName = $fullName;
    }

    public function address(): string
    {
        return $this->address;
    }

    public function age(): int
    {
        $today = new \DateTimeImmutable();
        $dateInterval = $this->birthDate->diff($today);
        return $dateInterval->y;
    }

    public function birthDate(): DateTimeInterface
    {
        return $this->birthDate;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function fullName(): string
    {
        return $this->fullName;
    }

}