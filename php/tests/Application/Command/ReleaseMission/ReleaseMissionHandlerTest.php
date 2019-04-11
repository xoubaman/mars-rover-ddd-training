<?php
declare(strict_types=1);

namespace App\Tests\Application\Command\ReleaseMission;

use App\Application\Command\ReleaseMission\ReleaseMission;
use App\Application\Command\ReleaseMission\ReleaseMissionHandler;
use PHPUnit\Framework\TestCase;

final class ReleaseMissionHandlerTest extends TestCase
{
    const ROVER_ID   = 'some rover id';
    const PLATEAU_ID = 'some plateau id';
    /** @var ReleaseMissionHandler */
    private $commandHandler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->commandHandler = new ReleaseMissionHandler();
    }

    public function testReleasingAMissionMakesSelectedRoverNotAvailable(): void
    {
        //Arrange
        //TODO

        //Act
        $command = new ReleaseMission(self::PLATEAU_ID, self::ROVER_ID);
        $this->commandHandler->__invoke($command);

        //Assert
        // TODO check rover is no longer available
    }

    public function testNoMissionPossibleIfNoAvailableRovers(): void
    {
        //Arrange
        //TODO

        //Expect
        $this->expectException(SendUnavailableRoverToAMission::class);

        //Act
        $command = new ReleaseMission(self::PLATEAU_ID, self::ROVER_ID);
        $this->commandHandler->__invoke($command);
    }
}
