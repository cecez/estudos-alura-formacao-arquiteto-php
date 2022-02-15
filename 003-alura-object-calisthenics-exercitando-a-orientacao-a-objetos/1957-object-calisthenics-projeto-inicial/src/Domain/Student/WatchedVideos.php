<?php

namespace Alura\Calisthenics\Domain\Student;

use Alura\Calisthenics\Domain\Video\Video;
use DateTimeInterface;
use Ds\Map;
use JetBrains\PhpStorm\Pure;

class WatchedVideos
{
    private Map $videos;

    public function __construct()
    {
        $this->videos = new Map();
    }

    public function add(Video $video, DateTimeInterface $date): void
    {
        $this->videos->put($video, $date);
    }

    #[Pure] public function isEmpty(): bool
    {
        return $this->videos->count() === 0;
    }

    public function dateOfFirstWatchedVideo(): DateTimeInterface
    {
        $this->videos->sort(
            fn (DateTimeInterface $dateA, DateTimeInterface $dateB) => $dateA <=> $dateB
        );
        $firstVideo = $this->videos->first();
        return $firstVideo->value;
    }
}