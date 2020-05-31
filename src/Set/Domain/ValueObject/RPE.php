<?php

declare(strict_types=1);

namespace PowerNav\Set\Domain\ValueObject;

use PowerNav\Set\Domain\Exception\InvalidRpeException;

final class RPE
{
    private const MIN_RPE = 0.0;
    private const MAX_RPE = 10.0;
    private float $value;

    private function __construct(float $value)
    {
        $this->value = $value;
    }

    /**
     * @throws InvalidRpeException
     */
    public static function fromFloat(float $value): self
    {
        self::ensureIsValid($value);

        return new self(round($value, 1, PHP_ROUND_HALF_DOWN));
    }

    public function value(): float
    {
        return $this->value;
    }

    /**
     * @throws InvalidRpeException
     */
    private static function ensureIsValid(float $value): void
    {
        if (self::MIN_RPE >= $value || self::MAX_RPE <= $value) {
            throw new InvalidRpeException(sprintf('%s is not a valid RPE. It must be between %s and %s', $value, self::MIN_RPE, self::MAX_RPE));
        }
    }
}
