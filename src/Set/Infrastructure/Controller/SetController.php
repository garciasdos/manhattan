<?php

declare(strict_types=1);

namespace PowerNav\Set\Infrastructure\Controller\Set;

use PowerNav\Set\Domain\ValueObject\SetId;
use Ramsey\Uuid\Nonstandard\Uuid as RamseyUuid;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

final class SetController extends AbstractController
{
    public function __invoke()
    {
        $id = RamseyUuid::uuid4();
        $uuid = new SetId($id->toString());
        return new JsonResponse($uuid->value());
    }
}
