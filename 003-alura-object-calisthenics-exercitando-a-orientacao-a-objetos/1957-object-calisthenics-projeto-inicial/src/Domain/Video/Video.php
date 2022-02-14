<?php

namespace Alura\Calisthenics\Domain\Video;

class Video
{
    private bool $published = false;
    private int $ageLimit;

    public function __construct(int $ageLimit = 0)
    {
        $this->ageLimit = $ageLimit;
    }

    public function isPublished(): bool
    {
        return $this->published;
    }

    public function ageLimit(): int
    {
        return $this->ageLimit;
    }

    public function publish()
    {
        $this->published = true;
    }
}
