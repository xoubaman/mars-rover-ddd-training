<?php
declare(strict_types=1);

namespace App\Application\Command\TakePicture;

final class TakePicture
{
    /** @var int */
    private $x;
    /** @var int */
    private $y;
    /** @var string */
    private $bitmap;

    public function __construct(int $x, int $y, string $bitmap)
    {
        $this->x      = $x;
        $this->y      = $y;
        $this->bitmap = $bitmap;
    }

    public function x(): int
    {
        return $this->x;
    }

    public function y(): int
    {
        return $this->y;
    }

    public function bitmap(): string
    {
        return $this->bitmap;
    }
}
