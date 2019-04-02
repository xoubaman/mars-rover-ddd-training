<?php
declare(strict_types=1);

namespace App\Tests\Application\Command\MoveRover;

use App\Application\Command\MoveRover\MoveRover;
use App\Infrastructure\Storage;
use PHPUnit\Framework\TestCase;

final class MoveRoverTest extends TestCase
{
    const ROVER_ID   = 'rover-id';
    const PLATEAU_ID = 'plateau-num5';

    /** @var MoveRover */
    private $service;
    /** @var Storage */
    private $storage;

    protected function setUp(): void
    {
        parent::setUp();

        $this->storage = new Storage();

        $this->service = new MoveRover(
            $this->storage
        );
    }

    public function testRoverMoves(): void
    {
        $this->store4x3Plateau();
        $this->storeRoverInPosition('1,1,N');
        $this->service->move(self::ROVER_ID, 'MRM');
        $this->assertRoverIsInPosition('2,1,E');
    }

    public function testPlateauMustExist()
    {
        $this->storeRoverInPosition('1,1,N');
        $this->expectException(\Exception::class);
        $this->service->move(self::ROVER_ID, 'M');
    }

    public function testRoverMustExist()
    {
        $this->store4x3Plateau();
        $this->expectException(\Exception::class);
        $this->service->move('not stored rover', 'M');
    }

    private function store4x3Plateau(): void
    {
        $this->storage->store(
            self::PLATEAU_ID,
            [
                'dimensions' => '4,3',
            ]
        );
    }

    private function storeRoverInPosition(string $position): void
    {
        $this->storage->store(
            self::ROVER_ID,
            [
                'position'   => $position,
                'plateau-id' => self::PLATEAU_ID,
            ]
        );
    }

    private function assertRoverIsInPosition(string $position): void
    {
        $storedRover = $this->storage->read(self::ROVER_ID);
        self::assertEquals($position, $storedRover['position']);
    }
}
