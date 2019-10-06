<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\CustomIdGenerator;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 * @Vich\Uploadable
 */
class Event
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
     * @ORM\Column(type="string", length=70)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $subtitle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="date_immutable", nullable=true)
     */
    private $startedAt;

    /**
     * @ORM\Column(type="date_immutable", nullable=true)
     */
    private $endedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EventSubcategory", inversedBy="events")
     */
    private $subcategory;

    /**
     * @ORM\OneToMany(
     *     targetEntity="App\Entity\EventPhoto",
     *     mappedBy="event",
     *     fetch="EXTRA_LAZY",
     *     orphanRemoval=true,
     *     cascade={"persist"}
     * )
     */
    private $eventPhotos;

    public function __construct()
    {
        $this->eventPhotos = new ArrayCollection();
        $this->createdAt = new DateTime();
    }

    public function getId(): ?UuidInterface
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(string $subtitle): self
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStartedAt(): ?\DateTimeImmutable
    {
        return $this->startedAt;
    }

    public function setStartedAt(?\DateTimeImmutable $startedAt): self
    {
        $this->startedAt = $startedAt;

        return $this;
    }

    public function getEndedAt(): ?\DateTimeImmutable
    {
        return $this->endedAt;
    }

    public function setEndedAt(?\DateTimeImmutable $endedAt): self
    {
        $this->endedAt = $endedAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getSubcategory(): ?EventSubcategory
    {
        return $this->subcategory;
    }

    public function setSubcategory(?EventSubcategory $subcategory): self
    {
        $this->subcategory = $subcategory;

        return $this;
    }

    /**
     * @return Collection|EventPhoto[]
     */
    public function getEventPhotos(): Collection
    {
        return $this->eventPhotos;
    }

    public function addEventPhoto(EventPhoto $eventPhoto): self
    {
        if (!$this->eventPhotos->contains($eventPhoto)) {
            $this->eventPhotos[] = $eventPhoto;
            $eventPhoto->setEvent($this);
        }

        return $this;
    }

    public function removeEventPhoto(EventPhoto $eventPhoto): self
    {
        if ($this->eventPhotos->contains($eventPhoto)) {
            $this->eventPhotos->removeElement($eventPhoto);
            // set the owning side to null (unless already changed)
            if ($eventPhoto->getEvent() === $this) {
                $eventPhoto->setEvent(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->title;
    }
}
