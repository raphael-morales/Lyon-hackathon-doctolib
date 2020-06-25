<?php

namespace App\Entity;

use App\Repository\SpecialistRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpecialistRepository::class)
 */
class Specialist
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $Link;

    /**
     * @ORM\ManyToOne(targetEntity=Specialities::class, inversedBy="specialists")
     * @ORM\JoinColumn(nullable=false)
     */
    private $specialitie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLink(): ?string
    {
        return $this->Link;
    }

    public function setLink(string $Link): self
    {
        $this->Link = $Link;

        return $this;
    }

    public function getSpecialitie(): ?Specialities
    {
        return $this->specialitie;
    }

    public function setSpecialitie(?Specialities $specialitie): self
    {
        $this->specialitie = $specialitie;

        return $this;
    }
}
