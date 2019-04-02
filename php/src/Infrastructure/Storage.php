<?php
declare(strict_types=1);

namespace App\Infrastructure;

class Storage
{
    /** @var array */
    private $storage = [];

    public function store(string $id, array $value): void
    {
        $this->storage[$id] = $value;
    }

    public function read(string $id): ?array
    {
        return $this->storage[$id] ?? null;
    }
}
