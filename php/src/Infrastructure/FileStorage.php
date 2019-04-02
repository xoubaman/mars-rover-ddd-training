<?php
declare(strict_types=1);

namespace App\Infrastructure;

class FileStorage
{
    public function store(string $id, string $value): void
    {
        $asArray = json_decode(file_get_contents('db.txt'), true);
        $asArray[$id] = $value;
        file_put_contents('db.txt', json_encode($asArray));
    }

    public function read(string $id): string
    {
        $asArray = json_decode(file_get_contents('db.txt'), true);
        return $asArray[$id];
    }
}