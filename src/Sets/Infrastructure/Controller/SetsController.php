<?php

declare(strict_types=1);

namespace PowerNav\Sets\Infrastructure\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

final class SetsController
{
    public function __invoke()
    {
        return new JsonResponse('HELLO');
    }
}
