<?php
declare(strict_types=1);

namespace App\Domain\Rover;

final class Hangar
{
    /** @var Rover[] */
    private $rovers;

    public function register(Rover $rover)
    {
        $this->rovers[$rover->id()] = $rover;
    }

    public function ofId(string $roverId): Rover
    {
        return $this->rovers[$roverId];
    }
}
