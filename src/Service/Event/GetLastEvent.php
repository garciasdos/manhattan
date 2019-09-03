<?php
declare(strict_types=1);

namespace App\Service\Event;

use App\Entity\Event;
use App\Repository\EventRepository;

class GetLastEvent
{
    /** @var EventRepository */
    private $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function execute(): Event
    {
        return $this->eventRepository->lastByStartDate();
    }


}