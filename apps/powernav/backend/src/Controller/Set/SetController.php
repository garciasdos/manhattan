<?php

declare(strict_types = 1);

namespace PowerNav\Apps\Backend\Controller\Set;

use PowerNav\Set\Domain\ValueObject\RPE;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class SetController
{
    public function __invoke(Request $request): Response
    {
        $rpe = RPE::fromFloat(5.5);
        return new JsonResponse($rpe->value());
    }
}
