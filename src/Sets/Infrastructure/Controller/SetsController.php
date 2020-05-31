<?php

declare(strict_types=1);

namespace PowerNav\Sets\Infrastructure\Controller;

use PowerNav\Sets\Application\CreateSet;
use PowerNav\Sets\Domain\Set;
use PowerNav\Sets\Domain\ValueObject\RPE;
use PowerNav\Sets\Domain\ValueObject\SetId;
use PowerNav\Sets\Domain\ValueObject\Weight;
use PowerNav\Sets\Domain\ValueObject\WeightUnit;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\JsonResponse;

final class SetsController
{
    private CreateSet $createSet;

    public function __construct(CreateSet $createSet)
    {
        $this->createSet = $createSet;
    }

    public function __invoke()
    {
        $uuid = Uuid::uuid4();
        $set = new Set(
            new SetId($uuid->toString()),
            'bench press',
            6,
            new Weight(127.7, WeightUnit::kilogram()),
            RPE::fromFloat(5),
            null
        );

        dump($set);

        $this->createSet->__invoke($set);

        return new JsonResponse('HELLO');
    }
}
