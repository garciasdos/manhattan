<?php

declare(strict_types=1);

namespace PowerNav\Set\Domain\ValueObject;

final class WeightUnit
{
    public const KGS = 'kgs';
    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function kilogram(): self
    {
        return new self(self::KGS);
    }

    public function value(): string
    {
        return $this->value;
    }
}
