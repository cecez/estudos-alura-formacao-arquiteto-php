<?php

namespace Alura\Calisthenics\Domain\Video;

class Video
{
    private bool $visible = false;
    private ?int $ageLimit;

    public function __construct(int $ageLimit = null)
    {
        $this->ageLimit = $ageLimit;
    }

    public function isPublished(): bool
    {
        return $this->visible;
    }

    public function ageLimit(): ?int
    {
        return $this->ageLimit;
    }

    public function publish()
    {
        $this->visible = true;
    }
}
