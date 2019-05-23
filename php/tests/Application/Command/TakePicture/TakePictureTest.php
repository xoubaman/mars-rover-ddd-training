<?php
declare(strict_types=1);

namespace App\Tests\Application\Command\TakePicture;

use App\Application\Command\TakePicture\GoProDuskWhite;
use App\Application\Command\TakePicture\PhotoStorageFull;
use App\Application\Command\TakePicture\TakePicture;
use App\Infrastructure\Storage;
use PHPUnit\Framework\TestCase;

final class TakePictureTest extends TestCase
{
    const ROVER_ID = 'rover-id';
    const POSITION = '1,1,N';
    const BITMAP   = 666;

    /** @var Storage */
    private $storage;
    /** @var TakePicture */
    private $service;
    /** @var GoProDuskWhite */
    private $goPro;

    protected function setUp(): void
    {
        parent::setUp();

        $this->goPro = $this->createMock(GoProDuskWhite::class);
        $this->goPro->method('takePhotos')->willReturn(self::BITMAP);
        $this->storage = new Storage();

        $this->service = new TakePicture(
            $this->storage,
            $this->goPro
        );
    }

    public function testRoverStoresTakenPictures(): void
    {
        $this->storage->store(
            self::ROVER_ID,
            [
                'position' => self::POSITION,
                'pictures' => [],
            ]
        );

        $this->service->takePhoto(self::ROVER_ID);

        $this->assertRoverTookThePhotoForPosition(self::POSITION);
    }

    private function assertRoverTookThePhotoForPosition(string $position)
    {
        $roverData = $this->storage->read(self::ROVER_ID);
        $pictures  = $roverData['pictures'];
        self::assertNotEmpty($pictures[$position]);
        self::assertEquals(self::BITMAP, $pictures[$position]);
    }

    public function testCannotTakeMoreThanThreePhotosOfDifferentCoordinates(): void
    {
        $this->storeRoverWithThreePhotosOfDifferentCoordinates();

        $this->expectException(PhotoStorageFull::class);
        $this->service->takePhoto(self::ROVER_ID);
    }

    private function storeRoverWithThreePhotosOfDifferentCoordinates(): void
    {
        $this->storage->store(
            self::ROVER_ID,
            [
                'position' => self::POSITION,
                'pictures' => [
                    '0,0,N' => 'some trollface meme',
                    '1,0,N' => 'some cat gif',
                    '2,0,N' => 'some goat gif',
                ],
            ]
        );
    }
}
