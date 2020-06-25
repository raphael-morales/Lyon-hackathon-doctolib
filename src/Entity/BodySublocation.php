<?php

namespace App\Entity;

use App\Repository\BodySublocationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BodySublocationRepository::class)
 */
class BodySublocation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $API_Id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=BodyLocation::class, inversedBy="bodySublocations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bodyLocation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAPIId(): ?int
    {
        return $this->API_Id;
    }

    public function setAPIId(int $API_Id): self
    {
        $this->API_Id = $API_Id;

        return $this;
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

    public function getBodyLocation(): ?BodyLocation
    {
        return $this->bodyLocation;
    }

    public function setBodyLocation(?BodyLocation $bodyLocation): self
    {
        $this->bodyLocation = $bodyLocation;

        return $this;
    }
}
