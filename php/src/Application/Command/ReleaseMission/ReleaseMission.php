<?php
declare(strict_types=1);

namespace App\Application\Command\ReleaseMission;

final class ReleaseMission
{
    /** @var string */
    private $plateauId;
    /** @var string */
    private $roverId;

    public function __construct(string $plateauId, string $roverId)
    {
        $this->plateauId = $plateauId;
        $this->roverId   = $roverId;
    }

    public function plateauId(): string
    {
        return $this->plateauId;
    }

    public function roverId(): string
    {
        return $this->roverId;
    }
}
