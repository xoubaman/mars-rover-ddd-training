<?php
declare(strict_types=1);

namespace App\Application\Command\ReleaseMission;

use App\Domain\Rover\Hangar;

final class ReleaseMissionHandler
{
    /** @var Hangar */
    private $hangar;

    public function __construct(Hangar $hangar)
    {
        $this->hangar = $hangar;
    }

    public function __invoke(ReleaseMission $command): void
    {
        $rover = $this->hangar->ofId($command->roverId());
        $rover->sendItOnAMission();
    }
}
