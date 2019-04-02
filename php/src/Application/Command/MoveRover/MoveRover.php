<?php
declare(strict_types=1);

namespace App\Application\Command\MoveRover;

use App\Infrastructure\Storage;

class MoveRover
{
    /** @var Storage */
    private $storage;
    /** @var int */
    private $maxX;
    /** @var int */
    private $maxY;

    public function __construct(Storage $storage)
    {
        $this->storage = $storage;
    }

    public function move(string $roverId, string $movements)
    {
        $roverData = $this->storage->read($roverId);

        if ($roverData !== null) {

            $plateau = $this->storage->read($roverData['plateau-id']);
            if ($plateau !== null) {

                $position           = $roverData['position'];
                $positionArray      = explode(',', $position);
                $initialX           = $positionArray[0];
                $initialY           = $positionArray[1];
                $initialOrientation = $positionArray[2];

                $movements = str_split($movements);

                $currentX           = $initialX;
                $currentY           = $initialY;
                $currentOrientation = $initialOrientation;

                $plateauDimensions      = $plateau['dimensions'];
                $plateauDimensionsArray = explode(',', $plateau['dimensions']);
                $this->maxX             = $plateauDimensionsArray[0];
                $this->maxY             = $plateauDimensionsArray[1];

                foreach ($movements as $movement) {
                    switch ($movement) {
                        case 'R':
                            if ($currentOrientation === 'N') {
                                $currentOrientation = 'E';
                            }
                            break;

                        case 'M':
                            if ($currentOrientation === 'E') {
                                $currentX++;
                            }
                            break;
                    }

                    $roverData['position'] = implode(',', [$currentX, $currentY, $currentOrientation]);

                    $this->storage->store(
                        $roverId,
                        $roverData
                    );
                }
            } else {
                throw new \Exception('Plateau not found');
            }
        } else {
            throw new \Exception('Rover not found');
        }
    }
}
