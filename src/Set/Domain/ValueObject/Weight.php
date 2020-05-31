<?php

declare(strict_types=1);

namespace PowerNav\Set\Domain\ValueObject;

class Weight
{
    private float $number;
    private WeightUnit $unit;

    private function __construct(float $number, WeightUnit $unit)
    {
        $this->number = $number;
        $this->unit = $unit;
    }

    public function number(): float
    {
        return $this->number;
    }

    public function unit(): WeightUnit
    {
        return $this->unit;
    }
}
