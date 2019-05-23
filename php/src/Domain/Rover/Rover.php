<?php
declare(strict_types=1);

namespace App\Domain\Rover;

final class Rover
{
    /** @var string */
    private $id;
    /** @var string */
    private $availability;

    public function __construct(string $id, string $availability)
    {
        $this->id           = $id;
        $this->availability = $availability;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function availability(): string
    {

        return $this->availability;
    }

    public function sendItOnAMission()
    {
        $this->availability = 'not-available';
    }
}
