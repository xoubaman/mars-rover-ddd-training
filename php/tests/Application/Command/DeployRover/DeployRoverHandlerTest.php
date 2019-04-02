<?php
declare(strict_types=1);

namespace App\Application\Command\DeployRover;

use PHPUnit\Framework\TestCase;

final class DeployRoverHandlerTest extends TestCase
{
    /** @var DeployRoverHandler */
    private $commandHandler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->commandHandler = new DeployRoverHandler();
    }

    public function testRoverIsDeployedInAPlateau(): void
    {
        //Arrange
        //TODO

        //Act
        $command = new DeployRover(
            'some plateau id',
            'some rover id',
            0,
            0,
            'N'
        );
        $this->commandHandler->__invoke($command);

        //Assert
        // TODO check rover is where we expect it to be
    }

    public function testRoverCannotBeDeployedOutsideThePlateauLimits(): void
    {
        //Arrange
        //TODO

        //Expect
        $this->expectException(DeployingRoverOutsidePlateauLimits::class);

        //Act
        $command = new DeployRover(
            'some plateau id',
            'some rover id',
            5,
            5,
            'N'
        );
        $this->commandHandler->__invoke($command);
    }
}
