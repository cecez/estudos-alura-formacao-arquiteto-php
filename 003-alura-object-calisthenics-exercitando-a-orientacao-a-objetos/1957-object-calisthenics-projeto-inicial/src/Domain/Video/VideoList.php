<?php

namespace Alura\Calisthenics\Domain\Video;

class VideoList
{
    private array $videos;

    public function __construct()
    {
        $this->videos = [];
    }

    public function put(Video $video)
    {
        $this->videos[] = $video;
    }

    public function get(): array
    {
        return $this->videos;
    }
}