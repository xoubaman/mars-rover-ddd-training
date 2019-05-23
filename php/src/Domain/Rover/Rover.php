<?php
declare(strict_types=1);

namespace App\Domain\Rover;

final class Rover
{
    /** @var string */
    private $id;
    /** @var Availability */
    private $availability;

    public function __construct(string $id, Availability $availability)
    {
        $this->id           = $id;
        $this->availability = $availability;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function availability(): Availability
    {
        return $this->availability;
    }

    public function sendItOnAMission()
    {
        $this->availability = $this->availability->noLonger();
    }
}
