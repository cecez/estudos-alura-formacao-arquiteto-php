<?php

namespace Alura\Calisthenics\Domain\Video;

use Alura\Calisthenics\Domain\Student\Student;
use JetBrains\PhpStorm\Pure;

class InMemoryVideoRepository implements VideoRepository
{
    private VideoList $videos;

    #[Pure] public function __construct()
    {
        $this->videos = new VideoList();
    }

    public function add(Video $video): void
    {
        $this->videos->put($video);
    }

    public function videosFor(Student $student): array
    {
        return array_filter(
            $this->videos->get(),
            fn (Video $video) => $video->ageLimit() <= $student->age()
        );
    }
}
