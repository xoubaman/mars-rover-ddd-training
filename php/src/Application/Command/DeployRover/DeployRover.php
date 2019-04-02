<?php
declare(strict_types=1);

namespace App\Application\Command\DeployRover;

class DeployRover
{
    /** @var int */
    private $x;
    /** @var int */
    private $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function x(): int
    {
        return $this->x;
    }

    public function y(): int
    {
        return $this->y;
    }
}