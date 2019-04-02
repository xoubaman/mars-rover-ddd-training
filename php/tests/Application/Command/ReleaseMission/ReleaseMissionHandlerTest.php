<?php
declare(strict_types=1);

namespace App\Tests\Application\Command\ReleaseMission;

use App\Application\Command\ReleaseMission\ReleaseMission;
use App\Application\Command\ReleaseMission\ReleaseMissionHandler;
use PHPUnit\Framework\TestCase;

final class ReleaseMissionHandlerTest extends TestCase
{
    /** @var ReleaseMissionHandler */
    private $commandHandler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->commandHandler = new ReleaseMissionHandler();
    }

    public function testReleasingAMissionMakesSelectRoverNotAvailableForAnother(): void
    {
        //Arrange
        //TODO

        //Act
        $command = new ReleaseMission(
            'some plateau id',
            'some rover id'
        );
        $this->commandHandler->__invoke($command);

        //Assert
        // TODO check rover is no longer available
    }

    public function testNoMissionPossibleIfNoAvailableRovers(): void
    {
        //Arrange
        //TODO

        //Expect
        $this->expectException(NoRoversAvailableForMission::class);

        //Act
        $command = new ReleaseMission(
            'some plateau id',
            'some rover id'
        );
        $this->commandHandler->__invoke($command);
    }
}
