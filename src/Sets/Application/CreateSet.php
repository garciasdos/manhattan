<?php

declare(strict_types=1);

namespace PowerNav\Sets\Application;

use PowerNav\Sets\Domain\Set;
use PowerNav\Sets\Domain\SetRepository;

final class CreateSet
{
    private SetRepository $setRepository;

    public function __construct(SetRepository $setRepository)
    {
        $this->setRepository = $setRepository;
    }

    public function __invoke(Set $set)
    {
        $this->setRepository->save($set);
    }
}
