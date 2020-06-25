<?php

namespace App\Entity;

use App\Repository\SymptomRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SymptomRepository::class)
 */
class Symptom
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\OneToOne(targetEntity=Specialities::class, inversedBy="symptom", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $specialities;

    /**
     * @ORM\ManyToOne(targetEntity=KeyWord::class, inversedBy="symptoms")
     * @ORM\JoinColumn(nullable=false)
     */
    private $keyword;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getSpecialities(): ?Specialities
    {
        return $this->specialities;
    }

    public function setSpecialities(Specialities $specialities): self
    {
        $this->specialities = $specialities;

        return $this;
    }

    public function getKeyword(): ?KeyWord
    {
        return $this->keyword;
    }

    public function setKeyword(?KeyWord $keyword): self
    {
        $this->keyword = $keyword;

        return $this;
    }
}
