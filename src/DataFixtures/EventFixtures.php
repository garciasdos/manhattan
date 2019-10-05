<?php

namespace App\DataFixtures;

use App\Entity\Event;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class EventFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++) {
            $event = new Event();
            $event->setTitle('event '.$i);
            $event->setDescription('description ' . $i);
            $event->setSubtitle('subtitle ' . $i);
            $event->setStartedAt(new DateTimeImmutable());
            $event->setCreatedAt(new DateTimeImmutable());
            $manager->persist($event);
        }

        $manager->flush();
    }
}
