<?php
declare(strict_types=1);

namespace App\Tests\Application\Command\ReleaseMission;

use App\Application\Command\ReleaseMission\ReleaseMission;
use App\Application\Command\ReleaseMission\ReleaseMissionHandler;
use App\Domain\Rover\Hangar;
use App\Domain\Rover\Rover;
use PHPUnit\Framework\TestCase;

final class ReleaseMissionHandlerTest extends TestCase
{
    const ROVER_ID   = 'some rover id';
    const PLATEAU_ID = 'some plateau id';
    /** @var ReleaseMissionHandler */
    private $commandHandler;
    /** @var Hangar */
    private $hangar;

    protected function setUp(): void
    {
        parent::setUp();

        $this->hangar = new Hangar();
        $this->commandHandler = new ReleaseMissionHandler(
            $this->hangar
        );
    }

    public function testReleasingAMissionMakesSelectedRoverNotAvailable(): void
    {
        //Arrange
        $rover = new Rover(self::ROVER_ID, 'available');
        $this->hangar->register($rover);

        //Act
        $command = new ReleaseMission(self::PLATEAU_ID, self::ROVER_ID);
        $this->commandHandler->__invoke($command);

        //Assert
        $expected = new Rover(self::ROVER_ID, 'not-available');
        self::assertEquals($expected, $rover);
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
