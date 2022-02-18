<?php

namespace Alura\Calisthenics\Domain\Video;

class VideoList
{
    /**
     * @var Video[]
     */
    private array $videos;

    public function __construct()
    {
        $this->videos = [];
    }

    public function put(Video $video)
    {
        $this->videos[] = $video;
    }

    /**
     * @return Video[]
     */
    public function get()
    {
        return $this->videos;
    }
}