<?php

namespace App\Controller;

use App\Service\Event\GetLastEvent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /** @var GetLastEvent */
    private $getLastEvent;

    public function __construct(GetLastEvent $getLastEvent)
    {
        $this->getLastEvent = $getLastEvent;
    }

    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $event = $this->getLastEvent->execute();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'Event'           => $event,
        ]);
    }
}
