<?php

namespace Alura\Calisthenics\Domain\Video;

class Video
{
    private bool $visible = false;
    private int $ageLimit;

    public function isPublished(): bool
    {
        return $this->visible;
    }

    public function getAgeLimit(): int
    {
        return $this->ageLimit;
    }

    public function setAgeLimit(int $ageLimit): void
    {
        $this->ageLimit = $ageLimit;
    }

    public function publish()
    {
        $this->visible = true;
    }
}
