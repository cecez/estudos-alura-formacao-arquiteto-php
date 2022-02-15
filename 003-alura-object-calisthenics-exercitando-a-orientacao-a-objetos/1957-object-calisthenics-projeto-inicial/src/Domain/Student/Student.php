<?php

namespace Alura\Calisthenics\Domain\Student;

use Alura\Calisthenics\Domain\Person\Person;
use Alura\Calisthenics\Domain\Person\PersonalData;
use Alura\Calisthenics\Domain\Video\Video;
use DateTimeImmutable;
use DateTimeInterface;

class Student extends Person
{
    private WatchedVideos $watchedVideos;

    public function __construct(PersonalData $personalData)
    {
        parent::__construct($personalData);
        $this->watchedVideos = new WatchedVideos();
    }

    public function watch(Video $video, DateTimeInterface $date)
    {
        $this->watchedVideos->add($video, $date);
    }

    public function hasAccess(): bool
    {
        if ($this->watchedVideos->isEmpty()) {
            return true;
        }

        return $this->hasVideoWatchedInLessThan90Days();
    }

    private function hasVideoWatchedInLessThan90Days(): bool
    {
        $firstDate = $this->watchedVideos->dateOfFirstWatchedVideo();
        $today = new DateTimeImmutable();
        $intervalOfDays = $firstDate->diff($today);

        return $intervalOfDays->days < 90;
    }
}
