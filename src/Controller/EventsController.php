<?php

namespace App\Controller;

use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventsController extends AbstractController
{
    /** @var EventRepository */
    private $eventRepository;

    /**
     * EventsController constructor.
     * @param EventRepository $eventRepository
     */
    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }


    /**
     * @Route("/events", name="events")
     */
    public function index(): Response
    {
        $event = $this->eventRepository->getLatestEvent();

        return $this->render('events/index.html.twig', [
            'controller_name' => 'EventsController',
            'event' => $event,
        ]);
    }
}
