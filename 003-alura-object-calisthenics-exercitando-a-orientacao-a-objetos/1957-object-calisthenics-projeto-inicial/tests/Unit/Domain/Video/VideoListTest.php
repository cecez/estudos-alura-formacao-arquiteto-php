<?php

namespace Alura\Calisthenics\Tests\Unit\Domain\Video;

use Alura\Calisthenics\Domain\Video\Video;
use Alura\Calisthenics\Domain\Video\VideoList;
use PHPUnit\Framework\TestCase;

class VideoListTest extends TestCase
{
    private VideoList $videoList;

    protected function setUp(): void
    {
        $this->videoList = new VideoList();
    }

    public function testEmptyVideoList()
    {
        self::assertCount(0, $this->videoList->get());
    }

    public function testIfStoreAVideoIsCorrect()
    {
        $this->videoList->put(new Video());
        $this->videoList->put(new Video());
        $this->videoList->put(new Video());

        self::assertCount(3, $this->videoList->get());
    }

    public function testIfTryingToManipulateVideoListArrayCanChangeVideoList()
    {
        $meuArrayDeVideos = $this->videoList->get();

        $meuArrayDeVideos[] = 'isso não vai dar nenhum problema';
        $meuArrayDeVideos[] = 'pode ficar tranquilo';

        self::assertCount(0, $this->videoList->get());
        self::assertCount(2, $meuArrayDeVideos);
    }
}