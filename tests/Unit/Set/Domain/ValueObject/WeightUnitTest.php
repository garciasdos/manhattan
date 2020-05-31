<?php

declare(strict_types=1);

namespace PowerNav\Tests\Common\Domain\ValueObject;

use PowerNav\Set\Domain\ValueObject\WeightUnit;
use PHPUnit\Framework\TestCase;

final class WeightUnitTest extends TestCase
{
    public function testKilogramsConstructor(): void
    {
        $unit = WeightUnit::kilogram();

        $this->assertSame(WeightUnit::KGS, $unit->value());
    }
}
