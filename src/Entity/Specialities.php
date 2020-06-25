<?php

namespace App\Entity;

use App\Repository\SpecialitiesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpecialitiesRepository::class)
 */
class Specialities
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
     * @ORM\OneToMany(targetEntity=Specialist::class, mappedBy="specialitie")
     */
    private $specialists;

    /**
     * @ORM\OneToOne(targetEntity=Symptom::class, mappedBy="specialities", cascade={"persist", "remove"})
     */
    private $symptom;

    public function __construct()
    {
        $this->specialists = new ArrayCollection();
    }

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

    /**
     * @return Collection|Specialist[]
     */
    public function getSpecialists(): Collection
    {
        return $this->specialists;
    }

    public function addSpecialist(Specialist $specialist): self
    {
        if (!$this->specialists->contains($specialist)) {
            $this->specialists[] = $specialist;
            $specialist->setSpecialitie($this);
        }

        return $this;
    }

    public function removeSpecialist(Specialist $specialist): self
    {
        if ($this->specialists->contains($specialist)) {
            $this->specialists->removeElement($specialist);
            // set the owning side to null (unless already changed)
            if ($specialist->getSpecialitie() === $this) {
                $specialist->setSpecialitie(null);
            }
        }

        return $this;
    }

    public function getSymptom(): ?Symptom
    {
        return $this->symptom;
    }

    public function setSymptom(Symptom $symptom): self
    {
        $this->symptom = $symptom;

        // set the owning side of the relation if necessary
        if ($symptom->getSpecialities() !== $this) {
            $symptom->setSpecialities($this);
        }

        return $this;
    }
}
