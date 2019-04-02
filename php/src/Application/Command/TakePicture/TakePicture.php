<?php
declare(strict_types=1);

namespace App\Application\Command\TakePicture;

use App\Infrastructure\Storage;

final class TakePicture
{
    /** @var GoProDuskWhite */
    private $goPro;
    /** @var Storage */
    private $storage;

    public function __construct(Storage $storage, GoProDuskWhite $goPro)
    {
        $this->storage = $storage;
        $this->goPro   = $goPro;
    }

    public function takePhoto(string $roverId): void
    {
        $bitmap = $this->goPro->takePhotos(
            'default obturation',
            '0X',
            1
        );

        $rover = $this->storage->read($roverId);

        $position = $rover['position'];

        $rover['pictures'][$position] = $bitmap;

        if (count($rover['pictures']) > 3) {
            throw new PhotoStorageFull();
        }

        $this->storage->store($roverId, $rover);
    }
}
