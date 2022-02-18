<?php

namespace Alura\Calisthenics\Tests\Unit\Domain\Student;

use Alura\Calisthenics\Domain\Student\WatchedVideos;
use Alura\Calisthenics\Domain\Video\Video;
use PHPUnit\Framework\TestCase;

class WatchedVideosTest extends TestCase
{
    private WatchedVideos $watchedVideos;

    public function setUp(): void
    {
        $this->watchedVideos = new WatchedVideos();
    }

    public function testEmptyWatchedVideos()
    {
        self::assertTrue($this->watchedVideos->isEmpty());
    }

    public function testNotEmptyWatchedVideos()
    {
        $this->watchedVideos->add(new Video(), new \DateTimeImmutable());
        $this->watchedVideos->add(new Video(), new \DateTimeImmutable());

        self::assertFalse($this->watchedVideos->isEmpty());
    }

    public function testIfDateOfFirstVideoWatchedIsCorrect()
    {
        $this->watchedVideos->add(new Video(), new \DateTimeImmutable('2000-01-01'));
        $this->watchedVideos->add(new Video(), new \DateTimeImmutable('1990-01-01'));
        $this->watchedVideos->add(new Video(), new \DateTimeImmutable('1999-01-01'));

        self::assertEquals(
            new \DateTimeImmutable('1990-01-01'),
            $this->watchedVideos->dateOfFirstWatchedVideo()
        );
    }
}