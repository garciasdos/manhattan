<?php

declare(strict_types=1);

namespace PowerNav\Tests\Set\Domain\ValueObject;

use App\Set\Domain\ValueObject\RPE;
use PHPUnit\Framework\TestCase;

final class RPETest extends TestCase
{
    public function testIsValidatingRPE(): void
    {
        $rpe = RPE::fromFloat(6.55);

        $this->assertSame(6.5, $rpe->value());
    }

    public function testIsRoundingToOneDecimal(): void
    {
        $rpe = RPE::fromFloat(6.55);

        $this->assertSame(6.5, $rpe->value());
    }
}
