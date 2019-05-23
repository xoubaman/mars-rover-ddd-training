<?php
declare(strict_types=1);

namespace App\Application\Command\TakePicture;

class GoProDuskWhite
{
    public function takePhotos(string $obturation, string $zoom, int $numberOfPhotos): string
    {
        return (string)rand(1000, 9999);
    }
}
