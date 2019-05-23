<?php
declare(strict_types=1);

namespace App\Domain\Rover;

final class Availability
{
    const AVAILABLE     = 'available';
    const NOT_AVAILABLE = 'not-available';

    const SUPPORTED = [
        self::AVAILABLE,
        self::NOT_AVAILABLE,
    ];

    /** @var string */
    private $availability;

    private function __construct(string $availability)
    {
        if (!in_array($availability, self::SUPPORTED)) {
            throw new \InvalidArgumentException('Not valid');
        }

        $this->availability = $availability;
    }

    public static function available(): self
    {
        return new self(self::AVAILABLE);
    }

    public static function notAvailable(): self
    {
        return new self(self::NOT_AVAILABLE);
    }

    public function noLonger(): self
    {
        if (!$this->isAvailable()) {
            throw new \DomainException('Nope');
        }

        return Availability::notAvailable();
    }

    private function isAvailable(): bool
    {
        return $this->availability === self::AVAILABLE;
    }

}
