<?php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\Event;

interface EventRepository
{
    public function lastByStartDate(): ?Event;
}