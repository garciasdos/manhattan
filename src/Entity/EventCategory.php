<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\CustomIdGenerator;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventCategoryRepository")
 */
class EventCategory
{
    /**
     * @var UuidInterface
     *
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EventSubcategory", mappedBy="category", orphanRemoval=true)
     */
    private $eventSubcategories;

    public function __construct()
    {
        $this->eventSubcategories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|EventSubcategory[]
     */
    public function getEventSubcategories(): Collection
    {
        return $this->eventSubcategories;
    }

    public function addEventSubcategory(EventSubcategory $eventSubcategory): self
    {
        if (!$this->eventSubcategories->contains($eventSubcategory)) {
            $this->eventSubcategories[] = $eventSubcategory;
            $eventSubcategory->setCategory($this);
        }

        return $this;
    }

    public function removeEventSubcategory(EventSubcategory $eventSubcategory): self
    {
        if ($this->eventSubcategories->contains($eventSubcategory)) {
            $this->eventSubcategories->removeElement($eventSubcategory);
            // set the owning side to null (unless already changed)
            if ($eventSubcategory->getCategory() === $this) {
                $eventSubcategory->setCategory(null);
            }
        }

        return $this;
    }
}
