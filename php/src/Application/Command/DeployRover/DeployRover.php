<?php
declare(strict_types=1);

namespace App\Application\Command\DeployRover;

class DeployRover
{
    /** @var string */
    private $plateauId;
    /** @var string */
    private $roverId;
    /** @var int */
    private $x;
    /** @var int */
    private $y;
    /** @var string */
    private $orientation;

    public function __construct(string $plateauId, string $roverId, int $x, int $y, string $orientation)
    {
        $this->plateauId   = $plateauId;
        $this->roverId     = $roverId;
        $this->x           = $x;
        $this->y           = $y;
        $this->orientation = $orientation;
    }

    public function plateauId(): string
    {
        return $this->plateauId;
    }

    public function x(): int
    {
        return $this->x;
    }

    public function y(): int
    {
        return $this->y;
    }

    public function roverId(): string
    {
        return $this->roverId;
    }

    public function orientation(): string
    {
        return $this->orientation;
    }
}
