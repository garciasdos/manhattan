<?php

declare(strict_types=1);

namespace PowerNav\Sets\Infrastructure\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

final class RPEType extends Type
{
    private const NAME = 'rpe';

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {

    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new RPE
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if (null === $value) {
            return null;
        }
        return $value->value();
    }

    public function getName(): string
    {
        return self::NAME; // modify to match your constant name
    }
}
